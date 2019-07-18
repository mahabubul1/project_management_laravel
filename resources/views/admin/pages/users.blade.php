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
                        <h5 class="font-medium text-uppercase mb-0">Users</h5>
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
                        <h4 class="card-title">All Users</h4>
                        <div class="ml-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createUserModel">
                                    Create New User
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table user_table table-bordered nowrap display">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Company Name</th>
                                    <th>Joining date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="user_body">
                            	@forelse ($users as $user)
                            	    <tr id="row_{{ $user->id }}">
                            	        <td>
                            	            <div class="custom-control custom-checkbox">
                            	                <input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
                            	                <label class="custom-control-label" for="customControlValidation2"></label>
                            	            </div>
                            	        </td>
                            	        <td>
                            	            <a href="{{ route('viewProfile',['id'=>$user->id]) }}">
                                                @if( file_exists(public_path('/uploads/users/'. $user->username.'/'. $user->image)) )
                                                <img src="{{ asset( '/uploads/users/'. $user->username.'/'. $user->image )  }}" alt="user" class="rounded-circle" width="30" />
                                                @else
                                                <img src="{{ asset( '/uploads/users/avatar.png' )  }}" alt="user" class="rounded-circle" width="30" />
                                                @endif
                                                {{ $user->full_name }}
                                            </a>
                            	        </td>
                            	        <td>{{ $user->email }}</td>
                            	        <td>{{ $user->phone }}</td>
                            	        <td><span class="label label-danger">
                            	        	
                            	        	@foreach($user->roles as $role)
                            	        		{{ $role->name }}
                            	        	@endforeach
                            	        </span> </td>
                            	        <td>{{ $user->company_name }}</td>
                            	        <td>{{ $user->created_at }}</td>
                            	        <td>
                                            <button class="btn btn-md btn-success view_user" data-toggle="modal" data-target="#viewUserModal" data-id="{{ $user->id }}"><i class="fas fa-eye" aria-hidden="true"></i></button>
                                            <button class="btn btn-md btn-success edit_user" data-toggle="modal" data-target="#updateUserModal" data-id="{{ $user->id }}"><i class="fas fa-edit" aria-hidden="true"></i></button>
                            	            <button class="btn btn-md btn-danger delete_user" alt="alert" class="img-fluid " id="sa-params" data-id="{{ $user->id }}"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            	        </td>
                            	    </tr>
                            	@empty
                            	    <p>No user</p>
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
@if( hasRole('admin') )
<!-- Create Modal -->
<div class="modal fade" id="createUserModel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('createUser') }}" method="POST" id="create_user" enctype="multipart/form-data">
            	@csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="errors"></div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter Full Name Here" aria-label="full_name">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username Here" aria-label="username">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Here" aria-label="email">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="fas fa-user-secret text-white"></i></button>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password here" aria-label="password">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <select class="form-control" id="role" name="role">
                            <option value="">Select Role</option>
                        	@forelse($roles as $key => $role)
                        	<option value="{{ $role->id }}">{{ $role->name }}</option>
                        	@empty
                        	@endforelse
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="icon-phone text-white"></i></button>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone number here" aria-label="phone">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="fas fa-building text-white"></i></button>
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company here" aria-label="company_name">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                        <div class="custom-file">
                            <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Update Modal -->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('editUser') }}" method="POST" id="update_user" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="user_id" value="">
                <input type="hidden" name="row_id" id="row_id" value="">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="errors"></div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <input type="text" name="full_name" id="update_full_name" class="form-control" placeholder="Enter Full Name Here" aria-label="name">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <input type="text" name="username" id="update_username" class="form-control" placeholder="Enter Username Here" aria-label="name" disabled="">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-email text-white"></i></button>
                        <input type="email" name="email" id="update_email" class="form-control" placeholder="Enter Email Here" aria-label="email">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                        <select class="form-control" id="update_role" name="role">
                            @forelse($roles as $key => $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="icon-phone text-white"></i></button>
                        <input type="text" name="phone" id="update_phone" class="form-control" placeholder="Enter Phone number here" aria-label="phone">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="fas fa-building text-white"></i></button>
                        <input type="text" name="company_name" id="update_company_name" class="form-control" placeholder="Enter Company here" aria-label="company_name">
                    </div>
                    <!-- <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="update_user_submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- User View Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content viewUserContent">
            
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
@endsection