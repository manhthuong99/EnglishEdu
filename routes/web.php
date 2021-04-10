<?php

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
Route::get('/admin/login', function () {
    return view('admin.user.login');
});
Route::post('/admin/center/district', 'Admin\Center@getDistricts')->name('admin.district');
Route::post('/admin/home', 'Admin\User@checkLogin')->name('admin.user.checkLogin');
Route::get('/admin/home', 'Admin\User@logout')->name('admin.user.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin.checkLogin']], function () {
    Route::get('/dashboard', 'Admin\Dashboard@index')->name('admin.dashboards.index');
    Route::get('/dashboard/data', 'Admin\Dashboard@getNumberCustomerData')->name('admin.dashboards.data');

    Route::get('/user', 'Admin\User@index')->name('admin.user.index');
    Route::get('/user/edit/{userId}', 'Admin\User@edit')->name('admin.user.edit');
    Route::get('/user/new', 'Admin\User@create')->name('admin.user.create');
    Route::post('/user/save', 'Admin\User@save')->name('admin.user.save');

    Route::get('/center/new', 'Admin\Center@create')->name('admin.center.create');
    Route::get('/center', 'Admin\Center@index')->name('admin.center.index');
    Route::get('/center/edit/{centerId}', 'Admin\Center@edit')->name('admin.center.edit');
    Route::post('/center/save', 'Admin\Center@save')->name('admin.center.save');
    Route::get('/center/course/{centerId}', 'Admin\Course@index')->name('admin.center.course');

    Route::get('/course', 'Admin\Course@index')->name('admin.course.index');
    Route::get('/course/new', 'Admin\Course@create')->name('admin.course.create');
    Route::post('/course/save', 'Admin\Course@save')->name('admin.course.save');
    Route::get('/course/edit/{courseId}', 'Admin\Course@edit')->name('admin.course.edit');

    Route::get('/review', 'Admin\Review@index')->name('admin.review.index');
    Route::get('/review/delete/{reviewId}', 'Admin\Review@delete')->name('admin.review.delete');

    Route::get('/report', 'Admin\Report@index')->name('admin.report.index');
    Route::get('/report/delete/{reportId}', 'Admin\Report@delete')->name('admin.report.delete');

    Route::get('/', function () {
        return view('admin.dashboards.dashboard');
    });
});
