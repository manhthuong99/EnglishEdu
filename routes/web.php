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
Route::post('admin/home', 'Admin\User@checkLogin')->name('admin.user.checkLogin');
Route::get('admin/home', 'Admin\User@logout')->name('admin.user.logout');
Route::group(['prefix' => 'admin', 'middleware' => ['admin.checkLogin']], function () {
    Route::get('/dashboard', 'Admin\Dashboard@index')->name('admin.dashboards.index');
    Route::get('/user', 'Admin\User@index')->name('admin.user.index');
    Route::get('/user/{userId}', 'Admin\User@edit')->name('admin.user.edit');
    Route::get('/', function () {
        return view('admin.dashboards.dashboard');
    });
});
