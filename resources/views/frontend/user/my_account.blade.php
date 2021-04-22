@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
@stop
@section('main')
    @if( session()->get('success'))
           <script> alert('{{ session()->get('success') }}')</script>
    @endif
    @if(\Illuminate\Support\Facades\Auth::check())
        <main id="e2r-page">
            <form id="findYourCourseLeadForm" class="form" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="mdc-layout-grid content-block layout-shim">
                    <div class="mdc-layout-grid__inner content-body" id="hide-when-show-otp">
                        <aside class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 hide-tablet-less">
                            <div class="mdc-card form__sticky-side form__sticky-side--sticky-head">
                                <div>
                                    <div class="avatar-group">
                                        <figure class="avatar avatar__xl">
                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                            @if($user->type_login == 'facebook' || $user->type_login == 'google')
                                                <img id="avatar-header-img" src="{{ $user->avatar }}" alt=""
                                                     data-ll-status="loaded" class="loaded">
                                            @else
                                                <img id="avatar-preview"
                                                     src="{{ asset('storage/avatars/'.$user->avatar) }}" class="loaded">
                                            @endif
                                        </figure>
                                        <div class="avatar-group__info avatar-group__info--xl">
                                            <div class="user-name">{{ $user->full_name }}</div>
                                            <div class="user-name">
                                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                                <input class="btn-outline-success" type="file" name="avatar" id="avatar" hidden="">
                                                <label class="btn btn-sm btn-success mt-3" for="avatar">Thay đổi</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <ul class="menu-list" aria-orientation="vertical">
                                    <li class="menu-list__item">
                                        <a class="button subtle-btn" href=""><span
                                                class="icon i-user n70"></span> Trang cá nhân</a>
                                    </li>
                                    <li class="menu-list__item">
                                        <a class="button subtle-btn"
                                           href="https://edu2review.com/u/VN2108983369/da-mua"><span
                                                class="icon i-cash-register n70"></span> Đã mua</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8">
                            <div class="content-body__article">
                                <div class="content-body__article">
                                    <div class="toast b0" style="width: fit-content; margin: 2rem auto;">
                                        <div class="flex-center">
                                            <div style="max-width: 120px; margin: 1rem; align-self: flex-start;"
                                                 class="hide-sm-less">
                                                <img class="initial fluid loading"
                                                     src="{{ asset('frontend/img/icons/talk.svg') }}"
                                                     data-ll-status="loading">
                                            </div>
                                            <div style="margin: 0.4rem;">
                                                <div>
                                                    <h3 class="b70">Chào mừng bạn đến với gia đình English Review!</h3>
                                                    <p>Bạn có đang tìm kiếm khóa học tiếng Anh nào không? Nếu có, chúng
                                                        tôi
                                                        sẽ
                                                        giúp bạn chọn nơi học phù hợp.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-center">
                                            <input type="hidden" name="email" value="">
                                            <div class="form-fields">
                                                <div>
                                                    <h3 class="b70"></h3>
                                                </div>
                                                <div
                                                    class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                                <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <span class="mdc-notched-outline__leading"></span>
                                                <span class="mdc-notched-outline__notch">
                                                <label for="phone-vouchers-d"
                                                       class="mdc-floating-label mdc-floating-label--required"
                                                       style="">Số điện thoại của bạn.</label>
                                                </span>
                                                <span class="mdc-notched-outline__trailing"></span>
                                                </span>
                                                    <input id="phone-vouchers-d" name="phone_number" type="tel"
                                                           class="mdc-text-field__input"
                                                           value="{{ $user->phone_number }}"
                                                           aria-labelledby="phone-vouchers-d" required="">
                                                    <div class="error-message"></div>
                                                </div>
                                                <button style="margin:0;" id="updateAccount"
                                                        class="attention_btn attention_btn__r30 mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded"
                                                        data-updating="Đang tìm khóa học...">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Cập nhật!</span>
                                                </button>
                                            </div>
                                            <div id="findYourCourseResult" class="" style="display: none;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </section>
                    </div>
                </div>
            </form>
        </main>
    @endif
@stop

