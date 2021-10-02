<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Admin EnglishReview</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/icons/hacker.png') }}" type="image/x-icon">
    <!-- Fonts -->
    @yield('header')
</head>

<body>
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('admin.dashboards.index') }}">
                <img src="{{ asset('assets/img/theme/logo.png') }}" class="navbar-brand-img" alt="..."
                     style="width: 200px; height: 100px">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                @if(\Illuminate\Support\Facades\Auth::user()->permission == 0)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button"
                           aria-expanded="true" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Trang chủ </span>
                        </a>
                        <div class="collapse show" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.dashboards.index') }}" class="nav-link">Thống kê</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-circle-08 text-orange"></i>
                            <span class="nav-link-text">Quản lý người dùng </span>
                        </a>
                        <div class="collapse" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.create') }}" class="nav-link"><i class="ni ni-bold-right"></i>Tạo mới</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-components">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">Quản lý trung tâm</span>
                        </a>
                        <div class="collapse" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.center.create') }}" class="nav-link"><i class="ni ni-bold-right"></i>Tạo mới</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.center.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.center.registerCenter') }}" class="nav-link"><i class="ni ni-spaceship"></i>Yêu cầu</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-forms">
                            <i class="ni ni-briefcase-24 text-blue"></i>
                            <span class="nav-link-text">Quản lý khóa học</span>
                        </a>
                        <div class="collapse" id="navbar-forms">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.course.create') }}" class="nav-link"><i class="ni ni-bold-right"></i>Tạo mới</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.course.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-maps">
                            <i class="ni ni-favourite-28 text-red"></i>
                            <span class="nav-link-text">Nhận xét và đánh giá</span>
                        </a>
                        <div class="collapse" id="navbar-maps">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.review.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="navbar-tables">
                            <i class="ni ni-align-left-2 text-default"></i>
                            <span class="nav-link-text">Báo cáo</span>
                        </a>
                        <div class="collapse" id="navbar-tables">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin.report.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="navbar-dashboards">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Trang chủ </span>
                            </a>
                            <div class="collapse show" id="navbar-dashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.dashboards.index') }}" class="nav-link">Thống kê</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="navbar-components">
                                <i class="ni ni-ui-04 text-info"></i>
                                <span class="nav-link-text">Quản lý trung tâm</span>
                            </a>
                            <div class="collapse" id="navbar-components">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.center.create') }}" class="nav-link"><i class="ni ni-bold-right"></i>Tạo mới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.center.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="navbar-forms">
                                <i class="ni ni-briefcase-24 text-blue"></i>
                                <span class="nav-link-text">Quản lý khóa học</span>
                            </a>
                            <div class="collapse" id="navbar-forms">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.course.create') }}" class="nav-link"><i class="ni ni-bold-right"></i>Tạo mới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.course.index') }}" class="nav-link"><i class="ni ni-bullet-list-67"></i>Danh sách</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
            @endif

                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Hướng dẫn sử dụng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Giao diện</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="#">
                            <i class="ni ni-ui-04"></i>
                            <span class="nav-link-text">Cài đặt</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </form>
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                             data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="ni ni-bell-55"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">Bạn có <strong class="text-primary">?</strong>
                                    thông báo.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder"
                                                 src="{{ asset('assets/img/theme/team-1.jpg') }}"
                                                 class="avatar rounded-circle">
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">Tên ai đó</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>1 giờ trước</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Thông báo cái gì đó!</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- View all -->
                            <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">View
                                all</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="ni ni-ungroup"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                            <div class="row shortcuts px-4">
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                                    <small>Calendar</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                                    <small>Email</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                                    <small>Payments</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                                    <small>Reports</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                                    <small>Maps</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                                    <small>Shop</small>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="{{ asset('assets/img/theme/avatar_admin.jpg') }}"></span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ \Illuminate\Support\Facades\Auth::user()->full_name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Tài khoản của tôi</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Cài đặt</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.user.logout') }}" class="dropdown-item">
                                <i class="ni ni-bold-left"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('main')
</div>
</body>

@yield('footer')
</html>
