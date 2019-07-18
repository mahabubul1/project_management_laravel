<!DOCTYPE html>
<html lang="en">
<head>
	<!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <!-- description -->
    <meta name="description" content="A great collection of creative, responsive, elegant onepage templates for different industries.">
    <!-- keywords -->
    <meta name="keywords" content="agency, bootstrap, creative, responsive, css3, html5, onepage, resume, portfolio">
    <!-- Author Info -->
    <meta name="author" content="Md Abu Ahsan Basir">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Janica') }}</title>
    <!-- links for favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Color CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color.css') }}">
    @yield('style')
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Start App -->
<div id="app">
    <!-- Start Header -->
    <header class="header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light main-nav">
          <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenuDropdown" aria-controls="mainMenuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="mainMenuDropdown">
                    <ul class="navbar-nav main-menu ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="sample.html">Samples</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('price') }}">Pricing</a></li>
                        @if(!isLoggedIn())
                        <li class="nav-item"><a class="subscribe-link" href="{{ route('login') }}">Sign in</a></li>
                        @else
                            <li class="nav-item">
                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="subscribe-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header><!-- End Header -->