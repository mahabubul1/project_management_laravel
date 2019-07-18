@extends('admin.layouts.master')

@section('style')
<!-- chartist CSS -->
<link href="{{ asset('dashboard/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
<!--c3 CSS -->
<link href="{{ asset('dashboard/assets/libs/morris.js/morris.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('dashboard/assets/libs/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet" />
<link href="{{ asset('dashboard/assets/extra-libs/calendar/calendar.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="page-content container-fluid">
<!-- ============================================================== -->
<!-- Card Group  -->
<!-- ============================================================== -->
<div class="card-group">
    <div class="card p-2 p-lg-3">
        <div class="p-lg-3 p-2">
            <div class="d-flex align-items-center">
                <button class="btn btn-circle btn-danger text-white btn-lg" href="javascript:void(0)">
                <i class="ti-clipboard"></i>
            </button>
                <div class="ml-4" style="width: 38%;">
                    <h4 class="font-light">Total Projects</h4>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                    </div>
                </div>
                <div class="ml-auto">
                    <h2 class="display-7 mb-0">23</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-2 p-lg-3">
        <div class="p-lg-3 p-2">
            <div class="d-flex align-items-center">
                <button class="btn btn-circle btn-cyan text-white btn-lg" href="javascript:void(0)">
                <i class="ti-wallet"></i>
            </button>
                <div class="ml-4" style="width: 38%;">
                    <h4 class="font-light">Total Earnings</h4>
                    <div class="progress">
                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                    </div>
                </div>
                <div class="ml-auto">
                    <h2 class="display-7 mb-0">76</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-2 p-lg-3">
        <div class="p-lg-3 p-2">
            <div class="d-flex align-items-center">
                <button class="btn btn-circle btn-warning text-white btn-lg" href="javascript:void(0)">
                <i class="fas fa-dollar-sign"></i>
            </button>
                <div class="ml-4" style="width: 38%;">
                    <h4 class="font-light">Total Earnings</h4>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                    </div>
                </div>
                <div class="ml-auto">
                    <h2 class="display-7 mb-0">83</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Products yearly sales, Weather Cards Section  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">Products Yearly Sales</h5>
                <ul class="list-inline dl mb-0 float-right">
                    <li class="list-inline-item text-info"><i class="fa fa-circle"></i> Mac</li>
                    <li class="list-inline-item text-danger"><i class="fa fa-circle"></i> Windows</li>
                </ul>
                <div id="ct-visits" style="height: 320px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="bg-danger">
                <div id="ct-daily-sales" style="height: 304px"></div>
            </div>
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="font-medium">Week Sales</h2>
                        <h5 class="card-subtitle mb-0">Ios app - 160 sales</h5>
                    </div>
                    <div class="ml-auto">
                        <button class="btn btn-circle btn-info text-white btn-lg" href="javascript:void(0)">
                            <i class="ti-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Manage Table & Walet Cards Section  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs manage-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#users" role="tab">
                        <span class="hidden-sm-up">
                            <h4><i class="ti-user"></i></h4>
                        </span>
                        <span class="d-none d-md-block">Select Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#permissions" role="tab">
                        <span class="hidden-sm-up">
                            <h4><i class="ti-lock"></i></h4>
                        </span>
                        <span class="d-none d-md-block">Set Permissions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                        <span class="hidden-sm-up">
                            <h4><i class="ti-receipt"></i></h4>
                        </span>
                        <span class="d-none d-md-block">Message Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#save" role="tab">
                        <span class="hidden-sm-up">
                            <h4><i class="ti-check-box"></i></h4>
                        </span>
                        <span class="d-none d-md-block">Save and Finish</span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="users" role="tabpanel">
                    <div class="row py-4 px-5 no-gutters mt-3">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="font-light">Select Users to Manage</h3>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <ul class="list-inline dl mb-0 float-left float-md-right">
                                <li class="list-inline-item text-info mr-3">
                                    <a href="#">
                                        <button class="btn btn-circle btn-success text-white" href="javascript:void(0)">
                                            <i class="ti-plus"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Add User</span>
                                    </a>
                                </li>
                                <li class="list-inline-item text-danger">
                                    <a href="#">
                                        <button class="btn btn-circle btn-danger text-white" href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-light">
                        <div class="table-responsive border-top manage-table px-4 py-3">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0">Name</th>
                                        <th scope="col" class="border-0">Position</th>
                                        <th scope="col" class="border-0">Joined</th>
                                        <th scope="col" class="border-0">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="advanced-table active">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c1" checked="">
                                                <label class="custom-control-label" for="c1">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Andrew Simons</td>
                                        <td>Modulator</td>
                                        <td>6 May 2016</td>
                                        <td>Gujrat, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c2">
                                                <label class="custom-control-label" for="c2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Hanna Gover</td>
                                        <td>Admin </td>
                                        <td>13 Jan 2005</td>
                                        <td>Texas, United states</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c3">
                                                <label class="custom-control-label" for="c3">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Nirav</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2001</td>
                                        <td>Bhavnagar, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c4">
                                                <label class="custom-control-label" for="c4">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Sunil</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2004</td>
                                        <td>Gujarat, India</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-4 mt-2">
                        <h3 class="font-light">1 members selected</h3>
                        <div class="ml-auto">
                            <button class="btn btn-danger text-white btn-rounded py-2 px-3">Next <i class="ti-arrow-right ml-2"></i></button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="permissions" role="tabpanel">
                    <div class="row py-4 px-5 no-gutters mt-3">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="font-light">Set Users Permission</h3>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <ul class="list-inline dl mb-0 float-left float-md-right">
                                <li class="list-inline-item text-info mr-3">
                                    <a href="#">
                                        <button class="btn btn-circle btn-success text-white" href="javascript:void(0)">
                                            <i class="ti-plus"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Add User</span>
                                    </a>
                                </li>
                                <li class="list-inline-item text-danger">
                                    <a href="#">
                                        <button class="btn btn-circle btn-danger text-white" href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-light">
                        <div class="table-responsive border-top manage-table px-4 py-3">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0">Name</th>
                                        <th scope="col" class="border-0">Position</th>
                                        <th scope="col" class="border-0">Joined</th>
                                        <th scope="col" class="border-0">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c5">
                                                <label class="custom-control-label" for="c5">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Andrew Simons</td>
                                        <td>Modulator</td>
                                        <td>6 May 2016</td>
                                        <td>Gujrat, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table active">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c6" checked="">
                                                <label class="custom-control-label" for="c6">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Hanna Gover</td>
                                        <td>Admin </td>
                                        <td>13 Jan 2005</td>
                                        <td>Texas, United states</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c7">
                                                <label class="custom-control-label" for="c7">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Nirav</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2001</td>
                                        <td>Bhavnagar, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c8">
                                                <label class="custom-control-label" for="c8">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Sunil</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2004</td>
                                        <td>Gujarat, India</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-4 mt-2">
                        <h3 class="font-light">1 members selected</h3>
                        <div class="ml-auto">
                            <button class="btn btn-danger text-white btn-rounded py-2 px-3">Next <i class="ti-arrow-right ml-2"></i></button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="row py-4 px-5 no-gutters mt-3">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="font-light">Manage Users</h3>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <ul class="list-inline dl mb-0 float-left float-md-right">
                                <li class="list-inline-item text-info mr-3">
                                    <a href="#">
                                        <button class="btn btn-circle btn-success text-white" href="javascript:void(0)">
                                            <i class="ti-plus"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Add User</span>
                                    </a>
                                </li>
                                <li class="list-inline-item text-danger">
                                    <a href="#">
                                        <button class="btn btn-circle btn-danger text-white" href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-light">
                        <div class="table-responsive border-top manage-table px-4 py-3">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0">Name</th>
                                        <th scope="col" class="border-0">Position</th>
                                        <th scope="col" class="border-0">Joined</th>
                                        <th scope="col" class="border-0">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c9">
                                                <label class="custom-control-label" for="c9">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Andrew Simons</td>
                                        <td>Modulator</td>
                                        <td>6 May 2016</td>
                                        <td>Gujrat, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c10">
                                                <label class="custom-control-label" for="c10">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Hanna Gover</td>
                                        <td>Admin </td>
                                        <td>13 Jan 2005</td>
                                        <td>Texas, United states</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table active">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c11" checked="">
                                                <label class="custom-control-label" for="c11">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Nirav</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2001</td>
                                        <td>Bhavnagar, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c12">
                                                <label class="custom-control-label" for="c12">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Sunil</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2004</td>
                                        <td>Gujarat, India</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-4 mt-2">
                        <h3 class="font-light">1 members selected</h3>
                        <div class="ml-auto">
                            <button class="btn btn-danger text-white btn-rounded py-2 px-3">Next <i class="ti-arrow-right ml-2"></i></button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="save" role="tabpanel">
                    <div class="row py-4 px-5 no-gutters mt-3">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="font-light">Save and finish</h3>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <ul class="list-inline dl mb-0 float-left float-md-right">
                                <li class="list-inline-item text-info mr-3">
                                    <a href="#">
                                        <button class="btn btn-circle btn-success text-white" href="javascript:void(0)">
                                            <i class="ti-plus"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Add User</span>
                                    </a>
                                </li>
                                <li class="list-inline-item text-danger">
                                    <a href="#">
                                        <button class="btn btn-circle btn-danger text-white" href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </button>
                                        <span class="ml-2 font-normal text-dark">Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-light">
                        <div class="table-responsive border-top manage-table px-4 py-3">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0"></th>
                                        <th scope="col" class="border-0">Name</th>
                                        <th scope="col" class="border-0">Position</th>
                                        <th scope="col" class="border-0">Joined</th>
                                        <th scope="col" class="border-0">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c13">
                                                <label class="custom-control-label" for="c13">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Andrew Simons</td>
                                        <td>Modulator</td>
                                        <td>6 May 2016</td>
                                        <td>Gujrat, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c14">
                                                <label class="custom-control-label" for="c14">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Hanna Gover</td>
                                        <td>Admin </td>
                                        <td>13 Jan 2005</td>
                                        <td>Texas, United states</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c15">
                                                <label class="custom-control-label" for="c15">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Nirav</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2001</td>
                                        <td>Bhavnagar, India</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="sml-pd"></td>
                                    </tr>
                                    <tr class="advanced-table active">
                                        <td class="pl-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="c16" checked="">
                                                <label class="custom-control-label" for="c16">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" class="rounded-circle" width="30">
                                        </td>
                                        <td>Joshi Sunil</td>
                                        <td>Admin</td>
                                        <td>21 Mar 2004</td>
                                        <td>Gujarat, India</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-4 mt-2">
                        <h3 class="font-light">1 members selected</h3>
                        <div class="ml-auto">
                            <button class="btn btn-danger text-white btn-rounded py-2 px-3">Next <i class="ti-arrow-right ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex mt-3">
                    <button class="btn btn-circle btn-success text-white btn-lg" href="javascript:void(0)">
                        <i class="ti-plus"></i>
                    </button>
                    <div class="ml-3">
                        <h2 class="display-6">$456.90</h2>
                        <h5 class="font-light">Your wallet Balance</h5>
                    </div>
                </div>
            </div>
            <div id="morris-area-chart2" style="height:108px;"></div>
            <ul class="list-style-none">
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-wallet font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Withdrow money</a>
                    </div>
                </li>
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-bag font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Shop Now</a>
                    </div>
                </li>
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-briefcase font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Add funds</a>
                    </div>
                </li>
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-wallet font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Shop Now</a>
                    </div>
                </li>
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-wallet font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Withdrow money</a>
                    </div>
                </li>
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-bag font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Shop Now</a>
                    </div>
                </li>
                <li class="py-2 px-4 border-top">
                    <div class="d-flex align-items-center">
                        <i class="ti-wallet font-24 text-info"></i>
                        <a href="#" class="ml-3 font-18 font-light">Withdrow money</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- User Table & Profile Cards Section  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap user-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Occupation</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pl-4">1</td>
                            <td>
                                <h5 class="font-medium mb-0">Daniel Kristeen</h5>
                                <span class="text-muted">Texas, Unitedd states</span>
                            </td>
                            <td>
                                <span class="text-muted">Visual Designer</span><br>
                                <span class="text-muted">Past : teacher</span>
                            </td>
                            <td>
                                <span class="text-muted">daniel@website.com</span><br>
                                <span class="text-muted">999 - 444 - 555</span>
                            </td>
                            <td>
                                <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Modulator</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Subscriber</option>
                        </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-trash"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-4">2</td>
                            <td>
                                <h5 class="font-medium mb-0">Emma Smith</h5>
                                <span class="text-muted">Texas, Unitedd states</span>
                            </td>
                            <td>
                                <span class="text-muted">Visual Designer</span><br>
                                <span class="text-muted">Past : teacher</span>
                            </td>
                            <td>
                                <span class="text-muted">daniel@website.com</span><br>
                                <span class="text-muted">999 - 444 - 555</span>
                            </td>
                            <td>
                                <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Modulator</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Subscriber</option>
                        </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-trash"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-4">3</td>
                            <td>
                                <h5 class="font-medium mb-0">Olivia Johnson</h5>
                                <span class="text-muted">Texas, Unitedd states</span>
                            </td>
                            <td>
                                <span class="text-muted">Visual Designer</span><br>
                                <span class="text-muted">Past : teacher</span>
                            </td>
                            <td>
                                <span class="text-muted">daniel@website.com</span><br>
                                <span class="text-muted">999 - 444 - 555</span>
                            </td>
                            <td>
                                <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Modulator</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Subscriber</option>
                        </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-trash"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-4">4</td>
                            <td>
                                <h5 class="font-medium mb-0">Isabella Williams</h5>
                                <span class="text-muted">Texas, Unitedd states</span>
                            </td>
                            <td>
                                <span class="text-muted">Visual Designer</span><br>
                                <span class="text-muted">Past : teacher</span>
                            </td>
                            <td>
                                <span class="text-muted">daniel@website.com</span><br>
                                <span class="text-muted">999 - 444 - 555</span>
                            </td>
                            <td>
                                <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Modulator</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Subscriber</option>
                        </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-trash"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-4">5</td>
                            <td>
                                <h5 class="font-medium mb-0">Sophia Jones</h5>
                                <span class="text-muted">Texas, Unitedd states</span>
                            </td>
                            <td>
                                <span class="text-muted">Visual Designer</span><br>
                                <span class="text-muted">Past : teacher</span>
                            </td>
                            <td>
                                <span class="text-muted">daniel@website.com</span><br>
                                <span class="text-muted">999 - 444 - 555</span>
                            </td>
                            <td>
                                <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Modulator</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Subscriber</option>
                        </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-trash"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-4">6</td>
                            <td>
                                <h5 class="font-medium mb-0">Charlotte Brown</h5>
                                <span class="text-muted">Texas, Unitedd states</span>
                            </td>
                            <td>
                                <span class="text-muted">Visual Designer</span><br>
                                <span class="text-muted">Past : teacher</span>
                            </td>
                            <td>
                                <span class="text-muted">daniel@website.com</span><br>
                                <span class="text-muted">999 - 444 - 555</span>
                            </td>
                            <td>
                                <select class="form-control category-select" id="exampleFormControlSelect1">
                          <option>Modulator</option>
                          <option>Admin</option>
                          <option>User</option>
                          <option>Subscriber</option>
                        </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="ti-trash"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ti-pencil-alt"></i> </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Todo list & Calender application  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="d-flex align-items-center px-3 py-4 border-bottom">
                <div>
                    <h5 class="text-dark font-light mb-0">This Months Task</h5>
                    <h4 class="mb-0 text-uppercase font-medium">To-do List</h4>
                </div>
                <div class="ml-auto">
                    <button class="btn btn-danger text-white btn-rounded" data-toggle="modal" data-target="#addtask">Add Task</button>
                </div>
            </div>
            <div class="card-body">
                <div class="todo-widget">
                    <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                        <li class="list-group-item todo-item pt-0" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label todo-label" for="customCheck">
                                <span class="todo-desc">Schedule meeting with</span>
                            </label>
                            </div>
                            <ul class="list-style-none assignedto mt-2">
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/3.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/4.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                            </ul>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label todo-label" for="customCheck1">
                                <span class="todo-desc">Give Purchase report to</span><span class="badge badge-pill badge-danger font-medium text-white ml-1">Today </span>
                            </label>
                            </div>
                            <ul class="list-style-none assignedto mt-2">
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                            </ul>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label todo-label" for="customCheck3">
                                <span class="todo-desc">Book flight for holiday</span> 
                            </label>
                            </div>
                            <div class="item-date"> 26 jun 2017</div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label todo-label" for="customCheck4">
                                <span class="todo-desc">Forward all tasks</span> <span class="badge badge-pill badge-warning ml-1 text-white font-medium">2 weeks</span>
                            </label>
                            </div>
                            <div class="item-date"> 26 jun 2017</div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                <label class="custom-control-label todo-label" for="customCheck5">
                                <span class="todo-desc">Recieve shipment</span> 
                            </label>
                            </div>
                            <div class="item-date"> 26 jun 2017</div>
                        </li>
                        <li class="list-group-item todo-item pb-0" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                <label class="custom-control-label todo-label" for="customCheck6">
                                <span class="todo-desc">Important tasks</span><span class="badge badge-pill badge-success font-medium text-white ml-1">2 weeks </span>
                            </label>
                            </div>
                            <ul class="list-style-none assignedto mt-2">
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                <li class="assignee"><img class="assignee-img" src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="text_name">Name</label>
                                    <input type="text" class="form-control" id="text_name" placeholder="Enter your Name">
                                </div>
                                <div class="form-group">
                                    <label for="txt_email">Email Address</label>
                                    <input type="email" class="form-control" id="txt_email" placeholder="Enter Email">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="calender-sidebar">
                <div id="calendar"></div>
            </div>
            <!-- BEGIN MODAL -->
            <div class="modal none-border" id="my-event">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><strong>Add Event</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Social Cards  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset('dashboard/assets/images/big/img1.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <div class="d-flex no-block align-items-center mb-3">
                    <span class="text-muted"><i class="ti-calendar"></i> May 16</span>
                    <div class="ml-3">
                        <a href="javascript:void(0)" class="link"><i class="ti-heart"></i> 30</a>
                    </div>
                </div>
                <h3 class="mt-3">Top 20 Models are on the ramp</h3>
                <p class="mt-3 font-light">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
                <button class="btn btn-success btn-rounded waves-effect waves-light mt-2 text-white">Read more</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset('dashboard/assets/images/big/img2.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <div class="d-flex no-block align-items-center mb-3">
                    <span class="text-muted"><i class="ti-calendar"></i> Aug 10</span>
                    <div class="ml-3">
                        <a href="javascript:void(0)" class="link"><i class="ti-heart"></i> 32</a>
                    </div>
                </div>
                <h3 class="mt-3">Top 20 Models are on the ramp</h3>
                <p class="mt-3 font-light">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
                <button class="btn btn-success btn-rounded waves-effect waves-light mt-2 text-white">Read more</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset('dashboard/assets/images/big/img3.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <div class="d-flex no-block align-items-center mb-3">
                    <span class="text-muted"><i class="ti-calendar"></i> Jun 16</span>
                    <div class="ml-3">
                        <a href="javascript:void(0)" class="link"><i class="ti-heart"></i> 40</a>
                    </div>
                </div>
                <h3 class="mt-3">Top 20 Models are on the ramp</h3>
                <p class="mt-3 font-light">Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.</p>
                <button class="btn btn-success btn-rounded waves-effect waves-light mt-2 text-white">Read more</button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Chat App, Timeline & Chat Listing  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                Chat Listing
            </h5>
            <div class="p-3">
                <ul class="list-style-none chat-list">
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Varun Dhavan</h5>
                                    <small class="text-success">Online</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Akshay Kumar</h5>
                                    <small class="text-muted">Offline</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Shraddha Kapoor</h5>
                                    <small class="text-success">Online</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/4.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Madhuri Dixit</h5>
                                    <small class="text-danger">Busy</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/5.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Shaina Nehwal</h5>
                                    <small class="text-muted">Offline</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/6.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Varun Dhavan</h5>
                                    <small class="text-success">Online</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Akshay Kumar</h5>
                                    <small class="text-muted">Offline</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" class="rounded-circle" width="40">
                                <div class="ml-3">
                                    <h5 class="mb-0 text-dark">Shraddha Kapoor</h5>
                                    <small class="text-success">Online</small>
                                </div>
                                <div class="ml-auto chat-icon">
                                    <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                    <i class="fas fa-phone"></i> 
                  </button>
                                    <button type="button" class="btn btn-info btn-circle btn-circle ml-2">
                    <i class="far fa-comments"></i> 
                  </button>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <h5 class="card-title p-3 bg-info text-white text-uppercase mb-0">
                User Activity
            </h5>
            <div class="card-body scrollable" style="height: 598px;">
                <div class="steamline mt-0">
                    <div class="sl-item">
                        <div class="sl-left">
                            <button type="button" class="btn btn-success btn-circle btn-circle text-white">
                  <i class="ti-user"></i> 
                </button>
                        </div>
                        <div class="sl-right">
                            <div><a href="javascript:void(0)" class="link text-dark">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                <p class="mt-1 font-light">Contrary to popular belief</p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left">
                            <button type="button" class="btn btn-info btn-circle btn-circle text-white">
                  <i class="fas fa-image"></i> 
                </button>
                        </div>
                        <div class="sl-right">
                            <div><a href="javascript:void(0)" class="link text-dark">Hritik Roshan</a> <span class="sl-date">5 minutes ago</span>
                                <p class="mt-1 font-light">Lorem Ipsum is simply dummy</p>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <img src="{{ asset('dashboard/assets/images/big/img1.jpg') }}" class="img-fluid">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('dashboard/assets/images/big/img2.jpg') }}" class="img-fluid">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('dashboard/assets/images/big/img3.jpg') }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" /> </div>
                        <div class="sl-right">
                            <div><a href="javascript:void(0)" class="link text-dark">Gohn Doe</a> <span class="sl-date">5 minutes ago</span>
                                <p class="mt-1 font-light">The standard chunk of ipsum</p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user" class="rounded-circle" /> </div>
                        <div class="sl-right">
                            <div><a href="javascript:void(0)" class="link text-dark">Varun Dhavan</a> <span class="sl-date">5 minutes ago</span>
                                <p class="font-light">Contrary to popular belief hi there..!</p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-item">
                        <div class="sl-left"> <img src="{{ asset('dashboard/assets/images/users/5.jpg') }}" alt="user" class="rounded-circle" /> </div>
                        <div class="sl-right">
                            <div><a href="javascript:void(0)" class="link text-dark">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span>
                                <p class="mt-1 font-light">The generated lorem ipsum</p>
                                <button class="btn btn-outline-success btn-rounded">Approve</button>
                                <button class="btn btn-outline-danger btn-rounded ml-2">Refuse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <h5 class="card-title text-uppercase p-3 bg-info text-white mb-0">
                Recent Chat
            </h5>
            <div class="card-body">
                <div class="chat-box scrollable" style="height:434px;">
                    <!--chat Row -->
                    <ul class="chat-list">
                        <!--chat Row -->
                        <li class="chat-item">
                            <div class="chat-img"><img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" alt="user"></div>
                            <div class="chat-content">
                                <div class="box bg-light-success">
                                    <h5 class="font-medium">Sonu Nigam</h5>
                                    <p class="font-light mb-0">Hi, All!</p>
                                    <div class="chat-time">10.56 am</div>
                                </div>
                            </div>
                        </li>
                        <!--chat Row -->
                        <li class="odd chat-item">
                            <div class="chat-content">
                                <div class="box bg-light-success">
                                    <h5 class="font-medium">Genelia</h5>
                                    <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                    <div class="chat-time">11.00 am</div>
                                </div>
                            </div>
                            <div class="chat-img"><img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user"></div>
                        </li>
                        <!--chat Row -->
                        <li class="chat-item">
                            <div class="chat-img"><img src="{{ asset('dashboard/assets/images/users/3.jpg') }}" alt="user"></div>
                            <div class="chat-content">
                                <div class="box bg-light-success">
                                    <h5 class="font-medium">Ritesh</h5>
                                    <p class="font-light mb-0">Hi, Sonu and Genelia,</p>
                                    <div class="chat-time">11.02 am</div>
                                </div>
                            </div>
                        </li>
                        <!--chat Row -->
                        <li class="odd chat-item">
                            <div class="chat-content">
                                <div class="box bg-light-success">
                                    <h5 class="font-medium">Genelia</h5>
                                    <p class="font-light mb-0">Hi, How are you Sonu? ur next concert?</p>
                                    <div class="chat-time">11.04 am</div>
                                </div>
                            </div>
                            <div class="chat-img"><img src="{{ asset('dashboard/assets/images/users/2.jpg') }}" alt="user"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="row">
                    <div class="col-9">
                        <div class="input-field mt-0 mb-0">
                            <textarea id="textarea1" placeholder="Type and enter" class="form-control border-0"></textarea>
                        </div>
                    </div>
                    <div class="col-3">
                        <a class="btn-circle btn-lg btn-success float-right text-white" href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection
@section('script')
<!-- This Page JS -->
<script src="{{ asset('dashboard/assets/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('dashboard/assets/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/extra-libs/c3/c3.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/dashboards/dashboard1.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/calendar/cal-init.js') }}"></script>
<script>
    $('#calendar').fullCalendar('option', 'height', 650);

</script>
@endsection