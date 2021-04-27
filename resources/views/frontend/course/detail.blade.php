@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
@stop
@section('main')
    <main id="e2r-page" class="e2r-page">
        @foreach( $courses as $course)
            <div class="mdc-layout-grid content-block layout-shim">
                <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12"></div>
                    <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 content-block-cell">
                        <header class="content-header">
                            <h1 class="content-header__title">Khóa học {{ $course['name'] }}</h1>
                            <div class="toast b0 fluid">
                                <div class="chip">
                                    <i class="fas fa-tags"></i>
                                    @if($course['discount'])
                                    <h4 class="chip__title" style="margin-top: 0"> Giá gốc</h4>
                                    <del>{{ number_format($course['price']) }} ₫</del>
                                    Nay chỉ còn <b
                                        class="r30">{{ number_format((int)$course['price'] - (int)$course['discount'])}}
                                        ₫</b>
                                    @else
                                        <h4 class="chip__title" style="margin-top: 0"> Giá </h4>
                                         <b class="r30">{{ number_format((int)$course['price'])}}₫</b>
                                    @endif
                                </div>
                                <div class="chip">
                                    <i class="fas fa-graduation-cap"></i>
                                    <h4 class="chip__title" style="margin-top: 0">Trình độ</h4>
                                    {{ $course['type'] }}
                                </div>
                                <div class="chip">
                                    <i class="fas fa-user"></i>
                                    <h4 class="chip__title" style="margin-top: 0">Đối tượng</h4>
                                    {{ $course['type_customer'] }}
                                </div>
                                <div class="chip">
                                    <i class="far fa-clock"></i>
                                    <h4 class="chip__title" style="margin-top: 0">Thời gian</h4>
                                    Giao tiếp Cơ bản
                                </div>
                            </div>
                        </header>
                        <main class="content-body">
                            <article class="content-body__article">
                                <div class="full-description__info">
                                    <div class="full-description__details">
                                        <article>
                                            <h3>Thông tin chung</h3>
                                            <ul>
                                                <li> {{ $course['center']['name'] }}</li>
                                                @if($course['try_study'])
                                                    <li>Học thử: Học viên được học thử</li>
                                                @else
                                                    <li>Học thử: Không có học thử</li>
                                                @endif
                                                <li>Số điện thoại: {{ $course['center']['phone_number'] }}</li>
                                                <li>Email: {{ $course['center']['email'] }}</li>
                                            </ul>
                                            <h3>Chi tiết khóa học</h3>
                                           <p>
                                               {{ $course['description'] }}
                                           </p>
                                        </article>
                                    </div>
                                </div>
                            </article>
                        </main>
                    </section>
                    <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 content-block-cell">
                        <div class="form__sticky-side">
                            <div class="mdc-card">
                                <div class="mdc-card__actions">
                                    <div class="form-block fluid">
                                        <form class="form submit-form" action="{{ route('consulting.create') }}"
                                              method="POST">
                                            <div class="content-block-title">
                                                <h3>Bạn cần tư vấn? <br> Hãy liện hệ với {{ $course['center']['name'] }}
                                                </h3>
                                            </div>
                                            @csrf
                                            @if( \Illuminate\Support\Facades\Auth::check())
                                                <input type="hidden" name="user_id"
                                                       value="{{ \Illuminate\Support\Facades\Auth::user()->user_id }}">
                                            @endif
                                            <input type="hidden" name="center_id"
                                                   value="{{ $course['center']['center_id'] }}">
                                            <div
                                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                                        <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <span class="mdc-notched-outline__leading"></span>
                                                        <span class="mdc-notched-outline__notch">
                                                        <label for="additional"
                                                               class="mdc-floating-label mdc-floating-label" style="">Họ và tên</label>
                                                        </span>
                                                        <span class="mdc-notched-outline__trailing"></span>
                                                        </span>
                                                <input name="full_name" type="text"
                                                       class="mdc-text-field__input"
                                                       aria-labelledby="additional" required>
                                            </div>
                                            <div
                                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                                        <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <span class="mdc-notched-outline__leading"></span>
                                                        <span class="mdc-notched-outline__notch">
                                                        <label for="phone_number"
                                                               class="mdc-floating-label mdc-floating-label" style="">Số điện thoại</label>
                                                        </span>
                                                        <span class="mdc-notched-outline__trailing"></span>
                                                        </span>
                                                <input name="phone_number" type="tel"
                                                       autocomplete="tel-national" class="mdc-text-field__input"
                                                       aria-labelledby="phone_number">
                                            </div>
                                            <div
                                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                                        <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <span class="mdc-notched-outline__leading"></span>
                                                        <span class="mdc-notched-outline__notch">
                                                        <label for="email" class="mdc-floating-label"
                                                               style="">Email</label>
                                                        </span>
                                                        <span class="mdc-notched-outline__trailing"></span>
                                                        </span>
                                                <input name="email" type="email" autocomplete="email"
                                                       class="mdc-text-field__input" aria-labelledby="email">
                                            </div>
                                            <div
                                                class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                                        <span class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <span class="mdc-notched-outline__leading"></span>
                                                        <span class="mdc-notched-outline__notch">
                                                        <label for="email" class="mdc-floating-label"
                                                               style="">Ghi chú</label>
                                                        </span>
                                                        <span class="mdc-notched-outline__trailing"></span>
                                                        </span>
                                                <input name="note" type="text"
                                                       class="mdc-text-field__input">
                                            </div>
                                            @if( session()->get('success'))
                                                <div
                                                    class="toast text-blue">{{ session()->get('success') }}</div>
                                            @endif
                                            <div>
                                                <button
                                                    class="submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded"
                                                    type="submit">
                                                    <span class="mdc-button__ripple"></span>
                                                    <span class="mdc-button__label">Nhận tư vấn</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endforeach
    </main>
@stop

