<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>

    <link rel="stylesheet" href="admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/vendors/base/vendor.bundle.base.css">

    <link rel="stylesheet" href="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="admin/css/style.css">

    {{-- <link rel="shortcut icon" href="admin/images/favicon.png" /> --}}
    </head>
    <body>
        <div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a style="font-size: 9px" class="navbar-brand brand-logo" href="{{ route('index') }}"><img src="/images/logo.jpg" style="width: 50px;height:50px" alt="logo"/>Hospital Managment System</a>
                {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> --}}
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-4 w-100">
                <li class="nav-item nav-search d-none d-lg-block w-100">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown me-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-message-text mx-0"></i>
                    <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="{{ asset('admin/images/faces/face21.jpg') }}" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                        <h6 class="ellipsis font-weight-normal">David Grey
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                            The meeting is cancelled
                        </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="admin/images/faces/face21.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                        <h6 class="ellipsis font-weight-normal">Tim Cook
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                            New product launch
                        </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                        <h6 class="ellipsis font-weight-normal"> Johnson
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                            Upcoming board meeting
                        </p>
                        </div>
                    </a>
                    </div>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell mx-0"></i>
                    <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                        <div class="item-icon bg-success">
                            <i class="mdi mdi-information mx-0"></i>
                        </div>
                        </div>
                        <div class="item-content">
                        <h6 class="font-weight-normal">Application Error</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                            Just now
                        </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                        <div class="item-icon bg-warning">
                            <i class="mdi mdi-settings mx-0"></i>
                        </div>
                        </div>
                        <div class="item-content">
                        <h6 class="font-weight-normal">Settings</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                            Private message
                        </p>
                        </div>
                    </a>
                    <a class="dropdown-item">
                        <div class="item-thumbnail">
                        <div class="item-icon bg-info">
                            <i class="mdi mdi-account-box mx-0"></i>
                        </div>
                        </div>
                        <div class="item-content">
                        <h6 class="font-weight-normal">New user registration</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                            2 days ago
                        </p>
                        </div>
                    </a>
                    </div>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <div class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="images/{{ Auth::user()->image }}" alt="profile"/>
                        <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                    </div>

                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('setting') }}">
                            <i class="mdi mdi-settings text-primary"></i>
                            Settings
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
                </button>
            </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">User settings</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                {{-- <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Show users </a></li> --}}
                                <li class="nav-item"> <a class="nav-link" href="{{ route('create') }}"> Add user </a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">
                        <i class="mdi mdi-script menu-icon"></i>
                        <span class="menu-title">Update News</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
                        <i class="mdi mdi-script menu-icon"></i>
                        <span class="menu-title">News</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="news">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('news') }}"> Show news </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('create_news') }}"> Create news </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('messages') }}">
                        <i class="mdi mdi-comment-text menu-icon"></i>
                        <span class="menu-title">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('setting') }}">
                        <i class="mdi mdi-settings menu-icon"></i>
                        <span class="menu-title">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout menu-icon"></i>
                        <span class="menu-title">Logout</span>
                        </a>
                    </li>
                    </ul>
                </nav>

                @yield('content')
            </div>
        </div>

    <!-- plugins:js -->
    <script src="admin/vendors/base/vendor.bundle.base.js"></script>

    <script src="admin/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

    <script src="admin/js/off-canvas.js"></script>
    <script src="admin/js/hoverable-collapse.js"></script>
    <script src="admin/js/template.js"></script>

    <script src="admin/js/dashboard.js"></script>
    <script src="admin/js/data-table.js"></script>
    <script src="admin/js/jquery.dataTables.js"></script>
    <script src="admin/js/dataTables.bootstrap4.js"></script>

    <script src="admin/js/jquery.cookie.js" type="text/javascript"></script>
</body>

<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Developed By :  <a href="https://github.com/yousefHijazi1" style="text-decoration: none" target="_blank"> Yousef Hijazi </a>2023</span>
        {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span> --}}
    </div>
    </footer>

</html>

