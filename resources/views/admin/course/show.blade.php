@extends('admin.master')
@section('header')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
          type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my-style.css') }}">
@stop
@section('main')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Quản lý Khóa học</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('admin.course.create') }}" class="btn btn-lg btn-neutral">Tạo mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">DANH SÁCH KHÓA HỌC</h3>
                        @if( session()->get('success'))
                            <div class="success">
                                <span style="color: green">{{ session()->get('success') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Khóa Học</th>
                                <th>Trung tâm</th>
                                <th>Giá</th>
                                <th>Loại</th>
                                <th>Loại Học viên</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $i = 1)
                            @foreach( $courses as $course)
                                <?php
                                $color = 'green';
                                $status = 'Đang hoạt động';
                                if ($course['status'] == 0) {
                                    $color = 'red';
                                    $status = 'Ngừng hoạt động';
                                }
                                ?>
                                <tr>
                                    <td>{{ $i ++ }}</td>
                                    <td>{{ $course['name'] }}</td>
                                    <td>{{ $course['center']['name'] }}</td>
                                    <td>{{ $course['price'] }} VNĐ</td>
                                    <td>{{ $course['type'] }}</td>
                                    <td>{{ $course['type_customer'] }}</td>
                                    <td> <span
                                            style="margin: auto; color: {{ $color }};margin-right: 20px">{{ $status }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                        <span class="btn btn-sm btn-icon-only text-danger" role="button"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"
                                                 style="width: 100px">
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.course.edit',$course['course_id']) }}">Sửa</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.course.delete',$course['course_id']) }}">Xóa</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
    <script src="{{ asset('assets/js/my-function.js') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>

    <script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')  }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
@stop
