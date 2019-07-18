<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userid" content="{{ isAdmin() ? Auth::user()->id : '' }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/assets/images/favicon.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Laravel App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- needed css -->
    <link href="{{ asset('dashboard/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/custom-style.css') }}" rel="stylesheet">
    @yield('style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
            window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
        </script>
    </head>

<body>
<div id="app">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header border-right">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <a class="navbar-brand" href="{{ route('profile') }}">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('dashboard/assets/images/logos/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{ asset('dashboard/assets/images/logos/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                         <!-- dark Logo text -->
                         <img src="{{ asset('dashboard/assets/images/logos/logo-text.png') }}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{ asset('dashboard/assets/images/logos/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                    </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-18 mdi mdi-gmail"></i>
                            <div class="notify">
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="drop-title border-bottom">You have 4 new messanges</div>
                                </li>
                                <li>
                                    <div class="message-center message-body">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </span>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </span>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </span>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>See all Notifications</b> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Notification -->
                    <!-- ============================================================== -->
                    <notification :userid="{{isAdmin() ? Auth::user()->id : ''}}" :unread_notifications="{{isAdmin() ? Auth::user()->unreadNotifications : ''}}" :read_notifications="{{isAdmin() ? Auth::user()->notifications : ''}}"></notification>

                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-check-circle font-18"></i>
                            <div class="notify">
                                <span class="heartbit"></span>
                                <span class="point"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                            <span class="with-arrow"><span class="bg-primary"></span></span>
                            <ul class="list-style-none">
                                <li>
                                    <div class="drop-title border-bottom">You have 3 new Tasks</div>
                                </li>
                                <li>
                                    <div class="message-center notifications">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </span>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </span>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </span>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center mb-1 text-dark" href="javascript:void(0);"> <strong>See all Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- mega menu -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-md-block">Mega <i class="icon-options-vertical"></i></span>
                            <span class="d-block d-md-none"><i class="mdi mdi-dialpad font-24"></i></span>
                        </a>
                        <div class="dropdown-menu animated bounceInDown">
                            <div class="mega-dropdown-menu row">
                                <div class="col-lg-3 col-xlg-2 mb-4">
                                    <h5 class="mb-3">CAROUSEL</h5>
                                    <!-- CAROUSEL -->
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <div class="container p-0"> <img class="d-block img-fluid" src="{{ asset('dashboard/assets/images/big/img1.jpg') }}" alt="First slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container p-0"><img class="d-block img-fluid" src="{{ asset('dashboard/assets/images/big/img2.jpg') }}" alt="Second slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container p-0"><img class="d-block img-fluid" src="{{ asset('dashboard/assets/images/big/img3.jpg') }}" alt="Third slide"></div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                    </div>
                                    <!-- End CAROUSEL -->
                                </div>
                                <div class="col-lg-3 mb-4">
                                    <h5 class="mb-3">ACCORDION</h5>
                                    <!-- Accordian -->
                                    <div id="accordion" class="accordion">
                                        <div class="card mb-1">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                              Collapsible Group Item #1
                                            </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-1">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                              Collapsible Group Item #2
                                            </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-1">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                              Collapsible Group Item #3
                                            </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3  mb-4">
                                    <h5 class="mb-3">CONTACT US</h5>
                                    <!-- Contact -->
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter email"> </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-xlg-4 mb-4">
                                    <h5 class="mb-3">LIST STYLE</h5>
                                    <!-- List style -->
                                    <ul class="list-style-none">
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box">
                        <form class="app-search d-none d-lg-block">
                            <input type="text" class="form-control" placeholder="Search...">
                            <a href="" class="active"><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="36">
                            <span class="ml-2 font-medium">{{ Auth::user()->first_name }}</span><span class="fas fa-angle-down ml-2"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                <div class=""><img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" class="rounded" width="80"></div>
                                <div class="ml-2">
                                    <h4 class="mb-0">{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h4>
                                    <p class=" mb-0 text-muted">{{ Auth::user()->email }}</p>
                                    <a href="{{ route('profile') }}" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('profile') }}"><i class="ti-user mr-1 ml-1"></i> My Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet mr-1 ml-1"></i> My Balance</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email mr-1 ml-1"></i> Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('accountSettings') }}"><i class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="subscribe-link dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off mr-1 ml-1"></i> Logout
                            </button>
                            </form>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->