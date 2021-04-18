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
                            Đăng nhập tài khoản EnglishReview
                        </h4>
                    </header>
                    <img class="img-fluid loaded"
                         src="{{ asset('frontend/img/login-1.svg') }}"
                         alt="alt name" data-ll-status="loaded">
                </section>
                <section
                    class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-tablet">
                    <div class="auth-form-group">
                        <div class="content-block-title">
                            <h3>Đăng ký với</h3>
                        </div>
                        <a class="attention_btn attention_btn__white mdc-button mdc-button--outlined fluid mdc-ripple-upgraded"
                           href="{{ route('redirect.login','facebook') }}">
                            <span class="icon i-facebook-f"></span>
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Facebook</span>
                        </a>
                        <p></p>
                        <a class="attention_btn attention_btn__white mdc-button mdc-button--outlined fluid mdc-ripple-upgraded"
                           href="{{ route('redirect.login','google') }}">
                            <span class="icon i-google-plus-g"></span>
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Google</span>
                        </a>
                        <p></p>
                        <h3>Hoặc email</h3>
                        <form method="POST" action="{{ route('user.save') }}" class="form sign-up-submit-form">
                            @csrf
                            <div
                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                            <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch" style="">
                            <label for="last_name" class="mdc-floating-label mdc-floating-label--required" style="">Họ và tên</label>
                            </span>
                            <span class="mdc-notched-outline__trailing"></span>
                            </span>
                                <input name="full_name" type="text" class="mdc-text-field__input"
                                       aria-labelledby="last_name" required="">
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                            <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                            <label for="email" class="mdc-floating-label" style="">Email</label>
                            </span>
                            <span class="mdc-notched-outline__trailing"></span>
                            </span>
                                <input name="email" type="email" autocomplete="email" class="mdc-text-field__input"
                                       aria-labelledby="email" id="validate-email">
                                @if(session()->get('email-error'))
                                    <div class="error-message">{{ session()->get('email-error') }}</div>
                                @endif
                                <div class="error-message" id="email-error"></div>
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                            <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                            <label for="password" class="mdc-floating-label mdc-floating-label--required" style="">Mật khẩu</label>
                            </span>
                            <span class="mdc-notched-outline__trailing"></span>
                            </span>
                                <input name="password" type="password" class="mdc-text-field__input"
                                       autocomplete="new-password" aria-labelledby="password" required="">
                            </div>
                            <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                            <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                            <label for="verify_password" class="mdc-floating-label mdc-floating-label--required"
                                   style="">Xác nhận lại mật khẩu</label>
                                @if(session()->get('email-password'))
                                    <div class="error-message">{{ session()->get('email-password') }}</div>
                                @endif
                            </span>
                            <span class="mdc-notched-outline__trailing"></span>
                            </span>
                                <input name="verify_password" type="password" class="mdc-text-field__input"
                                       aria-labelledby="verify_password" autocomplete="new-password" required="">
                            </div>
                            <div class="toast" style="display: none;"></div>
                            @if(session()->get('success'))
                                <div class="toast success">{{ session()->get('success') }}
                                    <a href="{{ route('user.login') }}" class="text-blue">Đăng nhập</a>
                                </div>
                            @endif
                            <div style="margin-top: 1rem">Bằng cách click xác nhận đăng ký, tôi đồng ý với các <a
                                    href="#" target="_blank">quy định</a> và
                                <a href="#" target="_blank">điều khoản</a> của
                                EnglishReview.
                            </div>
                            <button id="authFormSubmitBtn"
                                    class="submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid submit-btn mdc-ripple-upgraded"
                                    type="submit">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Xác nhận đăng ký</span>
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

