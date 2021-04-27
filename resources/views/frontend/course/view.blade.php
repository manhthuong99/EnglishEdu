@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
@stop
@section('main')
    <main id="e2r-page" style="padding-top: 3.4rem;">
        <div class="mdc-layout-grid content-block layout-shim">
            <div class="mdc-layout-grid__inner content-body">
                <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                    <div class="content-body__article">
                        <div><span id="resultNum" class="text-prim bold">{{ $total }}</span> Kết quả.
                        </div>
                    </div>
                    <div id="result-container" class="content-body__article">
                        @foreach( $courses as $course)
                            <a href="{{ route('course.detail',$course['course_id']) }}" target="_blank"
                               class="mdc-card border-b10 card-list-item fluid">
                                <div class="mdc-card__actions">
                                    <div class="course-block">
                                        <div class="course-block__info">
                                            <div class="course-block__info-img">
                                                <div class="img-square-wrap">
                                                    <div class="chip-tag chip-tag__r30">
                                                        -{{ number_format($course['discount']) }}</div>
                                                    <picture>
                                                        <img class="initial img-fluid lazy loaded"
                                                             src="{{ asset('storage/avatars/'.$course['center']['avatar']) }}"
                                                             alt="Giao tiếp 4 kỹ năng - Starter (Pre-CE)"
                                                             data-ll-status="loaded">
                                                    </picture>
                                                </div>
                                            </div>
                                            <div class="course-block__info-main short-description">
                                                <div class="flex">
                                                    <div>
                                                        <p class="text-thin">
                                                            <b><small
                                                                    class="n70">{{ $course['center']['name'] }}</small></b>
                                                        </p>
                                                        <div class="rating-group">
                                                            <div class="rating-group">
                                                                <div
                                                                    style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                                    <img class="initial fluid loading"
                                                                         alt="Verified by Edu2Review"
                                                                         src="{{ asset('frontend/img/icons/verify.svg') }}"
                                                                         data-ll-status="loading">
                                                                </div>
                                                                @for($i = 0; $i < $course['center']['ave_star']; $i ++)
                                                                    <i class="fas fa-star text-yellow text-b"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hide-sm-less">
                                                    <h3 class="title">{{ $course['name'] }}</h3>
                                                    <div class="flex">
                                                        <div>
                                                            <div class="chip n70">
                                                                <span class="icon icon-sm i-graduation-cap"></span>
                                                                <small>{{ $course['type'] }}</small>
                                                            </div>
                                                            <div class="chip n70">
                                                                <span class="icon icon-sm i-clock"></span>
                                                                <small>{{ $course['number_of_session'] }} buổi</small>
                                                            </div>
                                                            <div class="chip n70">
                                                                <span class="icon icon-sm i-kiem-tra-dau-vao"></span>
                                                                <small>Dành cho {{ $course['type_customer'] }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="divider-vertical"></div>
                                                        <div style="padding-left: 0.2rem;">
                                                            <div class="n70"><small>Học phí
                                                                    <del
                                                                        class="b70"> {{ number_format($course['price']) }}
                                                                        ₫
                                                                    </del>
                                                                </small></div>
                                                            <div><b class="b70">Giá chỉ còn <span class="r30"> {{ number_format((int)$course['price'] - (int)$course['discount']) }} ₫</span></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="datatable-basic_previous"><a
                                    href="#" aria-controls="datatable-basic" data-dt-idx="0" tabindex="0"
                                    class="page-link"><i class="fas fa-angle-left"></i>
                                </a>
                            </li>
                            @for( $i = 1; $i < 5; $i++)
                                <li class="paginate_button page-item">
                                    <a href="{{ route('course.filter',[$type,$i]) }}" class="page-link">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="paginate_button page-item">
                                <a href="#" class="page-link">...</a>
                            </li>
                            @for( $i = round($total/10)-2; $i < $total/10; $i++)
                                <li class="paginate_button page-item">
                                    <a href="#" class="page-link">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="paginate_button page-item next" id="datatable-basic_next">
                                <a href="#" class="page-link">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </main>
@stop

