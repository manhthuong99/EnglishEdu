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
                                <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thay đổi thông tin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <form action="{{ route('admin.center.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach($centers as $center)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-wrapper">
                            <!-- Input groups -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-0" align="center">Hình đại diện</h3>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="center-image">
                                            @if($center->avatar != 'center.jpg')
                                                <img class="" alt="Image placeholder" id="avatar-preview"
                                                     src="{{ asset('storage/avatars/'.$center->avatar) }}" width="100%">
                                            @else
                                                <img class="" alt="Image placeholder" id="avatar-preview"
                                                     src="{{ asset('assets/img/theme/center.jpg') }}" width="100%">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="m-auto" align="center">
                                        <input value="" class="btn-outline-success" type="file"
                                               name="avatar" id="avatar" hidden>
                                        <label class="btn btn-success mt-3" for="avatar">Tải lên</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Tên trung tâm</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-badge"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Tên trung tâm" name="name"
                                                       value="{{ $center->name }}" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Người quản lý</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-user"></i></span>
                                                </div>
                                                <select class="form-control" name="user_id" id="user_id" required>
                                                    <option disabled selected> -- Chọn --</option>
                                                    @foreach( $users as $key => $user)
                                                        @if($user->user_id == $center->user_id)
                                                            <option value="{{ $user->user_id }}" selected>{{ $user->full_name }}</option>
                                                        @else
                                                            <option value="{{ $user->user_id }}">{{ $user->full_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
                                <div class="card-header">
                                    <h3 class="mb-0">Thông tin trung tâm</h3>
                                </div>
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
                                            <div class="form-group">
                                                <label class="form-control-label">Trạng thái</label>
                                                <div class="input-group input-group-merge">
                                                    <label class="custom-toggle">
                                                        @if($center->status == 1)
                                                            @php($checked = 'checked')
                                                        @else
                                                            @php($checked='')
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
                                                <label class="form-control-label">Email</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Email" name="email"
                                                           value="{{ $center->email }}" type="email" required>
                                                    <input name="center_id" type="hidden" value="{{ $center->center_id }}">
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
                                                    <input class="form-control" placeholder="Số điện thoại"
                                                           value="{{ $center->phone_number }}" name="phone_number"
                                                           type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Tỉnh/TP</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-square-pin"></i></span>
                                                    </div>
                                                    <select class="form-control" name="province"
                                                            id="province" type="text">
                                                        <option disabled selected value> -- Chọn Tỉnh/TP --</option>
                                                        @foreach($provinces as $province)
                                                            @if($center->province_id == $province->id)
                                                            <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                                                            @else
                                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Quận/Huyện</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-square-pin"></i></span>
                                                    </div>
                                                    <select class="form-control" name="district"
                                                            id="district">
                                                        <option disabled value="" selected="selected">-- Chọn Quận/Huyện
                                                            --
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Địa chỉ</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-square-pin"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Địa chỉ" name="address"
                                                           value="{{ $center->address }}" id="" type="text" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Website</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-world"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Website" name="website"
                                                           value="{{ $center->website }}" id="website" type="text">
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
                                                              cols="100">{{ $center->description  }}</textarea>
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
