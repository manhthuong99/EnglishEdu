@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
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
                            <form class="home-main-form" role="filter-form" novalidate="true">
                                <div class="form-group">
                                    <select class="form-select fluid" name="location" id="l-sel">
                                        <option value="029">Địa điểm bạn tìm?</option>
                                        <option value="29">Cả nước</option>
                                        <option value="30">Hồ Chí Minh</option>
                                        <option value="55">Hà Nội</option>
                                        <option value="85">Đà Nẵng</option>
                                        <option value="93">Hải Phòng</option>
                                        <option value="109">Cần Thơ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select id="t-c-sel" class="form-select fluid" name="major-cate">
                                        <option value="0">Khóa học cần tìm?</option>
                                        <option value="1">Giao tiếp</option>
                                        <option value="2">TOEIC</option>
                                        <option value="3">IELTS</option>
                                        <option value="4">Trẻ em</option>
                                        <option value="5">TOEFL</option>
                                        <option value="6">VNU-EPT</option>
                                        <option value="7">Tiếng Anh tổng quát</option>
                                        <option value="8">Các khóa học khác</option>
                                    </select>
                                </div>
                                <button style="margin-left: 0; margin-right: 0;" id="f-btn"
                                        class="attention_btn attention_btn__r30 mdc-button mdc-button--raised fluid mdc-ripple-upgraded"
                                        type="button">
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
                            <div class="fluid toast border-b10" style="margin: 0.4rem;min-width:140px">
                                <picture>
                                    <img class="initial img-fluid loaded"
                                         src="{{ asset('frontend/img/default.jpg') }}" alt="Mc IELTS"
                                         data-ll-status="loaded">
                                </picture>
                                <div class="fluid" style="margin-top: 1rem;">
                                    <b class="text-center">Mc IELTS</b>
                                    <b class="text-center">TỔNG ƯU ĐÃI</b>
                                    <h4 class="r30 text-center">6.400.000 ₫</h4>
                                </div>
                            </div>
                            <div class="fluid toast border-b10" style="margin: 0.4rem;min-width:140px">
                                <picture>
                                    <img class="initial img-fluid loaded"
                                         src="{{ asset('frontend/img/default.jpg') }}" alt="Simple English"
                                         data-ll-status="loaded">
                                </picture>
                                <div class="fluid" style="margin-top: 1rem;">
                                    <b class="text-center">Simple English</b>
                                    <b class="text-center">TỔNG ƯU ĐÃI</b>
                                    <h4 class="r30 text-center">1.100.000 ₫</h4>
                                </div>
                            </div>
                            <div class="fluid toast border-b10" style="margin: 0.4rem;min-width:140px">
                                <picture>
                                    <img class="initial img-fluid loaded"
                                         src="{{ asset('frontend/img/default.jpg') }}" alt="Liên Mỹ"
                                         data-ll-status="loaded">
                                </picture>
                                <div class="fluid" style="margin-top: 1rem;">
                                    <b class="text-center">Liên Mỹ</b>
                                    <b class="text-center">TỔNG ƯU ĐÃI</b>
                                    <h4 class="r30 text-center">2.270.000 ₫</h4>
                                </div>
                            </div>
                            <div class="fluid toast border-b10" style="margin: 0.4rem;min-width:140px">
                                <picture>
                                    <img class="initial img-fluid loaded"
                                         src="{{ asset('frontend/img/default.jpg') }}" alt="IELTS Fighter"
                                         data-ll-status="loaded">
                                </picture>
                                <div class="fluid" style="margin-top: 1rem;">
                                    <b class="text-center">IELTS Fighter</b>
                                    <b class="text-center">TỔNG ƯU ĐÃI</b>
                                    <h4 class="r30 text-center">5.400.000 ₫</h4>
                                </div>
                            </div>
                        </div>
                        <div class="fluid">
                            <small>
                                <i class="text-center fluid">(*) Ưu đãi có thể khác nhau tuỳ theo khoá học, chi
                                    nhánh.</i>
                            </small>
                        </div>
                        <a class="subtle-btn b50" style="margin: auto;" href="https://edu2review.com/edumember/uu-dai">XEM
                            THÊM TOP ƯU ĐÃI</a>
                        <br>
                    </section>
                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <h2 style="margin-bottom:0">Top khóa học Giao tiếp</h2>
                            <a style="margin:0" class="subtle-btn b50"
                               href="https://edu2review.com/khoa-hoc-tieng-anh-giao-tiep-tai-ho-chi-minh-1092">Xem toàn
                                bộ
                                511 khóa học</a>
                        </div>
                        <div class="slide-blocks">
                            <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-saigon-american#courses-9"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-200K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung Tâm Anh Ngữ Saigon American" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung Tâm Anh Ngữ Saigon American</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">8.2</div>
                                                <div class="rating-score__text">
                                                    Tốt
                                                    <small>211 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">20.800 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Beginner Single</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Giao tiếp Cơ bản</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>1 tháng</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                            <small>Câu lạc bộ tiếng Anh</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 599.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 399.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#courses-8"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-500K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung tâm Anh ngữ Aten" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung tâm Anh ngữ Aten</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">8.3</div>
                                                <div class="rating-score__text">
                                                    Tốt
                                                    <small>109 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">800 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Giao tiếp trọn đời</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Giao tiếp Cơ bản</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>40 buổi</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-co-hoc-thu"></span>
                                            <small>Có học thử</small>
                                        </div>
                                        <div><b class="b70">Ưu đãi <span class="r30">500.000 ₫</span> cho EduMember</b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-simple-english#courses-1"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-500K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung tâm Simple English" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung tâm Simple English</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">8.8</div>
                                                <div class="rating-score__text">
                                                    Rất tốt
                                                    <small>71 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">800 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Elementary</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Giao tiếp Cơ bản</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>3 tháng</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-co-hoc-thu"></span>
                                            <small>Có học thử</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                            <small>Câu lạc bộ tiếng Anh</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 6.500.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 6.000.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-i-study-english#courses-14"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-1500K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung tâm Anh ngữ I Study English (ISE)" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung tâm Anh ngữ I Study English (ISE)</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">8.5</div>
                                                <div class="rating-score__text">
                                                    Tốt
                                                    <small>67 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">300 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Giao tiếp</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Giao tiếp</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>6 tháng</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-co-hoc-thu"></span>
                                            <small>Có học thử</small>
                                        </div>
                                        <div><b class="b70">Ưu đãi <span class="r30">1.500.000 ₫</span> cho
                                                EduMember</b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </section>
                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <h2 style="margin-bottom:0">Top khóa học Trẻ Em</h2>
                            <a style="margin:0" class="subtle-btn b50"
                               href="https://edu2review.com/khoa-hoc-tieng-anh-cho-tre-em-tai-ho-chi-minh-13038">Xem
                                toàn bộ
                                458 khóa học</a>
                        </div>
                        <div class="slide-blocks">
                            <a href="https://edu2review.com/danh-gia/trung-tam-anh-van-hoi-viet-my-vus#courses-1"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-350K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung tâm tiếng Anh VUS" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung tâm tiếng Anh VUS</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">8.1</div>
                                                <div class="rating-score__text">
                                                    Tốt
                                                    <small>240 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">5.900 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Anh ngữ mẫu giáo Smartkids (Từ 4 - 6
                                                tuổi)</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Tiếng anh mẫu giáo</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>3 tháng</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b class="b70">Ưu đãi <span class="r30">350.000 ₫</span> cho EduMember</b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-ngoai-ngu-khoa-tri#courses-26"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-300K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung Tâm Ngoại Ngữ Khoa Trí" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung Tâm Ngoại Ngữ Khoa Trí</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">9.0</div>
                                                <div class="rating-score__text">
                                                    Rất tốt
                                                    <small>76 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">1.500 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Chương trình Cambridge</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Trẻ em</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>1 tháng</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                            <small>Câu lạc bộ tiếng Anh</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 1.500.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 1.200.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-gln#courses-4"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-750K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung Tâm Anh Ngữ GLN" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung Tâm Anh Ngữ GLN</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">9.1</div>
                                                <div class="rating-score__text">
                                                    Xuất sắc
                                                    <small>67 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">300 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Tiếng Anh Mẫu Giáo</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Tiếng anh mẫu giáo</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>60 giờ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                            <small>Câu lạc bộ tiếng Anh</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 14.850.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 14.100.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/anh-ngu-quoc-te-ocean-edu#courses-3"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-500K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Anh Ngữ Quốc Tế Ocean Edu" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Anh Ngữ Quốc Tế Ocean Edu</div>
                                            <div class="rating-group">
                                                <div class="rating-score__number">8.8</div>
                                                <div class="rating-score__text">
                                                    Rất tốt
                                                    <small>55 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">2.900 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Discovery English 4-6 tuổi - Các tỉnh</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>Tiếng anh mẫu giáo</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>3 tháng</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 7.767.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 7.267.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </section>
                    <section>
                        <div class="flex-start" style="margin-bottom: 1rem; align-items: center">
                            <h2 style="margin-bottom:0">Top khóa học IELTS</h2>
                            <a style="margin:0" class="subtle-btn b50"
                               href="https://edu2review.com/khoa-hoc-luyen-thi-ielts-tai-ho-chi-minh-7608">Xem toàn bộ
                                527
                                khóa học</a>
                        </div>
                        <div class="slide-blocks">
                            <a href="https://edu2review.com/danh-gia/trung-tam-tieng-anh-jolo#courses-21"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-750K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung Tâm Tiếng Anh JOLO" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung Tâm Tiếng Anh JOLO</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">9.4</div>
                                                <div class="rating-score__text">
                                                    Xuất sắc
                                                    <small>263 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">1.100 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">IELTS Introduction</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>IELTS Intermediate: 4.0 - 5.0</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>75 giờ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 13.500.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 12.750.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-mc-ielts#courses-4"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-400K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung Tâm Mc IELTS" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung Tâm Mc IELTS</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">9.1</div>
                                                <div class="rating-score__text">
                                                    Xuất sắc
                                                    <small>261 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">1.500 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Pre - IELTS</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>IELTS Pre Intermediate: 3.0 - 4.0</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>60 giờ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-giao-vien-ban-xu"></span>
                                            <small>Giáo viên bản xứ</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-cau-lac-bo-tieng-anh"></span>
                                            <small>Câu lạc bộ tiếng Anh</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 6.840.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 6.440.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-ielts-dinh-luc#courses-22"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-200K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Học Viện DOL English – IELTS Đình Lực" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Học Viện DOL English – IELTS Đình Lực</div>
                                            <div class="rating-group">
                                                <div style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                    <img class="initial fluid" alt="Verified by Edu2Review"
                                                         src="{{ asset('frontend/img/icons/verify.svg') }}">
                                                </div>
                                                <div class="rating-score__number">9.1</div>
                                                <div class="rating-score__text">
                                                    Xuất sắc
                                                    <small>136 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">200 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">Pre IELTS</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>IELTS Pre Intermediate: 3.0 - 4.0</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>8 tuần</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 8.500.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 8.300.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="https://edu2review.com/danh-gia/trung-tam-the-ielts-workshop#courses-1"
                               class="mdc-card flat-card">
                                <div class="mdc-card__media mdc-card__media--16-9 lazy" data-ll-status="entered">
                                    <div class="chip-tag chip-tag__r30">-300K</div>
                                    <div class="media-placeholder mdc-ripple-upgraded">
                                        <picture>
                                            <img class="initial img-fluid loaded"
                                                 src="{{ asset('frontend/img/default.jpg') }}"
                                                 alt="Trung tâm The IELTS Workshop" data-ll-status="loaded">
                                        </picture>
                                    </div>
                                </div>
                                <div class="mdc-card__actions">
                                    <div class="mdc-card__content">
                                        <div class="course-block__info-main-school">
                                            <div class="n70">Trung tâm The IELTS Workshop</div>
                                            <div class="rating-group">
                                                <div class="rating-score__number">9.3</div>
                                                <div class="rating-score__text">
                                                    Xuất sắc
                                                    <small>77 đánh giá</small>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="chip chip__rectangle">600 học viên đã đặt chỗ</small>
                                        <div class="mdc-card__content-title">
                                            <h3 class="card-block-title b70">IELTS Foundation (0 - 2.0)</h3>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-graduation-cap"></span>
                                            <small>IELTS Pre: 1.0 - 3.0</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-clock"></span>
                                            <small>12 buổi</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-co-hoc-thu"></span>
                                            <small>Có học thử</small>
                                        </div>
                                        <div class="chip n70">
                                            <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                            <small>Kiểm tra đầu vào</small>
                                        </div>
                                        <div><b>Học phí
                                                <del class="b70"> 3.000.000 ₫</del>
                                            </b></div>
                                        <div><b class="b70">Giá cho EduMember <span class="r30"> 2.700.000 ₫</span></b>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
                        <h3 class="b70">+14,800 thông tin khóa học</h3>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--align-bottom mdc-layout-grid__cell--span-4">
                    <div class="testimonial">
                        <img alt="Review icon" class="initial loaded" src="{{ asset('frontend/img/icons/review.svg') }}"
                             data-ll-status="loaded">
                        <h3 class="b70">+40,000 đánh giá từ học viên</h3>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--align-bottom mdc-layout-grid__cell--span-4">
                    <div class="testimonial">
                        <img alt="Connection icon" class="initial loaded"
                             src="{{ asset('frontend/img/icons/connection.svg') }}"
                             data-ll-status="loaded">
                        <h3 class="b70">+53,400 kết nối học viên</h3>
                    </div>
                </div>
            </div>
        </section>
        <div class="divider"></div>
    </main>
@stop

