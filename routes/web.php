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
Route::post('admin/home', 'admin\Dashboard@checkLogin')->name('admin.checkLogin');
Route::group(['prefix' => 'admin', 'middleware' => ['admin.checkLogin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboards.dashboard');
    });
    Route::get('/', function () {
        return view('admin.dashboards.dashboard');
    });
});
