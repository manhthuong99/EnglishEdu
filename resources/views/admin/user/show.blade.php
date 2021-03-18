@extends('admin.master')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
<!-- Icons -->
<link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
      type="text/css">
<!-- Page plugins -->
<!-- Argon CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">
@section('main')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Danh sách người dùng</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive" data-toggle="list"
                     data-list-values='["id" ,"avatar" , "name" , "email", "phone","created_at"]'>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="id">ID</th>
                            <th scope="col" class="sort" data-sort="avatar">Ảnh đại điện</th>
                            <th scope="col" class="sort" data-sort="name">Họ tên</th>
                            <th scope="col" class="sort" data-sort="email">Email</th>
                            <th scope="col" class="sort" data-sort="phone">Số điện thoại</th>
                            <th scope="col" class="sort" data-sort="created_at">Ngày tạo</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list" style="font-size: 20px">
                        @foreach( $listUsers as $user)
                            <tr>
                                <td> <?= $user->user_id ?></td>
                                <td scope="row">
                                    <a href="#" class="avatar rounded-circle mr-1">
                                        <img alt="Image placeholder"
                                             src="{{ asset('storage/avatars/'.$user->avatar) }}">
                                    </a>
                                </td>
                                <td><?= $user->full_name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->phone_number ?></td>
                                <td><?= $user->created_at ?></td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon-only text-danger" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" >
                                            <a class="dropdown-item" href="{{ route('admin.user.edit',$user->user_id) }}">Sửa</a>
                                            <a class="dropdown-item" href="{{ route('admin.user.edit',$user->user_id) }}">Xóa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Card footer -->
                <div class="card-footer py-4">

                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            {{ $listUsers->render() }}
                        </ul>
                    </nav>
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
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>
@stop
