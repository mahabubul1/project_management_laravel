<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                        <img src="{{ asset('dashboard/assets/images/users/1.jpg') }}" class="rounded-circle ml-2" width="30">
                        <span class="hide-menu">{{ Auth::user()->first_name }} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('profile') }}" class="sidebar-link">
                                <i class="ti-user"></i>
                                <span class="hide-menu"> My Profile </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="ti-wallet"></i>
                                <span class="hide-menu"> My Balance </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="ti-email"></i>
                                <span class="hide-menu"> Inbox </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('accountSettings') }}" class="sidebar-link">
                                <i class="ti-settings"></i>
                                <span class="hide-menu"> Account Setting </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="fas fa-power-off"></i>
                                <span class="hide-menu"> Logout </span>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(hasRole('admin'))
                <!-- Users -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('users') }}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('theme-setting') }}" aria-expanded="false">
                       <i class="fas fa-cog"></i>
                        <span class="hide-menu">Theme setting</span>
                    </a>
                </li>
                @endif
                <!-- task/order -->
                @if(hasRole('admin|manager|writer'))
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('tasks') }}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Tasks</span>
                    </a>
                </li>
                @endif
                @if(hasRole('client'))
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('tasks') }}" aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ==============================================================