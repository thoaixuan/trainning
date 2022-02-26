<?php

Route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){
    Route::get('/','DashboardController@getDashboard')->name('dashboard');
    Route::group(['prefix' => 'services'], function () {
        Route::get('/','ServicesController@getService')->name('services');
        Route::get('/datatable','ServicesController@getDatatable')->name('service_datatable');
        Route::get('/update','ServicesController@getUpdateServices')->name('service_update');
        Route::post('/update','ServicesController@postUpdateServices')->name('service_update');
        Route::post('/insert','ServicesController@postInsertServices')->name('service_insert');
        Route::post('/delete','ServicesController@destroyService')->name('service_delete');

    });
    Route::group(['prefix' => 'projects'], function () {
        Route::get('/','ServicesController@getService')->name('projects');
    });
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/','ServicesController@getService')->name('pages');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/','ServicesController@getService')->name('users');
    });
});