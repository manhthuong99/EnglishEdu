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
                                <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thông tin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        @foreach($users as $user)
            <form action="{{ route('admin.user.save') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-wrapper">
                            <!-- Input groups -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0" align="center">Hình đại diện</h3>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="avatar-preview">
                                            <img class="avatar-detail" alt="Image placeholder" id="avatar-preview"
                                                 src="{{ asset('storage/avatars/'.$user->avatar) }}" width="100%">
                                        </div>
                                    </div>
                                    <div class="m-auto" align="center">
                                        <input class="btn-outline-success" type="file" name="avatar" id="avatar"
                                               value="{{ $user->avatar }}" hidden>
                                        <label class="btn btn-success mt-3" for="avatar">Thay đổi</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-wrapper">
                            <!-- Input groups -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Thông tin người dùng</h3>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">

                                @csrf
                                <!-- Input groups with icon -->
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                @if( session()->get('failed'))
                                                    <div class="form-group">
                                                        <span style="color: red">{{ session()->get('failed') }}</span>
                                                    </div>
                                                @endif
                                                <label class="form-control-label">Trạng thái</label>
                                                <div class="input-group input-group-merge">
                                                    <label class="custom-toggle">
                                                        <?php $checked = '';
                                                        $status = 'Ngừng hoạt động'?>
                                                        @if($user->status == 1)
                                                            <?php $checked = 'checked';
                                                            $status = 'Đang hoạt động'
                                                            ?>
                                                        @endif
                                                        <input id="status" type="checkbox"
                                                               value="1" name="status" {{ $checked }}>
                                                        <span class="custom-toggle-slider enable-checkbox"
                                                              data-label-off="Off" data-label-on="On"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Họ và tên</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-user"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Họ tên" type="text"
                                                           name="full_name" value="{{ $user->full_name }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Email" name="email"
                                                           type="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Số điện thoại</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Email" name="phone_number"
                                                           type="text" value="{{ $user->phone_number }}">
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
            </form>
        @endforeach
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
@stop
