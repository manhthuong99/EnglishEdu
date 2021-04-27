@extends('frontend.master')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/center_view.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    @if(session()->get('failed'))
        <script>alert('{{ session()->get('failed') }}')</script>
    @endif
@stop
@section('main')
    @foreach( $centers as $center )
        <main id="e2r-page" style="padding-top: 3.4rem;">
            <div class="mdc-layout-grid content-block layout-shim">
                <div class="mdc-layout-grid__inner">
                    <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                        <header class="content-header">
                            <h1 class="content-header__title">{{ $center['name'] }}</h1>
                        </header>
                    </section>
                </div>
            </div>
            <section class="flexbox" id="media-section">
                <div class="flexbox__columns hide-tablet-less" id="cover">
                    <div class="flexbox__column flexbox__column--8 flexbox__column--md-12 banners-center">
                        <div class="img-16-9-wrap cover-img">
                            <picture>
                                <img class="img-fluid initial"
                                     src="{{ asset('storage/avatars/'.$center['avatar']) }}"
                                     alt="">
                            </picture>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mdc-layout-grid content-block content-block__main-content">
                <div class="mdc-layout-grid__inner">
                    <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 content-block-cell">
                        <main class="mdc-layout-grid__inner content-body">
                            <article class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8">
                                <div class="content-body__article">
                                    <h2> Đánh giá</h2>
                                    <div class="rating-score rating-score--large">
                                        <div class="flex">
                                            @for($i = 0; $i < $center['ave_star']; $i ++)
                                                <i class="fas fa-star text-yellow text-xl"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <section class="content-body__article--review-block" id="courses">
                                    <div class="content-block-title">
                                        <h3>Khóa học</h3>
                                        <p><small><b>{{ $total }} khóa học</b></small></p>
                                    </div>
                                    <div id="courses-8" class="mdc-card border-b10 school-page-course-card fluid"
                                         style="display: block;">
                                    </div>
                                    @foreach( $courses as $course)
                                        <div id="courses-9" class="mdc-card border-b10 school-page-course-card fluid"
                                             style="display: block;">
                                            <div class="mdc-card__actions">
                                                <div class="course-block course-block__no-image fluid">
                                                    <div class="course-block__info short-description">
                                                        <div class="course-block__info-main">
                                                            <div class="flex">
                                                                <div>
                                                                    <div class="chip n70">
                                                                        <span
                                                                            class="icon icon-sm i-graduation-cap"></span>
                                                                        <small>{{ $course['type'] }}</small>
                                                                    </div>
                                                                    <div class="chip n70">
                                                                        <span class="icon icon-sm i-clock"></span>
                                                                        <small>{{ $course['number_of_session'] }}
                                                                            buổi</small>
                                                                    </div>
                                                                    <div class="chip n70">
                                                                    <span
                                                                        class="icon icon-sm i-giao-vien-ban-xu"></span>
                                                                        <small>{{ $course['type_customer'] }}</small>
                                                                    </div>
                                                                    @if( $course['try_study'])
                                                                        <div class="chip n70">
                                                                            <span
                                                                                class="icon icon-sm i-co-hoc-thu"></span>
                                                                            <small>Có học thử</small>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="divider-vertical"></div>
                                                                @if( $course['discount'])
                                                                    <div style="padding-left: 0.2rem;">
                                                                        <div class="n70">
                                                                            <small>Học phí
                                                                                <del
                                                                                    class="b70"> {{ number_format($course['price']) }}
                                                                                    ₫
                                                                                </del>
                                                                            </small></div>
                                                                        <div><b class="b70">Giá chỉ còn <span
                                                                                    class="r30"> {{ number_format((int)$course['price'] - (int)$course['discount']) }} ₫</span></b>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div style="padding-left: 0.2rem;">
                                                                        <div>
                                                                            <b class="b70">Học phí
                                                                                <span class="r30"> {{ number_format($course['price']) }} ₫</span>
                                                                            </b>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex" style="margin-top: 0.8rem;align-items: center;">
                                                        <a style="margin-left: auto"
                                                           href="{{ route('course.detail',$course['course_id']) }}"
                                                           class="attention_btn attention_btn__o30 attention_btn__medium mdc-button mdc-button--unelevated mdc-ripple-upgraded">
                                                            <span class="mdc-button__ripple"></span>
                                                            <span class="mdc-button__label">Xem chi tiết</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="flex hide-tablet-less">
                                        <button style="margin-top: 20px; margin-bottom: 20px; display: none;"
                                                class="more_btn more_btn__white more_btn__medium mdc-button mdc-button--outlined view-more-d mdc-ripple-upgraded">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Xem thêm</span>
                                        </button>
                                    </div>
                                    <div class="hide-tablet-more">
                                        <button style="margin-top: 20px; margin-bottom: 20px; display: none;"
                                                class="more_btn more_btn__white more_btn__medium mdc-button mdc-button--outlined view-more-m fluid mdc-ripple-upgraded">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Xem thêm</span>
                                        </button>
                                    </div>
                                </section>
                                <div class="toast b0 text-center"
                                     style="width: fit-content; margin: 2rem auto;max-width: 100%;">
                                    <div class="b70">
                                        <p>Phát hiện lừa đảo?</p>
                                        <h3 class="r30">Gọi Hotline <a href="tel:0853897558"><strong>(+84) 853 897
                                                    558</strong></a></h3>
                                        <p>Hoặc báo <a class="text-primary" id="report">tại đây</a>.
                                            EnglishReview xin cảm ơn!
                                        </p>
                                    </div>
                                </div>
                                <section class="content-body__article--review-block" id="school-intro">
                                    <div class="content-block-title">
                                        <h3>Giới thiệu</h3>
                                    </div>
                                    <div id="about-school">
                                        <div style="max-height: 400px; overflow: hidden; will-change: max-height;">
                                            <p>
                                                {{ $center['description'] }}
                                            </p>
                                        </div>
                                    </div>
                                </section>
                                <section class="content-body__article--review-block" id="general-review">
                                    <div class="content-block-title">
                                        <h3>Đánh giá</h3>
                                        <p><small><b>{{ $reviews['totalReview'] }} đánh giá</b></small></p>
                                    </div>
                                    <section class="content-body__article--review-block">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <input type="hidden" name="center_id" id="center_id"
                                                   value="{{ $center['center_id'] }}">
                                            <input type="hidden" name="user_id" id="user_id"
                                                   value="{{ \Illuminate\Support\Facades\Auth::user()->user_id }}">
                                        @endif
                                        <div class="content-block-title flex" style="display: flex">
                                            <h3>Nhận xét</h3>
                                        </div>
                                        <div class="form-group">
                                            <div class="stars-input" id="map_ratings[6]">
                                                <fieldset>
                                                    <input id="stars-input-6-5" type="radio" name="rate" value="5">
                                                    <label for="stars-input-6-5" title="Rất hài lòng"></label>
                                                    <input id="stars-input-6-4" type="radio" name="rate" value="4">
                                                    <label for="stars-input-6-4" title="Hài lòng "></label>
                                                    <input id="stars-input-6-3" type="radio" name="rate" value="3">
                                                    <label for="stars-input-6-3" title="Bình thường"></label>
                                                    <input id="stars-input-6-2" type="radio" name="rate" value="2">
                                                    <label for="stars-input-6-2" title="Chưa hài lòng lắm"></label>
                                                    <input id="stars-input-6-1" type="radio" name="rate" value="1">
                                                    <label for="stars-input-6-1" title="Không hài lòng "></label>
                                                </fieldset>
                                            </div>
                                            <div class="error-message"></div>
                                        </div>
                                        <div class="form-group">
                                                <textarea id="comment-box" name="comment" class="form-input"
                                                          placeholder="Hãy viết gì đó..." rows="3"></textarea>
                                        </div>
                                        <button id="button-submit" type="submit" class="btn btn-sm btn-danger">
                                            Gửi dánh giá
                                        </button>
                                    </section>
                                    <hr>
                                    <div class="rating-group__grouping-block">
                                        <h4>Đánh giá từ học viên</h4>
                                        <div class="comment-group" id="comment-group">
                                            @foreach( $reviews['review'] as $review)
                                                <div class="comment-block" id="user-review-47130">
                                                    <div class="comment-block__header">
                                                        <div class="avatar-group">
                                                            <figure class="avatar">
                                                                <img
                                                                    src="{{ asset('storage/avatars/'.$review['user']['avatar']) }}"
                                                                    alt="Mat Duong" data-ll-status="loaded"
                                                                    class="loaded">
                                                            </figure>
                                                            <div class="avatar-group__info">
                                                                <div
                                                                    class="user-name">{{ $review['user']['full_name'] }}</div>
                                                                <div class="user-rate-info">
                                                                    <div class="rating-group">
                                                                        <div class="rating-stars rating-stars">
                                                                            @for( $i = 0; $i < $review['rate']; $i++)
                                                                                <span
                                                                                    class="icon icon-sm i-star "></span>
                                                                            @endfor
                                                                        </div>&nbsp;
                                                                        <time> {{ date("d/m/Y H:m:s", strtotime($review['created_at'])) }}</time>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-block__content">
                                                        <p>
                                                            {{ $review['comment'] }}
                                                        </p>
                                                    </div>
                                                    <label for="review-main-47130" class="readmore-trigger"></label>
                                                    <div class="divider"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button id="showMore"
                                                class="subtle-btn subtle-btn__outlined view-more">
                                            Xem thêm đánh giá
                                        </button>
                                    </div>
                                </section>
                            </article>
                            <aside class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 hide-tablet-less">
                                <div class="form__sticky-side">
                                    <div class="mdc-card">
                                        <div class="mdc-card__actions">
                                            <div class="form-block fluid">
                                                <form class="form submit-form" action="{{ route('consulting.create') }}"
                                                      method="POST">
                                                    <div class="content-block-title">
                                                        <h3>Bạn cần tư vấn? <br> Hãy liện hệ với {{ $center['name'] }}
                                                        </h3>
                                                    </div>
                                                    @csrf
                                                    @if( \Illuminate\Support\Facades\Auth::check())
                                                        <input type="hidden" name="user_id"
                                                               value="{{ \Illuminate\Support\Facades\Auth::user()->user_id }}">
                                                    @endif
                                                    <input type="hidden" name="center_id"
                                                           value="{{ $center['center_id'] }}">
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
                            </aside>
                        </main>
                    </section>
                </div>
            </div>
            {{--Modal Login--}}
            <aside class="modal internal-modal modal--small modal__mobile-full modal--brand__vus"
                   id="modal_login" data-time="20000">
                <div class="modal__content">
                    <section class="modal__body">
                        <button class="subtle-btn close-modal-btn" id="close_modal_login">
                            <span class="icon icon-sm i-times"></span>
                        </button>
                        <div class="content-block-title">
                            <h2>Bạn cần đăng nhập để đánh giá!</h2>
                        </div>
                        <div>
                            <br>
                            <br>
                            <a href="{{ route('user.login') }}">
                                <button
                                    class="submit_btn submit_btn__r30 mdc-button mdc-button--unelevated fluid submit-btn button-attention mdc-ripple-upgraded"
                                    type="button">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Đến trang đăng nhập</span>
                                </button>
                            </a>
                        </div>
                    </section>
                </div>
                <div class="modal__backdrop"></div>
            </aside>
            {{-- Modal Report--}}
            <aside class="modal internal-modal modal--small modal__mobile-full modal--brand__vus"
                   id="modal_report" data-time="20000">
                <div class="modal__content">
                    <section class="modal__body">
                        <button class="subtle-btn close-modal-btn" id="close_modal_report">
                            <span class="icon icon-sm i-times"></span>
                        </button>
                        <div class="content-block-title">
                            <h2>Phiếu báo cáo</h2>

                        </div>
                        <div>
                            <br>
                            <div class="content-block-title">
                                <h2>{{ $center['name'] }}</h2>
                            </div>
                            <br>
                            <div class="mdc-card__actions">
                                <div class="form-block fluid">
                                    <form class="form submit-form" action="{{ route('report.create') }}"
                                          method="POST">
                                        @csrf
                                        @if( \Illuminate\Support\Facades\Auth::check())
                                            <input type="hidden" name="user_id"
                                                   value="{{ \Illuminate\Support\Facades\Auth::user()->user_id }}">
                                        @endif

                                        <input type="hidden" name="center_id"
                                               value="{{ $center['center_id'] }}">
                                        <div class="form-group">
                                            <input class="form-input" type="text" name="title" placeholder="Chủ đề">
                                        </div>
                                        <div class="form-group">
                                                <textarea name="contents" class="form-input"
                                                          placeholder="Nội dung" rows="4"></textarea>
                                        </div>
                                        <div>
                                            <button
                                                class="submit_btn submit_btn__primary mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded"
                                                type="submit">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">Gửi báo cáo</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal__backdrop"></div>
            </aside>
        </main>
    @endforeach
