@extends('admin.layouts.master')
@section('style')
<!-- This page plugin CSS -->
<link href="{{ asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Orders</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            {{ breadcrumbs() }}
                        </nav>
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="page-content container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex no-block align-items-center mb-4">
                        <h4 class="card-title">All Orders</h4>
                        <div class="ml-auto">
                            <div class="btn-group">
                                @if( hasPrivilege('add-task') )
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createTaskModal">
                                    Create New Order
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table table-bordered nowrap display task_table">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>Type</th>
                                    <th>Instructions</th>
                                    <th>Client Name</th>
                                    <th>Writer Name</th>
                                    <th>Manager Name</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="task_body">
                                @forelse ($tasks as $task)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
                                                <label class="custom-control-label" for="customControlValidation2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('viewTask',['id'=>$task->id]) }}"> {{ $task->type->name}}</a>
                                        </td>
                                        <td>{!! $task->instructions !!}</td>
                                        <td>{{ (!empty($task->client->first())) ? $task->client->first()->full_name : "" }}</td>
                                        <td>{{ (!empty($task->writer->first())) ? $task->writer->first()->full_name : "" }}</td>
                                        <td>{{ (!empty($task->manager->first())) ? $task->manager->first()->full_name : "" }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>{{ $task->status->name }}</td>
                                        <td>{{ $task->created_at }}</td>
                                        <td>
                                            <button class="btn btn-md btn-success view_task" data-toggle="modal" data-target="#viewTaskModal" data-id="{{ $task->id }}"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                            @if( hasRole('client') )
                                                @if( ($task->status->slug != 'approved') )         
                                                <button class="btn btn-md btn-success edit_task" data-toggle="modal" data-target="#updateTaskModal" data-id="{{ $task->id }}"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                @endif
                                                @if( ($task->status->slug == 'pending') )
                                                <button class="btn btn-md btn-danger delete_task" data-id="{{ $task->id }}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            @elseif( hasRole('admin|manager') )
                                                @if( hasPrivilege('edit-task') )
                                                <button class="btn btn-md btn-success edit_task" data-toggle="modal" data-target="#updateTaskModal" data-id="{{ $task->id }}"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                                @endif
                                                @if( hasPrivilege('delete-task') )
                                                <button class="btn btn-md btn-danger delete_task" data-id="{{ $task->id }}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Order</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-4">
            <div class="card">
                <div class="border-bottom p-3">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Sharemodel" style="width: 100%">
                        <i class="ti-share mr-2"></i> Share With
                    </button>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ti-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search Contacts Here..." aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <button class="btn btn-info">Ok</button>
                            </div>
                        </div>
                    </form>
                    <div class="list-group mt-4">
                        <a href="javascript:void(0)" class="list-group-item active"><i class="ti-layers mr-2"></i> All Contacts</a>
                        <a href="javascript:void(0)" class="list-group-item"><i class="ti-star mr-2"></i> Favourite Contacts</a>
                        <a href="javascript:void(0)" class="list-group-item"><i class="ti-bookmark mr-2"></i> Recently Created</a>
                    </div>
                    <h4 class="card-title mt-4">Groups</h4>
                    <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item"><i class="ti-flag-alt-2 mr-2"></i> Success Warriers 
                            <span class="badge badge-info float-right">20</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item"><i class="ti-notepad mr-2"></i> Project
                            <span class="badge badge-success float-right">12</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item"><i class="ti-target mr-2"></i> Envato Author
                            <span class="badge badge-dark float-right">22</span>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item"><i class="ti-comments mr-2"></i> IT Friends
                            <span class="badge badge-danger float-right">101</span>
                        </a>
                    </div>
                    <h4 class="card-title mt-4">More</h4>
                    <div class="list-group">
                        <a href="javascript:void(0)" class="list-group-item">  
                            <span class="badge badge-info mr-2"><i class="ti-import"></i></span> Import Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge badge-warning text-white mr-2"><i class="ti-export"></i></span> Export Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge badge-success mr-2"><i class="ti-share-alt"></i></span> Restore Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge badge-primary mr-2"><i class="ti-layers-alt"></i></span> Duplicate Contacts
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <span class="badge badge-danger mr-2"><i class="ti-trash"></i></span> Delete All Contacts
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- Share Modal -->
<div class="modal fade" id="Sharemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-auto-fix mr-2"></i> Share With</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="Username">
                    </div>
                    <div class="row">
                        <div class="col-3 text-center">
                            <a href="#Whatsapp" class="text-success">
                            <i class="display-6 mdi mdi-whatsapp"></i><br><span class="text-muted">Whatsapp</span>
                        </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="#Facebook" class="text-info">
                            <i class="display-6 mdi mdi-facebook"></i><br><span class="text-muted">Facebook</span>
                        </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="#Instagram" class="text-danger">
                            <i class="display-6 mdi mdi-instagram"></i><br><span class="text-muted">Instagram</span>
                        </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="#Skype" class="text-cyan">
                            <i class="display-6 mdi mdi-skype"></i><br><span class="text-muted">Skype</span>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if(hasPrivilege('add-task'))
<!-- Create Task Modal -->
<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog order-modal" role="document">
        <div class="modal-content">
            <form action="{{ route('createTask') }}" method="POST" id="create_task" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="errors"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type">
                                    <option value="">{{ __('Select Article Type') }}</option>
                                    @forelse($taskTypes as $taskType)
                                    <option value="{{ $taskType->id }}">{{ $taskType->name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no type') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    @if(hasRole('admin'))
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Client') }}</label>
                                <select class="form-control" name="client" id="client">
                                    <option value="">{{ __('Select Client') }}</option>
                                    @forelse($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->full_name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no Client') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Writer') }}</label>
                                <select class="form-control" name="writer" id="writer">
                                    <option value="">{{ __('Select Writer') }}</option>
                                    @forelse($writers as $writer)
                                    <option value="{{ $writer->id }}">{{ $writer->full_name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no writer') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Manager') }}</label>
                                <select class="form-control" name="manager" id="manager">
                                    <option value="">{{ __('Select Manager') }}</option>
                                    @forelse($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->full_name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no Manager') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label class="control-label col-form-label">{{ __('Instructions') }} <span class="text-danger">*</span></label>
                                <textarea name="instructions" id="instructions" class="form-control tinymce" placeholder="Enter instructions Here"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Deadline') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon14"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="date" name="deadline" id="deadline" class="form-control" aria-label="Deadline" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label class="control-label col-form-label">{{ __('Samples') }}</label>
                                <textarea name="samples" id="samples" class="form-control tinymce" placeholder="Enter samples Here" aria-label="samples"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">Select File</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="files" id="files" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-success"><i class="ti-save"></i> Create Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@if( hasPrivilege('edit-task') )
<!-- Update Task Modal -->
<div class="modal fade" id="updateTaskModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog order-modal" role="document">
        <div class="modal-content">
            <form action="{{ route('updateTask') }}" method="POST" id="update_task" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="task_id" id="task_id" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Update Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="errors"></div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type">
                                    <option value="">{{ __('Select Article Type') }}</option>
                                    @forelse($taskTypes as $taskType)
                                    <option value="{{ $taskType->id }}">{{ $taskType->name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no type') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    @if(hasRole('admin'))
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Client') }}</label>
                                <select class="form-control" name="client" id="client">
                                    <option value="">{{ __('Select Client') }}</option>
                                    @forelse($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->full_name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no Client') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Writer') }}</label>
                                <select class="form-control" name="writer" id="writer">
                                    <option value="">{{ __('Select Writer') }}</option>
                                    @forelse($writers as $writer)
                                    <option value="{{ $writer->id }}">{{ $writer->full_name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no writer') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Manager') }}</label>
                                <select class="form-control" name="manager" id="manager">
                                    <option value="">{{ __('Select Manager') }}</option>
                                    @forelse($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->full_name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no Manager') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label class="control-label col-form-label">{{ __('Instructions') }} <span class="text-danger">*</span></label>
                                <textarea name="instructions" id="update_instructions" class="form-control tinymce" placeholder="Enter instructions Here"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Deadline') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon14"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="date" name="deadline" id="deadline" class="form-control" aria-label="Deadline" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">{{ __('Task Status') }} <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">{{ __('Select Task Status') }}</option>
                                    @forelse($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @empty
                                    <option value="">{{ __('There is no status') }}</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label class="control-label col-form-label">{{ __('Samples') }}</label>
                                <textarea name="samples" id="update_samples" class="form-control tinymce" placeholder="Enter samples Here" aria-label="samples"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label col-form-label">Select File</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="files" id="files" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-success"><i class="ti-save"></i> Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- User View Modal -->
<div class="modal fade" id="viewTaskModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content viewTaskContent">
            
        </div>
    </div>
</div>
@endif
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection

@section('script')
<!--This page plugins -->
<script src="{{ asset('dashboard/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{ asset('dashboard/dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script>
    $(document).ready(function() {

        // if ($("#instructions").length > 0) {
            tinymce.init({
                selector: "#instructions,#samples,#update_instructions,#update_samples",
                theme: "modern",
                height: 300,
                setup: function (editor) {
                    editor.on('change', function () {
                        tinymce.triggerSave();
                    });
                },
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        // }


    });
    </script>
@endsection