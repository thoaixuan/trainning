<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.auth.login');
});
Route::get('/404', function () {
    return view('Admin.pages.error.404');
});
Route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){

    Route::get('/', function () {
        return view('Admin.auth.login');
    });
    Route::post('/login','LoginController@login')->name('admin_post_login');
    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard')->middleware('checkPermission:dashboard_view');

    Route::prefix('phongban')->group(function(){
        Route::get('/','PhongbanController@getPhongban')->name('phongban')->middleware('checkPermission:phongban_view');
        Route::get('/datatable','PhongbanController@getDatatable')->name('phongban_datatable');
        Route::get('/update','PhongbanController@getUpdatePhongban')->name('phongban_update')->middleware('checkPermission:phongban_update');
        Route::post('/update','PhongbanController@postUpdatePhongban')->name('phongban_update')->middleware('checkPermission:phongban_update');
        Route::get('/insert','PhongbanController@getInsertPhongban')->name('phongban_insert')->middleware('checkPermission:phongban_insert');
        Route::post('/insert','PhongbanController@postInsertPhongban')->name('phongban_insert')->middleware('checkPermission:phongban_insert');
        Route::get('/delete','PhongbanController@destroyPhongban')->name('phongban_delete')->middleware('checkPermission:phongban_delete');
    });
    Route::prefix('users')->group(function(){
        Route::get('/','UserController@getUser')->name('users')->middleware('checkPermission:user_view');
        Route::get('/user-permission','UserController@getPermission')->name('user_permission');
        Route::get('/datatable','UserController@getDatatable')->name('user_datatable');
        Route::get('/update','UserController@getUpdateUser')->name('user_update')->middleware('checkPermission:user_update');
        Route::post('/update','UserController@postUpdateUser')->name('user_update')->middleware('checkPermission:user_update');
        Route::get('/insert','UserController@getInsertUser')->name('user_insert')->middleware('checkPermission:user_insert');
        Route::post('/insert','UserController@postInsertUser')->name('user_insert')->middleware('checkPermission:user_insert');
        Route::get('/delete','UserController@destroyUser')->name('user_delete')->middleware('checkPermission:user_delete');
    });
    Route::prefix('permission')->group(function(){
        Route::get('/','PermissionController@index')->name('permission')->middleware('checkPermission:permission_view');
        Route::get('/datatable','PermissionController@getDatatable')->name('permission_datatable');
        Route::get('/update','PermissionController@getUpdatePermission')->name('permission_update')->middleware('checkPermission:permission_update');
        Route::post('/update','PermissionController@postUpdatePermission')->name('permission_update')->middleware('checkPermission:permission_update');
        Route::get('/insert','PermissionController@getInsertPermission')->name('permission_insert')->middleware('checkPermission:permission_insert');
        Route::post('/insert','PermissionController@postInsertPermission')->name('permission_insert')->middleware('checkPermission:permission_insert');
        Route::get('/delete','PermissionController@destroyPermission')->name('permission_delete')->middleware('checkPermission:permission_delete');
    });
});
