@extends('admin.layouts.master')
@section('breadcrumb')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Account Settings</h5>
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
        <!-- Row -->
        <div class="row">
        	@if(session('verify_message'))
                <div class="alert alert-success">
                  {{ session('verify_message') }}
                </div>
            @endif
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="mt-4"> <img src="{{ asset('dashboard/assets/images/users/5.jpg') }}" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-2" id="user_name">{{ $user->full_name}}</h4>
                            <h6 class="card-subtitle">
                            	@foreach($user->roles as $role)
                            		{{ $role->name }}
                            	@endforeach
                            </h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6 id="user_email">{{ $user->email }}</h6> <small class="text-muted pt-4 db">Phone</small>
                        <h6 id="user_phone">{{ $user->phone }}</h6> <small class="text-muted pt-4 db">Address</small>
                        <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                        <div class="map-box">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted pt-4 db">Social Profile</small>
                        <br/>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tabs -->
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                        </li>
                    </ul>
                    <!-- Tabs -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                <div class="steamline mt-0">
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" /> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 mb-3"><img src="{{ asset('dashboard/assets/images/big/img1.jpg') }}" class="img-fluid rounded" /></div>
                                                    <div class="col-lg-3 col-md-6 mb-3"><img src="{{ asset('dashboard/assets/images/big/img2.jpg') }}" class="img-fluid rounded" /></div>
                                                    <div class="col-lg-3 col-md-6 mb-3"><img src="{{ asset('dashboard/assets/images/big/img3.jpg') }}" class="img-fluid rounded" /></div>
                                                    <div class="col-lg-3 col-md-6 mb-3"><img src="{{ asset('dashboard/assets/images/big/img4.jpg') }}" class="img-fluid rounded" /></div>
                                                </div>
                                                <div class="desc"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user" class="rounded-circle" /> </div>
                                        <div class="sl-right">
                                            <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                <div class="mt-3 row">
                                                    <div class="col-md-3 col-xs-12"><img src="{{ asset('dashboard/assets/images/big/img1.jpg') }}" alt="user" class="img-fluid rounded" /></div>
                                                    <div class="col-md-9 col-xs-12">
                                                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a></div>
                                                </div>
                                                <div class="desc mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" alt="user" class="rounded-circle" /> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                            </div>
                                            <div class="desc mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" alt="user" class="rounded-circle" /> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                <blockquote class="mt-2">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted" id="profile_name">{{ $user->full_name }}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                        <br>
                                        <p class="text-muted" id="profile_phone">{{ $user->phone }}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted" id="profile_email">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                        <br>
                                        <p class="text-muted">Bangladesh</p>
                                    </div>
                                </div>
                                <hr>
                                <p class="mt-4">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <h4 class="font-medium mt-4">Skill Set</h4>
                                <hr>
                                <h5 class="mt-4">Wordpress <span class="pull-right">80%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                                <h5 class="mt-4">HTML 5 <span class="pull-right">90%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                                <h5 class="mt-4">jQuery <span class="pull-right">50%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                                <h5 class="mt-4">Photoshop <span class="pull-right">70%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                            	<div class="errors"></div>
                                <form class="form-horizontal form-material" id="profile_update_form">
                                	@csrf
                                	<input type="hidden" name="id" id="profile_id" value="{{ $user->id }}">
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="full_name" id="full_name" placeholder="Johnathan Doe" class="form-control form-control-line" value="{{ $user->full_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" id="username" placeholder="Johnathan Doe" class="form-control form-control-line" value="{{ $user->username }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" id="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" id="phone" placeholder="123 456 7890" class="form-control form-control-line" value="{{ $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Company Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="company_name" id="company_name" placeholder="CodexShaper" class="form-control form-control-line" value="{{ $user->company_name }}">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button id="update_profile" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection