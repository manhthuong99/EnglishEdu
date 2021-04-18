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
                    <p style="max-width: 60%;">Bạn quên mật khẩu đăng nhập? Nhập email để được hướng dẫn đặt lại mật khẩu mới.</p>
                    <img class="img-fluid loaded"
                         src="{{ asset('frontend/img/login-1.svg') }}"
                         alt="alt name" data-ll-status="loaded">
                </section>
                <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-tablet">
                    <div class="auth-form-group">
                        <div class="content-block-title">
                            <h3>Quên mật khẩu</h3>
                        </div>
                        <p>
                            Vui lòng nhập email đã đăng ký để nhận hướng dẫn đặt lại mật khẩu.
                        </p>
                        <form method="POST" action="{{ route('user.sendmail') }}">
                            @csrf
                            <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                            <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                            <label for="email" class="mdc-floating-label mdc-floating-label--required"
                                   style="">Email</label>
                            </span>
                            <span class="mdc-notched-outline__trailing"></span>
                            </span>
                                <input name="email" type="email" autocomplete="email" class="mdc-text-field__input" aria-labelledby="email" required="">
                                @if(session()->get('failed'))
                                    <div class="error-message">{{ session()->get('failed') }}</div>
                                @endif
                            </div>
                            <button class="submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded" type="submit">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Gửi yêu cầu</span>
                            </button>
                        </form>
                        @if(session()->get('success'))
                            <div class="toast success">Các thông tin liên quan đến đặt lại mật khẩu đã được gửi đến email của bạn.<br>
                                Nếu bạn không tìm thấy trong hộp thư đến, vui lòng kiểm tra trong hộp thư rác.</div>
                        @endif
                        <div class="horizontal-center">
                            <a sytle="font-weight:500;" href="{{ route('user.login') }}" class="attention_btn attention_btn__white attention_btn__medium attention__subtle mdc-button fluid mdc-ripple-upgraded">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Quay về trang đăng nhập</span>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

