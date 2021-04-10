@extends('admin.master')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
          type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">
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
                                <li class="breadcrumb-item"><a href="#">Quản lý khóa học</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tạo mới</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <form action="{{ route('admin.course.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($courses as $course)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-wrapper">
                            <div class="card">
                                <!-- Card header -->
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Input groups with icon -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if( session()->get('failed'))
                                                <div class="form-group">
                                                    <span style="color: red">{{ session()->get('failed') }}</span>
                                                </div>
                                            @endif
                                            @if( session()->get('success'))
                                                <div class="form-group">
                                                    <span class="text-success">{{ session()->get('success') }}</span>
                                                </div>
                                            @endif
                                            <input class="form-control" name="course_id"
                                                   value="{{ $course['course_id'] }}" type="hidden">
                                            <div class="form-group">
                                                <label class="form-control-label">Trạng thái</label>
                                                <div class="input-group input-group-merge">
                                                    <label class="custom-toggle">
                                                        <input id="status" type="checkbox"
                                                               value="1" name="status" checked>
                                                        <span class="custom-toggle-slider enable-checkbox"
                                                              data-label-off="Off" data-label-on="On"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Trung tâm</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-user"></i></span>
                                                    </div>
                                                    <select class="form-control" name="center_id" id="user_id" required>
                                                        <option disabled selected> -- Chọn --</option>
                                                        @foreach( $centers as $center)
                                                            <option
                                                                value="{{ $center['center_id'] }}">{{ $center['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Tên khóa học</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-briefcase-24"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Tên khóa học" name="name"
                                                           value="{{ $course['name'] }}" type="text" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Giá</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-money-bill-alt"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Giá"
                                                           value="{{ $course['price'] }}" name="price" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Giảm giá</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-tag"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Giảm giá" name="discount"
                                                           value="{{ $course['discount'] }}" id="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Loại khóa học</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-bullet-list-67"></i></span>
                                                    </div>
                                                    <select class="form-control" name="type" id="type" required>
                                                        <option disabled selected> -- Chọn --</option>
                                                        <option value="Giao tiếp cơ bản">Giao tiếp cơ bản</option>
                                                        <option value="Giao tiếp nâng cao">Giao tiếp nâng cao</option>
                                                        <option value="Giao tiếp trung cấp">Giao tiếp trung cấp</option>
                                                        <option value="Giành cho trẻ em">Giành cho trẻ em</option>
                                                        <option value="Business English">Business English</option>
                                                        <option value="0">Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 select_other" id="other_type">
                                            <div class="form-group">
                                                <label class="form-control-label">Loại khóa học khác</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-sort-numeric-up-alt"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Loại khóa học khác"
                                                           name="other_type"
                                                           value="{{ old('other_type') }}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Số buổi học</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-sort-numeric-up-alt"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Số buổi học"
                                                           name="number_of_session"
                                                           value="{{ $course['number_of_session'] }}" id="website"
                                                           type="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-wrapper">
                            <!-- Input groups -->
                            <div class="card">
                                <!-- Card header -->
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Input groups with icon -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Ngày bắt đầu</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Số buổi học"
                                                           name="study_time"
                                                           value="{{ $course['study_time'] }}" id="website" type="date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Loại Khách hàng</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-user"></i></span>
                                                    </div>
                                                    <select class="form-control" name="type_customer" id="type_customer"
                                                            required>
                                                        <option disabled selected> -- Chọn --</option>
                                                        <option value="Trẻ em">Trẻ em</option>
                                                        <option value="Học sinh">Học sinh</option>
                                                        <option value="Người đi làm">Người đi làm</option>
                                                        <option value="Mọi lứa tuổi">Mọi lứa tuổi</option>
                                                        <option value="0">khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 select_other" id="other_customer">
                                            <div class="form-group">
                                                <label class="form-control-label">Loại khách hàng khác</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-ui-04"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Loại khách hàng khác"
                                                           name="other_customer" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Yêu cầu đầu vào</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-align-left-2"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Yêu cầu đầu vào"
                                                           name="input_requirement"
                                                           value="{{ $course['input_requirement'] }}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Cam kết đầu ra</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-notification-70"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Cam kết đầu ra"
                                                           value="{{ $course['out_requirement'] }}"
                                                           name="out_requirement"
                                                           type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Mô tả</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <textarea id="description" name="description" rows="10"
                                                              cols="100">{{ $course['description'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control btn-outline-success" type="submit"
                                                           value="Lưu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
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
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>
    <script src="{{ asset('assets/js/my-function.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('description')
            $('.textarea').wysihtml5()
        })
    </script>
@stop
