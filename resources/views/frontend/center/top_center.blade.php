@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
@stop
@section('main')
    @if($total > 0)
        <main id="e2r-page" style="padding-top: 3.4rem;">
            <div class="mdc-layout-grid content-block layout-shim">
                <div class="mdc-layout-grid__inner content-body">

                    <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
{{--                        <div class="content-body__article">--}}
{{--                            <div><span id="resultNum" class="text-prim bold">{{ $total }}</span> Kết quả.--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div id="result-container" class="content-body__article">
                            @foreach( $centers as $center)
                                <a href="{{ route('center.detail',$center['center_id']) }}"
                                   class="mdc-card border-b10 card-list-item fluid">
                                    <div class="mdc-card__actions">
                                        <div class="course-block">
                                            <div class="course-block__info">
                                                <div class="course-block__info-img">
                                                    <div class="img-square-wrap">
                                                        <picture>
                                                            <img class="initial img-fluid lazy loaded"
                                                                 src="{{ asset('storage/avatars/'.$center['avatar']) }}"
                                                                 alt="Giao tiếp 4 kỹ năng - Starter (Pre-CE)"
                                                                 data-ll-status="loaded">
                                                        </picture>
                                                    </div>
                                                </div>
                                                <div class="course-block__info-main short-description">
                                                    <div class="flex">
                                                        <div>
                                                            <h3 class="title">{{ $center['name'] }}</h3>
                                                            <div class="rating-group">
                                                                <div class="rating-group">
                                                                    <div
                                                                        style="margin: 0.4rem 0.4rem 0.4rem 0; max-width: 30px">
                                                                        <img class="initial fluid loading"
                                                                             alt="Verified by Edu2Review"
                                                                             src="{{ asset('frontend/img/icons/verify.svg') }}"
                                                                             data-ll-status="loading">
                                                                    </div>
                                                                    @for($i = 0; $i < $center['ave_star']; $i ++)
                                                                        <i class="fas fa-star text-yellow text-b"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hide-sm-less">
                                                        <div class="flex">
                                                            <div>
                                                                <div class="chip n70">
                                                                    <span class="ni ni-square-pin"> </span>
                                                                    <small> {{ $center['address'] }}</small>
                                                                </div>
                                                                <div class="chip n70">
                                                                    <span class="ni ni-mobile-button"> </span>
                                                                    <small> {{ $center['phone_number'] }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="divider-vertical"></div>
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
                                @for( $i = 1; $i < 2; $i++)
                                    <li class="paginate_button page-item">
                                        <a href="{{ route('center.top',$i) }}" class="page-link">{{ $i }}</a>
                                    </li>
                                @endfor
{{--                                @if( $total > 3)--}}
{{--                                    <li class="paginate_button page-item">--}}
{{--                                        <a href="#" class="page-link">...</a>--}}
{{--                                    </li>--}}
{{--                                    @for( $i = round($total/10)-2; $i < $total/10; $i++)--}}
{{--                                        <li class="paginate_button page-item">--}}
{{--                                            <a href="{{ route('center.top',$i) }}" class="page-link">{{ $i }}</a>--}}
{{--                                        </li>--}}
{{--                                    @endfor--}}
{{--                                    <li class="paginate_button page-item next" id="datatable-basic_next">--}}
{{--                                        <a href="#" class="page-link">--}}
{{--                                            <i class="fas fa-angle-right"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    @else
        <main id="e2r-page" style="padding-top: 3.4rem;">
            <div class="mdc-layout-grid content-block layout-shim">
                <div class="mdc-layout-grid__inner">
                    <section class="mdc-layout-grid__cell--span-12">
                        <article class="content-body__article">
                            <h1 class="content-header__title">Oops 404, không tìm thấy kết quả phù hợp...</h1>
                        </article>
                    </section>
                </div>
            </div>
        </main>
    @endif
@stop

