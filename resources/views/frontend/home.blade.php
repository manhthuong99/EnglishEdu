@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
@stop
@section('main')
    <main id="e2r-page" style="padding-top: 3.4rem;">
        <div class="home-top-section">
            <div class="mdc-layout-grid content-block">
                <div class="mdc-layout-grid__inner">
                    <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-5 hide-tablet-less">
                        <div class="cover-image" style="max-width: 400px; margin-left: 100px">
                            <img class="initial img-fluid error" alt="Edu2Review art"
                                 src="{{ asset('frontend/img/smart.png') }}">
                        </div>
                    </section>
                    <section
                        class="mdc-layout-grid__cell mdc-layout-grid__cell--span-7 mdc-layout-grid__cell--span-12-tablet content-block-cell">
                        <div class="hide-tablet-less">
                            <h1 class="tag-line" style="max-width: 80%;">Tìm nơi học phù
                                hợp<br><span>Học phí tốt nhất</span></h1>
                            <form class="home-main-form" action="{{ route('center.filter') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select class="form-select fluid" name="province_id" id="l-sel">
                                        <option value="">Địa điểm bạn tìm?</option>
                                        @foreach( $provinces as $province)
                                        <option value="{{ $province['id'] }}">{{ $province['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="t-c-sel" class="form-select fluid" name="type">
                                        <option value="0">Khóa học cần tìm?</option>
                                        <option value="Giao tiếp cơ bản">Giao tiếp cơ bản</option>
                                        <option value="Giao tiếp nâng cao">Giao tiếp nâng cao</option>
                                        <option value="Giao tiếp trung cấp">Giao tiếp trung cấp</option>
                                        <option value="Giành cho trẻ em">Giành cho trẻ em</option>
                                        <option value="Business English">Business English</option>
                                    </select>
                                </div>
                                <button style="margin-left: 0; margin-right: 0;" id="f-btn"
                                        class="attention_btn attention_btn__r30 mdc-button mdc-button--raised fluid mdc-ripple-upgraded"
                                        type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="icon i-search n0"></span>&nbsp;
                                    <span class="mdc-button__label">Tra cứu thông tin</span>
                                </button>
                            </form>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        <div class="mdc-layout-grid content-block fluid">
            <main class="content-body">
                <div class="content-body__article">

                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <img style="margin-right: 0;" data-ll-status="loaded"
                                 src="{{ asset('frontend/img/icons/new.svg') }}"
                                 class="loaded">
                            <h2 style="margin:0">Top ưu đãi trong tháng</h2>
                        </div>
                        <div class="slide-blocks">
                            @foreach( $topOffer as $offer)
                            <div class="fluid toast border-b10" style="margin: 0.4rem;min-width:140px">
                                <picture>
                                    <img class="initial img-fluid loaded"
                                         src="{{ asset('storage/avatars/'.$offer['center']['avatar']) }}" alt="Mc IELTS"
                                         data-ll-status="loaded">
                                </picture>
                                <div class="fluid" style="margin-top: 1rem;">
                                    <b class="text-center">{{ $offer['center']['name'] }}</b>
                                    <p class="text-center text-sm">{{ $offer['name'] }}</p>
                                    <h4 class="text-center">Giá gốc:<del class="b70"> {{ number_format($offer['price']) }} ₫</del></h4>
                                    <h4 class="r30 text-center">Giá ưu đãi: {{ number_format((int)$offer['price'] - (int)$offer['discount']) }} ₫</h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="fluid">
                            <small>
                                <i class="text-center fluid">(*) Ưu đãi có thể khác nhau tuỳ theo khoá học, chi
                                    nhánh.</i>
                            </small>
                        </div>
                        <a class="subtle-btn b50" style="margin: auto;" href="{{ route('course.filter',['top-yeu-dai',1]) }}">XEM
                            THÊM TOP ƯU ĐÃI</a>
                        <br>
                    </section>
                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <h2 style="margin-bottom:0">Top khóa học Giao tiếp cơ bản</h2>
                            <a style="margin:0" class="subtle-btn b50"
                               href="{{ route('course.filter',['giao-tiep-co-ban',1]) }}">Xem thêm</a>
                        </div>
                        <div class="slide-blocks">
                            @foreach( $topBasic as $basic)
                            <a href="{{ route('course.detail',$basic['course_id']) }}"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-{{ number_format($basic['discount']) }} ₫</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('storage/avatars/'.$basic['center']['avatar']) }}"
                                                 alt="Trung Tâm Anh Ngữ Saigon American" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">{{ $basic['center']['name'] }}</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                @for($i = 0; $i < $basic['center']['ave_star']; $i ++)
                                                        <i class="fas fa-star text-yellow text-b"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">{{ $basic['name'] }}</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>{{ $basic['number_of_session'] }} buổi</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                            <small>Dành cho {{ $basic['type_customer'] }}</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> {{ number_format($basic['price']) }} ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giảm giá <span class="r30"> {{ number_format((int)$basic['price'] - (int)$basic['discount']) }} ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </section>
                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <h2 style="margin-bottom:0">Top khóa Giao tiếp nâng cao</h2>
                            <a style="margin:0" class="subtle-btn b50"
                               href="{{ route('course.filter',['giao-tiep-nang-cao',1]) }}">Xem thêm</a>
                        </div>
                        <div class="slide-blocks">
                            @foreach( $topAdvance as $advance)
                                <a href="{{ route('course.detail',$advance['course_id']) }}"
                                   class="mdc-card flat-card">
                                    <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                        <div class="chip-tag chip-tag__r30">-{{ number_format($advance['discount']) }} ₫</div>
                                        <div class="media-placeholder mdc-ripple-upgraded">
                                            <picture>
                                                <img class="initial img-fluid loaded"
                                                     src="{{ asset('storage/avatars/'.$advance['center']['avatar']) }}"
                                                     alt="Trung Tâm Anh Ngữ Saigon American" data-ll-status="loaded">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="mdc-card__actions">
                                        <div class="mdc-card__content">
                                            <div class="course-block__info-main-school">
                                                <div class="n70">{{ $advance['center']['name'] }}</div>
                                                <div class="rating-group">
                                                    <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                        <img class="initial fluid" alt="Verified by Edu2Review"
                                                             src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                    </div>
                                                    @for($i = 0; $i < $advance['center']['ave_star']; $i ++)
                                                        <i class="fas fa-star text-yellow text-b"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="mdc-card__content-title">
                                                <h3 class="card-block-title b70">{{ $advance['name'] }}</h3>
                                            </div>
                                            <div class="chip n70">
                                                <span class="icon icon-sm i-clock"></span>
                                                <small>{{ $advance['number_of_session'] }} buổi</small>
                                            </div>
                                            <div class="chip n70">
                                                <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                                <small>Dành cho {{ $advance['type_customer'] }}</small>
                                            </div>
                                            <div><b>Học phí
                                                    <del class="b70"> {{ number_format($advance['price']) }} ₫</del>
                                                </b></div>
                                            <div><b class="b70">Giảm giá <span class="r30"> {{ number_format((int)$advance['price'] - (int)$advance['discount']) }} ₫</span></b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>
                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <h2 style="margin-bottom:0">Top khóa học dành cho trẻ em</h2>
                            <a style="margin:0" class="subtle-btn b50"
                               href="{{ route('course.filter',['gianh-cho-tre-em',1]) }}">Xem thêm</a>
                        </div>
                        <div class="slide-blocks">
                            @foreach( $topChildren as $children)
                                <a href="{{ route('course.detail',$children['course_id']) }}"
                                   class="mdc-card flat-card">
                                    <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                        <div class="chip-tag chip-tag__r30">-{{ number_format($children['discount']) }} ₫</div>
                                        <div class="media-placeholder mdc-ripple-upgraded">
                                            <picture>
                                                <img class="initial img-fluid loaded"
                                                     src="{{ asset('storage/avatars/'.$children['center']['avatar']) }}"
                                                     alt="Trung Tâm Anh Ngữ Saigon American" data-ll-status="loaded">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="mdc-card__actions">
                                        <div class="mdc-card__content">
                                            <div class="course-block__info-main-school">
                                                <div class="n70">{{ $advance['center']['name'] }}</div>
                                                <div class="rating-group">
                                                    <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                        <img class="initial fluid" alt="Verified by Edu2Review"
                                                             src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                    </div>
                                                    @for($i = 0; $i < $advance['center']['ave_star']; $i ++)
                                                        <i class="fas fa-star text-yellow text-b"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="mdc-card__content-title">
                                                <h3 class="card-block-title b70">{{ $children['name'] }}</h3>
                                            </div>
                                            <div class="chip n70">
                                                <span class="icon icon-sm i-clock"></span>
                                                <small>{{ $advance['number_of_session'] }} buổi</small>
                                            </div>
                                            <div class="chip n70">
                                                <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                                <small>Dành cho {{ $advance['type_customer'] }}</small>
                                            </div>
                                            <div><b>Học phí
                                                    <del class="b70"> {{ number_format($children['price']) }} ₫</del>
                                                </b></div>
                                            <div><b class="b70">Giảm giá <span class="r30"> {{ number_format((int)$children['price'] - (int)$children['discount']) }} ₫</span></b>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>

                </div>
            </main>
        </div>
        <div class="divider"></div>
        <section class="mdc-layout-grid content-block fluid">
            <div class="mdc-layout-grid__inner content-body">
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--align-bottom mdc-layout-grid__cell--span-4">
                    <div class="testimonial">
                        <img alt="Book icon" class="initial loaded" src="{{ asset('frontend/img/icons/book.svg') }}"
                             data-ll-status="loaded">
                        <h3 class="b70">+{{ $countCourse }} thông tin khóa học</h3>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--align-bottom mdc-layout-grid__cell--span-4">
                    <div class="testimonial">
                        <img alt="Review icon" class="initial loaded" src="{{ asset('frontend/img/icons/review.svg') }}"
                             data-ll-status="loaded">
                        <h3 class="b70">+{{ $countReview }} đánh giá từ học viên</h3>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--align-bottom mdc-layout-grid__cell--span-4">
                    <div class="testimonial">
                        <img alt="Connection icon" class="initial loaded"
                             src="{{ asset('frontend/img/icons/connection.svg') }}"
                             data-ll-status="loaded">
                        <h3 class="b70">+{{ $countUser }} học viên tham gia</h3>
                    </div>
                </div>
            </div>
        </section>
        <div class="divider"></div>
    </main>
@stop