@stop
@section('footer')
    <script>
        $(document).ready(function () {

            let modalLogin = document.getElementById('modal_login');
            let modalReport = document.getElementById('modal_report');
            let limit = 2;

            $('#button-submit').on('click', function (event) {
                let user_id = $('#user_id').val();
                if (user_id) {
                    let data = {
                        center_id: $('#center_id').val(),
                        user_id: user_id,
                        rate: $('input[name=rate]:checked').val(),
                        comment: $('#comment-box').val()
                    }
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('center.review') }}',
                        data: data,
                        success: function (response) {
                            $('#comment-box').val('')
                            $('#comment-group').html(response);
                        },
                        error: function (xhr, status, error) {
                            console.log(error);
                        }
                    });
                } else {
                    setTimeout(function () {
                        modalLogin.classList.add('active');
                    }, 500);
                }
            });
            $('#report').on('click', function (event) {
                setTimeout(function () {
                    modalReport.classList.add('active');
                }, 500);
            });

            $('#close_modal_login').on('click', function () {
                modalLogin.classList.remove('active')
            })
            $('#close_modal_report').on('click', function () {
                modalReport.classList.remove('active')
            })

            $('#showMore').on('click', function () {
                limit = limit + 2
                let data = {
                    center_id: '{{ $centers[0]['center_id'] }}',
                    limit: limit
                }
                $.ajax({
                    type: 'POST',
                    url: '{{ route('center.showMore') }}',
                    data: data,
                    success: function (response) {
                        $('#comment-group').html(response)
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            })
        });
    </script>
    @if( session()->get('report_success'))
        <script> alert('{{ session()->get('report_success') }}')</script>
    @endif
@stop

