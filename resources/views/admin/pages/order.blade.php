@extends('admin.layouts.master')
@section('style')
<!-- This page plugin CSS -->
<link href="{{ asset('dashboard/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Task Detail</h5>
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
    <!-- basic table -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Task Instructions</h4> {!! $task->instructions !!}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Comment Replies</h4>
                    <ul class="list-unstyled mt-5">
                        <li class="media">
                            <img class="mr-3" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" width="60" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">User Name</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <hr>
                        <li class="media my-4">
                            <img class="mr-3" src="{{ asset('dashboard/assets/images/users/1.jpg') }}" width="60" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Agent Name</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <hr>
                        <li class="media">
                            <img class="mr-3" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" width="60" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">User Name</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <hr>
                        <li class="media">
                            <img class="mr-3" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" width="60" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">User Name</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <hr>
                        <li class="media my-4">
                            <img class="mr-3" src="{{ asset('dashboard/assets/images/users/1.jpg') }}" width="60" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">Agent Name</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <hr>
                        <li class="media">
                            <img class="mr-3" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" width="60" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">User Name</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Write a reply</h4>
                    <form method="post">
                        <textarea id="mymce" name="area"></textarea>
                        <button type="button" class="mt-3 btn waves-effect waves-light btn-success">Reply</button>
                        <button type="button" class="mt-3 btn waves-effect waves-light btn-info">Reply & close</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Task Info</h4>
                </div>
                <div class="card-body bg-light">
                    <div class="row text-center">
                        <div class="col-6 mt-2 mb-2">
                            <span class="label label-warning">In {{ $task->status->name }}</span>
                        </div>
                        <div class="col-6 mt-2 mb-2">
                            {{ date('M d, Y', strtotime($task->updated_at)) }}
                        </div>
                    </div>
                    @if($task->status->slug != 'approved')
                    <div class="row text-center">
                        <div class="col-6 mt-2 mb-2">
                            <span class="label label-warning">{{ __('Deadline') }}</span>
                        </div>
                        <div class="col-6 mt-2 mb-2">
                            {{ date('M d, Y', strtotime($task->deadline)) }}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row card-body">
                    <div class="col-4">
                        <h5 class="pt-3">Owner</h5>
                        <span>{{ ($task->client->first()) ? $task->client->first()->full_name : "" }}</span>
                    </div>
                    <div class="col-4">
                        <h5 class="pt-3">Manager</h5>
                        <span>{{ ( $task->manager->first()) ? $task->manager->first()->full_name : "" }}</span>
                    </div>
                    <div class="col-4">
                        <h5 class="pt-3">Writer</h5>
                        <span>{{ ($task->writer->first()) ? $task->writer->first()->full_name : "" }}</span>
                    </div>
                    <!-- <h5 class="mt-4">Support Staff</h5> -->
                    <!-- <span>Agent Name</span> -->
                    <br/>
                    <!-- <button type="button" class="mt-3 btn waves-effect waves-light btn-success">Update</button> -->
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">User Info</h4>
                    <div class="profile-pic mb-3 mt-3">
                        <img src="{{ asset('dashboard/assets/images/users/5.jpg') }}" width="150" class="rounded-circle" alt="user">
                        <h4 class="mt-3 mb-0">{{ $task->client->first()->full_name }}</h4>
                        @if(hasRole('admin|client'))
                        <a href="mailto:{{ $task->client->first()->email }}">{{ $task->client->first()->email }}</a>
                        @endif
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col-4">
                            <h3 class="font-bold">{{ count($task->client->first()->tasks) }}</h3>
                            <h6>Total</h6></div>
                        <div class="col-4">
                            <h3 class="font-bold">
                                @php
                                    $countOpenTasks = 0;
                                    foreach($task->client->first()->tasks as $key => $clientTask){
                                        if( $clientTask->status->slug == 'pending' || $clientTask->status->slug == 'progress') {
                                            $countOpenTasks++;
                                        }
                                    }
                                @endphp

                                {{ $countOpenTasks }}
                            </h3>
                            <h6>Open</h6></div>
                        <div class="col-4">
                            <h3 class="font-bold">
                                @php
                                    $countCompletedTasks = 0;
                                    foreach($task->client->first()->tasks as $key => $clientTask){
                                        if( $clientTask->status->slug == 'approved' ) {
                                            $countCompletedTasks++;
                                        }
                                    }
                                @endphp
                                {{ $countCompletedTasks }}
                            </h3>
                            <h6>Completed</h6></div>
                    </div>
                </div>
                <div class="p-4 border-top mt-3">
                    <div class="row text-center">
                        <div class="col-6 border-right">
                            <a href="#" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-message font-20 mr-1"></i>Message</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('viewProfile',['id'=>$task->client->first()->id]) }}" class="link d-flex align-items-center justify-content-center font-medium"><i class="mdi mdi-developer-board font-20 mr-1"></i>Portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ticket Statestics</h4>
                    <div id="visitor" style="height:290px; width:100%;" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@section('script')
<!-- This Page JS -->
    <script src="{{ asset('dashboard/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <!--c3 charts -->
    <script src="{{ asset('dashboard/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script>
    $(function() {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }
        // ============================================================== 
        // Our Visitor
        // ============================================================== 

        var chart = c3.generate({
            bindto: '#visitor',
            data: {
                columns: [
                    ['Open', 4],
                    ['Closed', 2],
                    ['In progress', 2],
                    ['Other', 0],
                ],

                type: 'donut',
                tooltip: {
                    show: true
                }
            },
            donut: {
                label: {
                    show: false
                },
                title: "Tickets",
                width: 35,

            },

            legend: {
                hide: true
                //or hide: 'data1'
                //or hide: ['data1', 'data2']

            },
            color: {
                pattern: ['#40c4ff', '#2961ff', '#ff821c', '#7e74fb']
            }
        });
    });
    </script>
@endsection