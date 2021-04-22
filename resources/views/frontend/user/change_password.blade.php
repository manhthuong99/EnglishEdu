@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
@stop
@section('main')
    @if(\Illuminate\Support\Facades\Auth::check())
        <main id="e2r-page">
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
                                            <img id="avatar-header-img"
                                                 src="{{ asset('storage/avatars/'.$user->avatar) }}" alt=""
                                                 data-ll-status="loaded" class="loaded">
                                        @endif
                                    </figure>
                                    <div class="avatar-group__info avatar-group__info--xl">
                                        <div class="user-name">{{ $user->full_name }}</div>
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
                            <div class="hide-tablet-more">
                                <div class="avatar-group">
                                    <figure class="avatar avatar__lg">
                                        <img src=""
                                             alt="">
                                    </figure>
                                    <div class="avatar-group__info avatar-group__info--xl">
                                        <div class="user-name">{{ $user->full_name }}</div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                            </div>
                        </div>
                        <div class="content-body__article">
                            <div class="content-block-title">
                                <h3>Thay đổi mật khẩu</h3>
                            </div>
                            <form method="POST" action="{{ route('user.changePassword') }}" id="changePasswordForm">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch">
                                <label for="old-password" class="mdc-floating-label mdc-floating-label--required"
                                       style="">Mật khẩu cũ</label>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                    <input name="old_password" type="password" class="mdc-text-field__input"
                                           aria-labelledby="old-password" required="">
                                    @if(session()->get('old-pass-error'))
                                        <div class="error-message">{{ session()->get('old-pass-error') }}</div>
                                    @endif
                                </div>
                                <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch">
                                <label for="password" class="mdc-floating-label mdc-floating-label--required" style="">Mật khẩu mới</label>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                    <input name="password" type="password" class="mdc-text-field__input"
                                           aria-labelledby="password" autocomplete="new-password" required="">
                                </div>
                                <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch">
                                <label for="verify_password" class="mdc-floating-label mdc-floating-label--required"
                                       style="">Xác nhận lại mật khẩu</label>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                    <input name="verify_password" type="password" class="mdc-text-field__input"
                                           aria-labelledby="verify_password" required="">
                                    @if(session()->get('password-error'))
                                        <div class="error-message">{{ session()->get('password-error') }}</div>
                                    @endif
                                </div>
                                <div class="toast" style="display: none;"></div>
                                @if(session()->get('success'))
                                    <div class="toast success">{{ session()->get('success') }}</div>
                                @endif
                                <button id=""
                                        class="flex-center submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded"
                                        type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Thực hiện đổi mật khẩu</span>
                                </button>
                            </form>
                        </div>
                        <br>
                    </section>
                </div>
            </div>
        </main>
    @endif
@stop

