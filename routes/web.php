<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','Home@index');

Route::get('/admin/dang-nhap', function () {
    return view('admin.user.login');
})->name('admin.login');

Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('redirect.login');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::post('/admin/center/district', 'Admin\Center@getDistricts')->name('admin.district');
Route::post('/admin/home', 'Admin\User@checkLogin')->name('admin.user.checkLogin');
Route::get('/admin/home', 'Admin\User@logout')->name('admin.user.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin.checkLogin']], function () {
    Route::get('/trang-chu', 'Admin\Dashboard@index')->name('admin.dashboards.index');
    Route::get('/dashboards/data', 'Admin\Dashboard@getNumberCustomerData')->name('admin.dashboards.data');

    Route::get('/danh-sach-nguoi-dung', 'Admin\User@index')->name('admin.user.index');
    Route::get('/thong-tin-nguoi-dung/{userId}', 'Admin\User@edit')->name('admin.user.edit');
    Route::get('/xoa-nguoi-dung/{userId}', 'Admin\User@delete')->name('admin.user.delete');
    Route::get('/tao-moi-nguoi-dung', 'Admin\User@create')->name('admin.user.create');
    Route::post('/luu', 'Admin\User@save')->name('admin.user.save');

    Route::get('/tao-moi-trung-tam', 'Admin\Center@create')->name('admin.center.create');
    Route::get('/danh-sach-trung-tap', 'Admin\Center@index')->name('admin.center.index');
    Route::get('/thong-tin-trung-tam/{centerId}', 'Admin\Center@edit')->name('admin.center.edit');
    Route::get('/xoa-trung-tam/{centerId}', 'Admin\Center@delete')->name('admin.center.delete');
    Route::post('/center/save', 'Admin\Center@save')->name('admin.center.save');
    Route::get('/danh-sach-khoa-hoc-cua-trung-tam/{centerId}', 'Admin\Course@index')->name('admin.center.course');
    Route::get('/yeu-cau-mo-trung-tam', 'Admin\Center@registerCenter')->name('admin.center.registerCenter');
    Route::get('/xóa-yeu-cau/{requestId}', 'Admin\Center@requestDelete')->name('admin.center.request_delete');
    Route::get('/xac-nhan/{requestId}', 'Admin\Center@approve')->name('admin.center.approve');

    Route::get('/danh-sach-khoa-hoc', 'Admin\Course@index')->name('admin.course.index');
    Route::get('/tao-moi-khoa-hoc', 'Admin\Course@create')->name('admin.course.create');
    Route::post('/course/save', 'Admin\Course@save')->name('admin.course.save');
    Route::get('/thong-tin-khoa-hoc/{courseId}', 'Admin\Course@edit')->name('admin.course.edit');
    Route::get('/xoa-khoa-hoc/{courseId}', 'Admin\Course@delete')->name('admin.course.delete');

    Route::get('/danh-gia', 'Admin\Review@index')->name('admin.review.index');
    Route::get('/review/delete/{reviewId}', 'Admin\Review@delete')->name('admin.review.delete');

    Route::get('/bao-cao', 'Admin\Report@index')->name('admin.report.index');
    Route::get('/report/delete/{reportId}', 'Admin\Report@delete')->name('admin.report.delete');

    Route::get('/', function () {
        return view('admin.dashboards.dashboard');
    });
});

Route::group(['prefix' => '/'],function () {
    Route::get('trang-chu','Home@index')->name('home.index');
    Route::get('trung-tam/{centerId}','Center@index')->name('center.index');

    Route::get('dang-nhap','User@login')->name('user.login');
    Route::post('kiem-tra-dang-nhap','User@checkLogin')->name('user.check.login');
    Route::get('dang-xuat','User@logout')->name('user.logout');
    Route::get('dang-ky','User@register')->name('user.register');
    Route::post('xac-nhan-dang-ky','User@save')->name('user.save');
    Route::post('doi-mat-khau','User@changePassword')->name('user.changePassword');
    Route::get('thay-doi-mat-khau',function (){
        if (!Auth::check()){
            return redirect('/');
        }
        return view('frontend.user.change_password');
    })->name('user.change_password');
    Route::get('quen-mat-khau',function (){
        if (Auth::check()){
            return redirect(route('home.index'));
        }
        return view('frontend.user.forgot_password');
    })->name('user.forgot_password');
    Route::post('gui-email', 'User@sendMail')->middleware('guest')->name('user.sendmail');
    Route::get('dat-lai-mat-khau/{token}', function ($token){
        $data['token'] = $token;
        return view('frontend.user.reset_password',$data);
    })->name('password.reset');
    Route::post('xac-nhan-mat-khau','User@resetPassword')->name('user.resetPassword');
    Route::get('thong-tin-tai-khoan/{userId}','User@index')->name('user.myAccount');
    Route::get('dang-ki-trung-tam/{userId}','User@registerCenter')->name('user.registerCenter');
    Route::post('cap-nhat-thong-tin}','User@update')->name('user.update');


    Route::get('center/view/{centerId}','Center@index')->name('center.index');
    Route::get('top-trung-tam/{page?}','Center@topCenter')->name('center.top');
    Route::get('trung-tam/{centerId}','Center@topCenter')->name('center.top');
    Route::get('trung-tam/{centerId}','Center@show')->name('center.detail');
    Route::post('danh-gia','Center@review')->name('center.review');
    Route::post('xem-them','Center@showMore')->name('center.showMore');
    Route::post('cac-trung-tam-phu-hop','Center@filter')->name('center.filter');


    Route::get('{type}/page/{page}','Course@filter')->name('course.filter');
    Route::get('chi-tiet-khoa-hoc/{courseId}','Course@detailCourse')->name('course.detail');

    Route::post('nhan-tu-van','Consulting@create')->name('consulting.create');

    Route::post('Báo cáo','Report@create')->name('report.create');
});
