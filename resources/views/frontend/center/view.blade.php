@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/center_view.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
@stop
@section('main')
    <main id="e2r-page" style="padding-top: 3.4rem;">
        <div class="mdc-layout-grid content-block layout-shim">
            <div class="mdc-layout-grid__inner">
                <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                    <header class="content-header">
                        <h1 class="content-header__title">Trung tâm Anh ngữ Aten</h1>
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
                                 src="{{ asset('frontend/img/center.jpg') }}"
                                 alt="Trung tâm Anh ngữ Aten" style="opacity: 0.7;">
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
                            <nav class="sticky-nav">
                                <div class="navbar__back" id="back-nav"><span
                                        class="icon i-chevron-left icon-sm"></span></div>
                                <ul class="navbar">
                                    <li class="navbar__item">
                                        <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#courses"
                                           class="">Khóa học</a>
                                    </li>
                                    <li class="navbar__item">
                                        <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#general-review"
                                           class="">Đánh giá</a>
                                    </li>
                                    <li class="navbar__item">
                                        <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#school-intro"
                                           class="">Giới thiệu</a>
                                    </li>
                                    <li class="navbar__item">
                                        <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#locations">Địa
                                            điểm</a>
                                    </li>
                                </ul>
                                <div class="navbar__next" id="next-nav"><span
                                        class="icon i-chevron-right icon-sm"></span></div>
                            </nav>
                            <div class="content-body__article">
                                <div class="rating-score rating-score--large">
                                    <div class="rating-score__number">8.3</div>
                                    <div class="rating-score__text">
                                        <strong>
                                            Tốt
                                        </strong>
                                        <div class="flex">
                                            <div class="rating-stars "><span class="icon icon-sm i-star icon-sm"></span><span
                                                    class="icon icon-sm i-star icon-sm"></span><span
                                                    class="icon icon-sm i-star icon-sm"></span><span
                                                    class="icon icon-sm i-star icon-sm"></span><span
                                                    class="icon icon-sm i-starline icon-sm"></span></div>
                                            <div class="rating-group__count">109 đánh giá</div>
                                        </div>
                                    </div>
                                </div>
                                <section class="content-body__article--review-block" id="courses">
                                    <div class="content-block-title">
                                        <h3>Khóa học</h3>
                                        <p><small><b>2 khóa học</b></small></p>
                                    </div>
                                    <div id="courses-8" class="mdc-card border-b10 school-page-course-card fluid"
                                         style="display: block;">
                                    </div>
                                    <div id="courses-9" class="mdc-card border-b10 school-page-course-card fluid"
                                         style="display: block;">
                                        <div class="mdc-card__actions">
                                            <div class="course-block course-block__no-image fluid">
                                                <div class="course-block__info short-description">
                                                    <div class="course-block__info-main">
                                                        <a target="_blank"
                                                           href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten/khoa-hoc/khoa-vip-1-kem-1-9">
                                                            <div class="flex-start"
                                                                 style="flex-wrap: nowrap;margin: 0.4rem 0">
                                                                <h3>Khóa VIP 1 kèm 1</h3>
                                                            </div>
                                                        </a>
                                                        <div class="flex">
                                                            <div>
                                                                <div class="chip n70">
                                                                    <span class="icon icon-sm i-graduation-cap"></span>
                                                                    <small>Giao tiếp Cơ bản</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span class="icon icon-sm i-clock"></span>
                                                                    <small>40 buổi</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span
                                                                        class="icon icon-sm i-giao-vien-ban-xu"></span>
                                                                    <small>Giáo viên bản xứ</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span class="icon icon-sm i-co-hoc-thu"></span>
                                                                    <small>Có học thử</small>
                                                                </div>
                                                            </div>
                                                            <div class="divider-vertical"></div>
                                                            <div style="padding-left: 0.2rem;align-self: center;">
                                                                <div>
                                                                    <b class="b70">Giảm ngay <span
                                                                            class="r30">500.000 ₫</span>
                                                                        <br> cho EduMember</b></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex" style="margin-top: 0.8rem;align-items: center;">
                                                    <a style="margin-left: auto"
                                                        href=""
                                                       class="attention_btn attention_btn__o30 attention_btn__medium mdc-button mdc-button--unelevated mdc-ripple-upgraded">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Xem chi tiết</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="courses-9" class="mdc-card border-b10 school-page-course-card fluid"
                                         style="display: block;">
                                        <div class="mdc-card__actions">
                                            <div class="course-block course-block__no-image fluid">
                                                <div class="course-block__info short-description">
                                                    <div class="course-block__info-main">
                                                        <a target="_blank"
                                                           href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten/khoa-hoc/khoa-vip-1-kem-1-9">
                                                            <div class="flex-start"
                                                                 style="flex-wrap: nowrap;margin: 0.4rem 0">
                                                                <h3>Khóa VIP 1 kèm 1</h3>
                                                            </div>
                                                        </a>
                                                        <div class="flex">
                                                            <div>
                                                                <div class="chip n70">
                                                                    <span class="icon icon-sm i-graduation-cap"></span>
                                                                    <small>Giao tiếp Cơ bản</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span class="icon icon-sm i-clock"></span>
                                                                    <small>40 buổi</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span
                                                                        class="icon icon-sm i-giao-vien-ban-xu"></span>
                                                                    <small>Giáo viên bản xứ</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span class="icon icon-sm i-co-hoc-thu"></span>
                                                                    <small>Có học thử</small>
                                                                </div>
                                                            </div>
                                                            <div class="divider-vertical"></div>
                                                            <div style="padding-left: 0.2rem;align-self: center;">
                                                                <div>
                                                                    <b class="b70">Giảm ngay <span
                                                                            class="r30">500.000 ₫</span>
                                                                        <br> cho EduMember</b></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex" style="margin-top: 0.8rem;align-items: center;">
                                                    <a style="margin-left: auto"
                                                        href=""
                                                       class="attention_btn attention_btn__o30 attention_btn__medium mdc-button mdc-button--unelevated mdc-ripple-upgraded">
                                                        <span class="mdc-button__ripple"></span>
                                                        <span class="mdc-button__label">Xem chi tiết</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <p>Bạn cần thêm thông tin?</p>
                                        <h3 class="r30">Gọi Hotline <a href="tel:0853897558"><strong>(+84) 853 897
                                                    558</strong></a></h3>
                                        <p>EnglishReview sẽ hỗ trợ thêm cho bạn</p>
                                    </div>
                                </div>
                                <section class="content-body__article--review-block" id="school-intro">
                                    <div class="content-block-title">
                                        <h3>Giới thiệu</h3>
                                    </div>
                                    <div id="about-school">
                                        <div style="max-height: 400px; overflow: hidden; will-change: max-height;">
                                            <div><p><strong>Anh văn Hội Việt Mỹ VUS</strong> là Hệ thống Anh ngữ quy mô
                                                    lớn với các cơ sở được đầu tư chất lượng và hiện đại rộng khắp trên
                                                    cả nước. Trong hơn 20 năm hoạt động và phát triển, VUS đón nhận sự
                                                    tín nhiệm của hơn 250.000 lượt gia đình tin chọn hằng năm. Hiện nay,
                                                    VUS là hệ thống đang giữ kỷ lục Việt Nam – Hệ thống Anh ngữ có số
                                                    lượng học viên nhận Chứng chỉ Anh ngữ Quốc tế nhiều nhất với hơn
                                                    123.000 em.</p>
                                                <p>Với kinh nghiệm giảng dạy uy tín cùng phương pháp học tương tác cao,
                                                    đặc biệt ứng dụng công nghệ cao trong dạy và học, VUS là một trong
                                                    những lựa chọn hợp lý khi bạn đang băn khoăn tìm một nơi trau dồi và
                                                    phát triển trình độ Anh ngữ của mình.</p>
                                                <h3>Giới thiệu chung về Anh văn Hội Việt Mỹ VUS</h3>
                                                <p>VUS (website: vus.edu.vn) được đánh giá là một trong những đơn vị
                                                    giảng dạy Anh ngữ lớn nhất trong địa bàn thành phố HCM cũng như trên
                                                    cả nước. Hợp tác chiến lược với The City University of New York
                                                    (CUNY) – Đại học công lập lớn thứ 3 Hoa Kỳ về chất lượng đào tạo và
                                                    xây dựng chương trình học. Và hợp tác đào tạo với các đối tác giáo
                                                    dục quốc tế như Oxford University Press, British Council...</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="content-body__article--review-block" id="general-review">
                                    <div class="content-block-title">
                                        <h3>Đánh giá</h3>
                                        <p><small><b>109 đánh giá</b></small></p>
                                    </div>
                                    <a rel="nofollow"
                                       href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten/viet-danh-gia"
                                       class="attention_btn attention_btn__primary attention_btn__medium mdc-button mdc-button--unelevated float-right mdc-ripple-upgraded">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="icon icon-sm i-star on-theme-bg"></span>&nbsp;
                                        <span class="mdc-button__label">Viết đánh giá</span>
                                    </a>
                                    <hr>
                                    <div class="rating-group__grouping-block">
                                        <h4>Chi tiết từ học viên</h4>
                                        <div class="comment-group">
                                            <div class="comment-block" id="user-review-47130">
                                                <div class="comment-block__header">
                                                    <div class="avatar-group">
                                                        <figure class="avatar">
                                                            <img
                                                                src="{{ asset('frontend/img/icons/avatar.svg') }}"
                                                                alt="Mat Duong" data-ll-status="loaded" class="loaded">
                                                        </figure>
                                                        <div class="avatar-group__info">
                                                            <div class="user-name">Mat Duong</div>
                                                            <div class="user-rate-info">
                                                                <div class="rating-group">
                                                                    <div class="rating-stars rating-stars"><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star-haft-alt "></span>
                                                                    </div>&nbsp;<time>Ngày 21-12-2020</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-block__content">
                                                    <p>Lúc đầu rất ngại, sợ đóng tiền rồi học không được. Nhưng thầy
                                                        cô rất tận tình hướng dẫn, dễ thương. 1 lớp có 3 thầy cô hỗ
                                                        trợ. <br>
                                                        Các chị ở trung tâm cũng thường xuyên hỏi thăm tình hình,
                                                        vắng là gọi xếp lịch học bù ngay <br>
                                                        Rất hài lòng về chất lượng học và phục vụ</p>
                                                    <p>
                                                </div>
                                                <label for="review-main-47130" class="readmore-trigger"></label>
                                                <div class="divider"></div>
                                            </div>
                                            <div class="comment-block" id="user-review-47130">
                                                <div class="comment-block__header">
                                                    <div class="avatar-group">
                                                        <figure class="avatar">
                                                            <img
                                                                src="{{ asset('frontend/img/icons/avatar.svg') }}"
                                                                alt="Mat Duong" data-ll-status="loaded" class="loaded">
                                                        </figure>
                                                        <div class="avatar-group__info">
                                                            <div class="user-name">Mat Duong</div>
                                                            <div class="user-rate-info">
                                                                <div class="rating-group">
                                                                    <div class="rating-stars rating-stars"><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star "></span><span
                                                                            class="icon icon-sm i-star-haft-alt "></span>
                                                                    </div>&nbsp;<time>Ngày 21-12-2020</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-block__content">
                                                    <p>Lúc đầu rất ngại, sợ đóng tiền rồi học không được. Nhưng thầy
                                                        cô rất tận tình hướng dẫn, dễ thương. 1 lớp có 3 thầy cô hỗ
                                                        trợ. <br>
                                                        Các chị ở trung tâm cũng thường xuyên hỏi thăm tình hình,
                                                        vắng là gọi xếp lịch học bù ngay <br>
                                                        Rất hài lòng về chất lượng học và phục vụ</p>
                                                    <p>
                                                </div>
                                                <label for="review-main-47130" class="readmore-trigger"></label>
                                                <div class="divider"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="fid" name="_token"
                                               value="uFPNaalnXdqpY6YNITY8EqveuWJXSEdTzVuHYSGz">
                                        <input type="hidden" id="vmru" name="vmru"
                                               value="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten">
                                        <input type="hidden" id="vmp" name="vmp" value="2">
                                        <button data-schoolname="Trung tâm Anh ngữ Aten"
                                                class="subtle-btn subtle-btn__outlined view-more">
                                            Xem tiếp&nbsp;<span>105</span>&nbsp;đánh giá
                                        </button>
                                    </div>
                                </section>
                            </div>
                        </article>
                    </main>
                </section>
                <section class="content-body__article--review-block" id="locations">
                    <div class="content-block-title">
                        <h3>Địa điểm</h3>
                    </div>
                </section>
            </div>
            <div class="mdc-layout-grid__inner map-block">
                <div
                    class="map-block__general-img mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet">
                    <div id="locations-map">
                        <picture>
                            <img class="initial img-responsive loaded"
                                 src="./Trung tâm Anh ngữ Aten _ Edu2Review_files/hochiminh.jpg"
                                 alt="..." data-ll-status="loaded">
                        </picture>
                    </div>
                </div>
                <div
                    class="map-block__locations mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet">
                    <div class="location-list hide-tablet-less">
                        <ul class="mdc-list mdc-list--non-interactive">
                            <li class="mdc-list-item location-item">
                                <span class="icon icon-sm map-marker"></span>
                                <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#"
                                   data-address="41 Ngõ Láng Trung, Láng Hạ, Đống Đa, Hà Nội (đi từ Ngõ 107 Nguyễn Chí Thanh) "
                                   data-location="21.0148394,105.8050957,16">Aten - Cơ sở 1<span>41 Ngõ Láng Trung, Láng Hạ, Đống Đa, Hà Nội (đi từ Ngõ 107 Nguyễn Chí Thanh) </span></a>
                            </li>
                            <li class="mdc-list-item location-item">
                                <span class="icon icon-sm map-marker"></span>
                                <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#"
                                   data-address=" 54C Vũ Trọng Phụng, Thanh Xuân Trung, Thanh Xuân, Hà Nội"
                                   data-location="20.9990496,105.8066705,16">Aten - Cơ sở 2<span> 54C Vũ Trọng Phụng, Thanh Xuân Trung, Thanh Xuân, Hà Nội</span></a>
                            </li>
                            <li class="mdc-list-item location-item">
                                <span class="icon icon-sm map-marker"></span>
                                <a href="https://edu2review.com/danh-gia/trung-tam-anh-ngu-aten#"
                                   data-address="75 Trần Đại Nghĩa kéo dài, Hai Bà Trưng, Hà Nội (gần đường Nguyễn An Ninh) "
                                   data-location="20.9915682,105.8428241,16">Aten - Cơ sở 6<span>75 Trần Đại Nghĩa kéo dài, Hai Bà Trưng, Hà Nội (gần đường Nguyễn An Ninh) </span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

