<!DOCTYPE html>
<!-- saved from url=(0023)https://edu2review.com/ -->
<html lang="vi-VN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>EnglishReview: Nền tảng đánh giá khoá học xịn nhất Việt Nam </title>
    <link rel="icon" href="{{ asset('frontend/img/icons/logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">
@yield('header')
<body class="e2r">
<header class="mdc-top-app-bar " id="app-header" style="box-shadow: none;">
    <div class="mdc-top-app-bar__row header-menu">
        <section class="mdc-top-app-bar__section">
            <a href="{{ route('home.index') }}" class="e2r-logo">
                <img class="initial loading" src="{{ asset('frontend/img/icons/logo.svg') }}" alt="Edu2Review logo">
            </a>
            <nav class="desktop-navmenu hide-xl-less">
                <ul class="desktop-navmenu__list">
                    <li class="desktop-navmenu__list-item menu-button" role="menuItem">
                        <a class="desktop-navmenu__list-item-link tracking" href="https://edu2review.com/#">
                            Ngoại Ngữ
                            <span class="icon icon-sm i-chevron-down"></span>
                        </a>
                        <div class="menu mdc-card" tabindex="-1">
                            <ul class="mdc-list" role="menu" aria-hidden="true">
                                <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                    <a class="list-item-link tracking" href="">Tiếng
                                        Anh giao tiếp</a>
                                </li>
                                <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                    <a class="list-item-link tracking" href="">Tiếng
                                        Anh Trẻ Em</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="desktop-navmenu__list-item menu-button" role="menuItem">
                        <a class="desktop-navmenu__list-item-link tracking" href="https://edu2review.com/#">
                            Kỹ Năng
                            <span class="icon icon-sm i-chevron-down"></span>
                        </a>
                        <div class="menu mdc-card" tabindex="-1">
                            <ul class="mdc-list" role="menu" aria-hidden="true">
                                <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                    <a class="list-item-link tracking" href="">Tất cả khóa
                                        kỹ năng</a>
                                </li>
                                <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                    <a class="list-item-link tracking" href="">Tất cả
                                        khóa nghiệp vụ</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="desktop-navmenu__list-item menu-button" role="menuItem">
                        <a class="desktop-navmenu__list-item-link tracking" href="https://edu2review.com/#">
                            Học Online
                            <span class="icon icon-sm i-chevron-down"></span>
                        </a>
                        <div class="menu mdc-card" tabindex="-1">
                            <ul class="mdc-list" role="menu" aria-hidden="true">
                                <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                    <a class="list-item-link tracking" href="">Học kèm tiếng Anh</a>
                                </li>
                                <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                    <a class="list-item-link tracking" href="">Học Tiếng Anh Online</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="hide-xl-less fluid header-search">
                <form id="d-search-form" class="form-group" role="search-form" method="GET" name="search" action=""
                      novalidate="true">
                    <div class="form-grouping fluid">
                        <input autocomplete="off" id="d-search-input" class="form-input txtSearchSchool" type="search"
                               name="q" placeholder="Tìm kiếm...">
                        <span class="loading" style="transform: translateX(-1rem); display: none;"></span>
                        <div style="display:none;" class="filter-school-result ac-results d-auto-suggestion">
                            <div class="menu mdc-card">
                                <div class="mdc-card__actions">
                                    <ul class="mdc-list auto-result-list" role="sub-menu"></ul>
                                </div>
                            </div>
                        </div>
                        <button id="d-search-btn" class="button" type="submit" disabled="">
                            <span class="icon i-search n30"></span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar"
                 style="max-width: 250px">
            <div class="desktop-head-group hide-xl-less">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @php($user = \Illuminate\Support\Facades\Auth::user())
                <div class="flex-start" id="avatar-menu">
                    <a href="javascript:void(0);" class="avatar-group" id="avatar_info">
                        <figure class="avatar avatar__md">
                            @if($user->type_login == 'facebook' || $user->type_login == 'google')
                                <img id="avatar-header-img" src="{{ $user->avatar }}" alt="" data-ll-status="loaded" class="loaded">
                            @else
                                <img id="avatar-header-img" src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="" data-ll-status="loaded" class="loaded">
                            @endif


                        </figure>
                        <span style="margin-left: 5px" class="text-black-50">{{ \Illuminate\Support\Facades\Auth::user()->full_name }}</span>
                    </a>
                    <div class="mt-lg-3 ml-lg-5 menu menu__right menu__avatar-menu mdc-card" tabindex="-1">
                        <div class="divider-inset"></div>
                        <ul class="mdc-list" role="menu" aria-hidden="true">
                            <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                <a class="list-item-link" href="https://edu2review.com/u/VN2108983369/cai-dat/thong-tin-tai-khoan">Thông tin tài khoản</a>
                            </li>
                            <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                <a class="list-item-link" href="{{ route('user.change_password') }}">Thay đổi mật khẩu</a>
                            </li>
                            <li class="mdc-list-item" role="subMenuItem" tabindex="0">
                                <a class="list-item-link" href="{{ route('user.logout') }}">Thoát</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                    <div class="flex-start" id="avatar-menu">
                        <a href="{{ route('user.login') }}"
                           class="attention_btn attention_btn__white attention_btn__sm mdc-button mdc-button--outlined mdc-ripple-upgraded">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Đăng nhập</span>
                        </a>
                        <a href="{{ route('user.register') }}"
                           class="attention_btn attention_btn__white attention_btn__sm mdc-button mdc-button--outlined mdc-ripple-upgraded">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Đăng ký</span>
                        </a>
                    </div>
                @endif
            </div>
            <div class="button-group hide-xl-more">
                <button class="menu-button" id="e2r-hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </button>
            </div>
        </section>
    </div>
