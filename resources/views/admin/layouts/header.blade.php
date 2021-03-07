<!-- Navigation Bar-->
<header id="topnav">
  <div class="topbar-main">
    <div class="container-fluid">
        <!-- Logo container-->
        <div class="logo">
            <!-- Image Logo -->
            <a href="{{ route('/home') }}" class="logo"> <img src="{{ asset('website/images/header-logo-2.png') }}" alt="" class="logo-large">
            </a>
        </div>
        <!-- End Logo container-->
        <div class="menu-extras topbar-custom">
            <ul class="list-inline float-right mb-0">
                <!-- notification-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false"> 
                        <i class="ti-email noti-icon"></i>
                    </a>
                </li>
                <!-- notification-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false"> <i class="ti-bell noti-icon">
                        </i> <span class="badge badge-success noti-icon-badge">0</span> </a>
                </li>
                <!-- User-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false"> <img
                            src="{{ asset('dashboard/assets/images/users/avatar-1.png') }}" alt="user" class="rounded-circle"> </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        @if (Auth::user()->user_role != "ADMIN")
                            <a class="dropdown-item" href="#">
                                <b>ID: {{ Auth::user()->id }}</b>
                            </a>
                            <a class="dropdown-item" href="{{ route('/profile') }}">
                                <i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile
                            </a>
                        @else
                            <a class="dropdown-item" href="#">
                                <b>{{ Auth::user()->name }}</b>
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('change-password') }}">
                            <i class="mdi mdi-key m-r-5 text-muted"></i> Change Password
                        </a>
                        <div class="dropdown-divider"> </div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                            <i class="mdi mdi-logout m-r-5 text-muted"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form> 
                    </div>
                </li>
                <li class="menu-item list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines"> <span>

                            </span> <span>

                            </span> <span>

                            </span> </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
            </ul>
        </div>
        <!-- end menu-extras -->
        <div class="clearfix"> </div>
    </div>
    <!-- end container -->
  </div>
  <!-- end topbar-main -->
  <!-- MENU Start -->
  <div class="navbar-custom">
    <div class="container-fluid">
      <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu text-center">
            <li class="has-submenu">
                <a href="{{ route('/home') }}"> <i class="mdi mdi-airplay"></i>Dashboard</a>
            </li>
            @if (Auth::user()->user_role != "ADMIN")
                {{-- <li class="has-submenu">
                    <a href="{{ route('/referral/new') }}"> <i class="mdi mdi-account-multiple-plus">

                        </i>Add User</a>
                </li> --}}
                <li class="has-submenu">
                    <a href="{{ route('/tree') }}"> <i class="mdi mdi-tree">

                        </i>Binary Tree</a>
                </li>
                <li class="has-submenu">
                    <a href="#"> 
                        <i class="mdi mdi-coin"></i>
                        Payment Report
                    </a>
                    <ul class="submenu">
                        <li> <a href="{{ route('/payment/report/roi') }}">ROI Income</a> </li>
                        <li> <a href="{{ route('/payment/report/direct-referral') }}">Referral Income</a> </li>
                        <li> <a href="{{ route('/payment/report/binary-income') }}">Binary Income</a> </li>
                        <li> <a href="{{ route('/payment/report/overall-payout') }}">Overall Payout</a> </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="{{ route('/profile') }}"> <i class="mdi mdi-account">

                        </i>My Profile</a>
                </li>
            @else
                <li class="has-submenu">
                    <a href="#"> 
                        <i class="mdi mdi-account"></i>
                        Customers
                    </a>
                    <ul class="submenu">
                        <li> <a href="{{ route('/admin/customers/password') }}">Update Password</a> </li>
                        <li> <a href="{{ route('/admin/customers') }}">All Customers</a> </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#"> 
                        <i class="mdi mdi-coin"></i>
                        Payout Report
                    </a>
                    <ul class="submenu">
                        <li> <a href="{{ route('/admin/payouts') }}">All Payouts</a> </li>
                        <li> <a href="{{ route('/admin/payouts/reversed') }}">Reversed</a> </li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- End navigation menu -->
      </div>
      <!-- end #navigation -->
    </div>
    <!-- end container -->
  </div>
  <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->