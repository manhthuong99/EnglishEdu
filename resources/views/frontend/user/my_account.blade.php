@extends('frontend.master')
@section('header')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
@stop
@section('main')
    @if(\Illuminate\Support\Facades\Auth::check())
        <main id="e2r-page">
            <form id="findYourCourseLeadForm" class="form" method="POST" action="{{ route('user.update') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="mdc-layout-grid content-block layout-shim">
                    <div class="mdc-layout-grid__inner content-body" id="hide-when-show-otp">
                        <aside class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 hide-tablet-less">
                            <div class="mdc-card form__sticky-side form__sticky-side--sticky-head">
                                <div>
                                    <div class="avatar-group">
                                        <figure class="avatar avatar__xxl">
                                            @php($user = \Illuminate\Support\Facades\Auth::user())
                                            @if($user->type_login == 'facebook' || $user->type_login == 'google')
                                                <img id="avatar-header-img" src="{{ $user->avatar }}" alt=""
                                                     data-ll-status="loaded" class="loaded">
                                            @else
                                                <img id="avatar-preview"
                                                     src="{{ asset('storage/avatars/'.$user->avatar) }}" class="loaded">
                                            @endif
                                        </figure>
                                        <div class="avatar-group__info avatar-group__info--xl">
                                            <div class="user-name"><h3>{{ $user->full_name }}</h3></div>
                                            <div class="user-name">
                                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                                <input class="btn-outline-success" type="file" name="avatar" id="avatar"
                                                       hidden="">
                                                <label class="btn btn-sm btn-success mt-3" for="avatar">Thay đổi</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if($user->permission == 1)
                                    <ul class="menu-list" aria-orientation="vertical">
                                        <li class="menu-list__item">
                                            <a class="button subtle-btn"
                                               href="{{ route('user.registerCenter',$user->user_id) }}">
                                                <span class="ni ni-hat-3 text-lg"> </span>
                                                &nbsp;Đăng kí mở trung tâm
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </aside>
                        <section class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8">
                            <div class="content-body__article">
                                <div class="content-body__article">
                                    <div class="content-block-title">
                                        <h3>Thông tin cá nhân</h3>
                                    </div>
                                    <form class="form" action="{{ route('user.update') }}" style="display: block;">
                                        <div
                                            class="mdc-text-field mdc-text-field--outlined textfield-custom fluid mdc-text-field--label-floating">
                                            <input id="full_name" name="full_name" type="text"
                                                   class="mdc-text-field__input" value="{{ $user->full_name }}"
                                                   required="">
                                            <div
                                                class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="width: 90.5px;">
                                                    <label for="full_name"
                                                           class="mdc-floating-label mdc-floating-label--required mdc-floating-label--float-above"
                                                           style="">Họ và tên</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div
                                            class="mdc-text-field mdc-text-field--outlined textfield-custom fluid mdc-text-field--label-floating">
                                            <input id="phone_number" name="phone_number" type="tel"
                                                   autocomplete="tel-national" class="mdc-text-field__input"
                                                   value="{{ $user->phone_number }}" required="">
                                            <div
                                                class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="width: 115.25px;">
                                                    <label for="phone_number"
                                                           class="mdc-floating-label mdc-floating-label--required mdc-floating-label--float-above"
                                                           style="">Số điện thoại</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div
                                            class="mdc-text-field mdc-text-field--outlined textfield-custom fluid mdc-text-field--label-floating">
                                            <input value="{{ $user->email }}" id="email" name="email" type="email"
                                                   class="mdc-text-field__input" required="">
                                            <div
                                                class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="width: 58.25px;">
                                                    <label for="email"
                                                           class="mdc-floating-label mdc-floating-label--required mdc-floating-label--float-above"
                                                           style="">Email</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                            <div class="error-message"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày sinh</label>
                                            <input name="birthday" class="form-input" id="dob" type="date"
                                                   value="{{ $user->birthday }}"
                                                   pattern="\d{4}-\d{2}-\d{2}">
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn tỉnh thành</label>
                                            <select name="province_id" id="province_id" class="form-select fluid">
                                                <option disabled selected value> -- Chọn Tỉnh/TP --</option>
                                                @foreach($provinces as $province)
                                                    @if($user->province_id == $province->id)
                                                        <option value="{{ $province->id }}"
                                                                selected>{{ $province->name }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="district_id" id="district_id" class="form-select fluid">
                                                <option disabled value="" selected="selected">-- Chọn Quận/Huyện --
                                                </option>
                                                @if($user->district_id)
                                                    @foreach($districts as $district)
                                                        @if($user->district_id == $district['id'])
                                                            <option value="{{ $district['id'] }}"
                                                                    selected>{{ $district['name'] }}</option>
                                                        @else
                                                            <option
                                                                value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="error-message" id="locationError"></div>
                                        </div>
                                        <div class="mdc-text-field mdc-text-field--outlined textfield-custom fluid">
                                            <input value="{{ $user->address }}" id="address" name="address" type="text"
                                                   class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label for="address" class="mdc-floating-label" style="">Địa
                                                        chỉ</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                            <div class="error-message"></div>
                                        </div>
                                        <div style="display:none;" id="update-profile-status" class="toast"></div>
                                        <div class="button-group">
                                            <button type="submit" id="submitProfile"
                                                    class="attention_btn attention_btn__primary attention_btn__medium mdc-button mdc-button--unelevated fluid mdc-ripple-upgraded"
                                                    data-text="Cập nhật" data-updating="Đang xử lý...">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">Cập nhật</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                        </section>
                    </div>
                </div>
            </form>
        </main>
    @endif
    @if( session()->get('success'))
        <script> alert('{{ session()->get('success') }}')</script>
    @endif
@stop