</header>
@yield('main')
<footer class="footer hide-tablet-less">
    <div class="mdc-layout-grid">
        <div class="hide-tablet-less mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <h4 class="footer__nav-title">Giới thiệu</h4>
                <ul class="footer__nav-list">
                    <li class="footer__nav-list--item"><a href="">Về English Review</a></li>
                    <li class="footer__nav-list--item"><a href="https://edu2review.com/legal/terms">Điều khoản</a></li>
                    <li class="footer__nav-list--item"><a href="https://edu2review.com/legal/review-policy">Quy định
                            viết đánh giá</a></li>
                    <li class="footer__nav-list--item"><a href="https://edu2review.com/about/contact">Liên hệ</a></li>
                </ul>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <h4 class="footer__nav-title">Khám phá</h4>
                <ul class="footer__nav-list">
                    <li class="footer__nav-list--item"><a href="https://edu2review.com/reviews">Đánh giá</a></li>
                    <li class="footer__nav-list--item"><a href="https://edu2review.com/news">Tin tức</a></li>
                    <li class="footer__nav-list--item"><a
                            href="https://edu2review.com/reviews/tuyen-sinh-dai-hoc-cao-dang">Thông tin tuyển sinh</a>
                    </li>
                </ul>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <h4 class="footer__nav-title">Hợp tác</h4>
                <ul class="footer__nav-list">
                    <li class="footer__nav-list--item"><a href="https://camp.edu2review.com/hop-tac-cung-edu2review"
                                                          rel="noopener">Dành cho Trường/Trung Tâm</a></li>
                    <li class="footer__nav-list--item"><a
                            href="">Góp ý cho English Review</a></li>
                    <li class="footer__nav-list--item"><a href="https://edu2review.com/gioi-thieu-ban-be"
                                                          target="_blank">Giới thiệu bạn bè đăng ký</a></li>
                </ul>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <h4 class="hot-line">CSKH <a href="tel:0853897558"><strong>(+84) 853 897 558</strong></a></h4>
                <h4 class="footer__nav-title">Mạng xã hội</h4>
                <div class="flex-start" style="margin: 0.4rem; align-items:center">
                    <a href="https://www.youtube.com/channel/UCLk1a3nUpNpaFNKCHdUT70w" target="blank"
                       rel="noopener noreferrer">
                        <img alt="YoutTube" src="{{ asset('frontend/img/icons/youtube.svg') }}" style="width: 40px;height:50px"
                             class="loaded">
                    </a>
                    <a class="n70" href="https://www.facebook.com/M.Thuong.1406/" target="blank"
                       rel="noopener noreferrer">
                        <img alt="Facebook" src="{{ asset('frontend/img/icons/facebook.svg') }}" style="width: 35px;height:50px"
                             class="loaded">
                    </a>
                    <a class="n70" href="https://zalo.me/2186490024189108448" target="blank" rel="noopener noreferrer">
                        <img alt="Zalo" src="{{ asset('frontend/img/icons/zalo.svg') }}" style="width: 60px;height:50px"
                             class="loaded">
                    </a>
                </div>
                <div class="divider"></div>
            </div>
        </div>
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <div class="footer__logo">
                    <a href="https://edu2review.com/">
                        <img class="initial loaded" src="{{ asset('frontend/img/icons/logo.svg') }}"
                             alt="edu2review brand logo" width="20%"></a>
                </div>
                <div class="footer__copyright">
                    <small>© 2021, Bản quyền thuộc ThuongNM.</small>
                    <br>
                    <small>Trường đại học Công Nghệ Giao Thông Vận Tải - Số 54, Triều Khúc, Thanh Xuân, Hà Nôi.</small>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/users.js') }}"></script>
@yield('footer')
