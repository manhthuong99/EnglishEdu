@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
@stop
@section('main')
    <main id="e2r-page" style="padding-top: 3.4rem;">
        <div class="mdc-layout-grid content-block layout-shim">
            <div class="mdc-layout-grid__inner">
                <section class="mdc-layout-grid__cell--span-12">
                    <article class="content-body__article">
                        <h1 class="content-header__title">Oops 404, không tìm thấy trang...</h1>
                    </article>
                </section>
            </div>
        </div>
    </main>
@stop
@section('footer')
    <script src="{{ asset('frontend/js/users.js') }}"></script>
@stop

