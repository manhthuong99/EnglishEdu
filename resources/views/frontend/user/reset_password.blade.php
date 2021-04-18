@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
@stop
@section('main')
    <main id="e2r-page" style="padding-top: 3.4rem;">
        <div class="mdc-layout-grid content-block layout-shim">
            <div class="mdc-layout-grid__inner content-body">
                <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 hide-tablet-less">
                    <header class="content-header">
                        <h4 class="content-header__title">
                            Quên mật khẩu đăng nhập?
                        </h4>
                    </header>
                    <p style="max-width: 60%;">Bạn quên mật khẩu đăng nhập? Nhập email để được hướng dẫn đặt lại mật
                        khẩu mới.</p>
                    <img class="img-fluid loaded"
                         src="{{ asset('frontend/img/login-1.svg') }}"
                         alt="alt name" data-ll-status="loaded">
                </section>
                <section
                    class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-tablet">
                    <div class="auth-form-group">
                        <div class="content-block-title">
                            <h3>Đặt lại mật khẩu</h3>
                        </div>
                        <p>
                            Bạn đang yêu cầu đặt lại mật khẩu, hãy nhập mật khẩu mới vào hai ô bên dưới.
                        </p>
                        <form method="POST" action="{{ route('user.resetPassword') }}">
                            @csrf
                            <input name="token_reset" type="hidden" value="{{ $token }}">
                            <div
                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid mdc-text-field--invalid">
                                <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch" style="">
                                <label for="password" class="mdc-floating-label mdc-floating-label--required" style="">Mật khẩu</label>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                <input name="password" type="password" class="mdc-text-field__input"
                                       autocomplete="new-password" aria-labelledby="password" required=""
                                       aria-autocomplete="list">
                            </div>
                            <div
                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid mdc-text-field--invalid">
                                <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <span class="mdc-notched-outline__leading"></span>
                                <span class="mdc-notched-outline__notch" style="">
                                <label for="verify_password" class="mdc-floating-label mdc-floating-label--required"
                                       style="">Xác nhận lại mật khẩu</label>
                                </span>
                                <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                <input name="repassword" type="password" class="mdc-text-field__input"
                                       autocomplete="new-password" aria-labelledby="verify_password" required="">
                                @if(session()->get('failed'))
                                    <div class="error-message">{{ session()->get('failed') }}</div>
                                @endif
                                <div class="error-message"></div>
                            </div>
                            @if(session()->get('success'))
                                <div class="toast success">{{ session()->get('success') }}
                                    <a href="{{ route('user.login') }}" class="text-blue">Đăng nhập</a>
                                </div>
                            @endif
                            @if(session()->get('timeout'))
                                <div class="toast danger">{{ session()->get('timeout') }}</div>
                            @endif
                            <button
                                class="submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid submit-btn mdc-ripple-upgraded"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Đặt lại mật khẩu</span>
                            </button>
                            <input name="token" type="hidden" value="ef255b32f9a057035d7777a4bd0c1cfe">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

