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
Route::get('/', function () {
    return view('Admin.auth.login');
});

Route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){
    Route::get('/', function () {
        return view('Admin.auth.login');
    });
    Route::post('/checkLogin', 'LoginController@checkLogin')->name('check-login');
    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard')->middleware('checkLogin:dashboard_view');

    Route::prefix('phongban')->group(function(){
        Route::get('/','PhongbanController@getPhongban')->name('phongban')->middleware('checkLogin:phongban_view');
        Route::get('/datatable','PhongbanController@getDatatable')->name('phongban_datatable');
        Route::get('/update','PhongbanController@getUpdatePhongban')->name('phongban_update')->middleware('checkLogin:phongban_update');
        Route::post('/update','PhongbanController@postUpdatePhongban')->name('phongban_update')->middleware('checkLogin:phongban_update');
        Route::post('/insert','PhongbanController@postInsertPhongban')->name('phongban_insert')->middleware('checkLogin:phongban_insert');
        Route::post('/delete','PhongbanController@destroyPhongban')->name('phongban_delete')->middleware('checkLogin:phongban_delete');
    });
    Route::prefix('users')->group(function(){
        Route::get('/','UserController@getUser')->name('users')->middleware('checkLogin:user_view');
        Route::get('/datatable','UserController@getDatatable')->name('user_datatable');
        Route::get('/update','UserController@getUpdateUser')->name('user_update')->middleware('checkLogin:user_update');
        Route::post('/update','UserController@postUpdateUser')->name('user_update')->middleware('checkLogin:user_update');
        Route::post('/insert','UserController@postInsertUser')->name('user_insert')->middleware('checkLogin:user_insert');
        Route::post('/delete','UserController@destroyUser')->name('user_delete')->middleware('checkLogin:user_delete');
    });
});