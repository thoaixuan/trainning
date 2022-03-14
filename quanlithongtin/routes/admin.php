<?php
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/admin', function () {
        return view('Admin.auth.login');
    });
    Route::post('/checkLoginAdmin', 'LoginController@checkLogin');
    Route::get('/logoutAdmin', 'LoginController@logoutAdmin')->name('logout-admin');
});
Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => 'checkAdmin'],function (){
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');

    Route::prefix('phongban')->group(function(){
        Route::get('/','PhongbanController@getPhongban')->name('phongban');
        Route::get('/datatable','PhongbanController@getDatatable')->name('phongban_datatable');
        Route::get('/update','PhongbanController@getUpdatePhongban')->name('phongban_update');
        Route::post('/update','PhongbanController@postUpdatePhongban')->name('phongban_update');
        Route::post('/insert','PhongbanController@postInsertPhongban')->name('phongban_insert');
        Route::post('/delete','PhongbanController@destroyPhongban')->name('phongban_delete');
    });
    Route::prefix('users')->group(function(){
        Route::get('/','UserController@getUser')->name('users');
        Route::get('/datatable','UserController@getDatatable')->name('user_datatable');
        Route::get('/getpb','UserController@getPhongban')->name('get_phongban');
        Route::get('/update','UserController@getUpdateUser')->name('user_update');
        Route::post('/update','UserController@postUpdateUser')->name('user_update');
        Route::post('/insert','UserController@postInsertUser')->name('user_insert');
        Route::post('/delete','UserController@destroyUser')->name('user_delete');
    });
});