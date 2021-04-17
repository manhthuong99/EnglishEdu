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
                            <h3>Đăng nhập để tiếp tục</h3>
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
                        <form method="POST" action="{{ route('user.check.login') }}">
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
                                <input autocomplete="username" name="email" type="email" class="mdc-text-field__input"
                                       aria-labelledby="email" required="">
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
                                <input autocomplete="current-password" name="password" type="password"
                                       class="mdc-text-field__input" aria-labelledby="password" required="">
                                <div class="error-message"></div>
                            </div>
                            <div class="mdc-form-field">
                                <div class="mdc-checkbox">
                                    <input class="mdc-checkbox__native-control" id="remember" checked="checked"
                                           name="remember" type="checkbox" value="1">
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none"
                                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                </div>
                                <label for="suggest-checkbox">Nhớ mật khẩu</label>
                            </div>
                            <div class="toast" style="display: none;"></div>
                            @if(session()->get('message'))
                                <div class="toast danger">{{ session()->get('message') }}</div>
                            @endif
                            <button
                                class="submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded"
                                type="submit">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Đăng nhập</span>
                            </button>
                            <input name="return" type="hidden">
                            <input name="with" type="hidden">
                        </form>
                        <div class="horizontal-center">
                            <a sytle="font-weight:500;" href="{{ route('user.forgot_password') }}"
                               class="attention_btn attention_btn__white attention_btn__medium attention__subtle mdc-button fluid mdc-ripple-upgraded">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Quên mật khẩu?</span>
                            </a>
                        </div>
                        <div class="divider"></div>
                        <div class="horizontal-center">
                            <a href="{{ route('user.register') }}"
                               class="submit_btn submit_btn__g30 mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Tạo tài khoản mới</span>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

