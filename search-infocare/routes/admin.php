<?php

Route::group(['namespace' => 'Admin','prefix' => 'admin-cpanel'],function (){
    Route::get('/','HomeController@getHome')->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/','UserController@getUsers')->name('users');
    });

    Route::group(['prefix' => 'services'], function () {
        Route::get('/','ServicesController@getServices')->name('services');
        Route::post('/add','ServicesController@storeServices')->name('service-add');
        Route::post('/','ServicesController@editServices')->name('service-update');
        Route::get('/delete/{id?}','ServicesController@destroyServices')->name('service-delete');
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/','ProjectsController@getProjects')->name('projects');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/','PagesController@getPages')->name('pages');
        Route::post('/add','PagesController@storePages')->name('page-add');
        Route::post('/','PagesController@editPages')->name('page-update');
        Route::get('/delete/{id?}','PagesController@destroyPages')->name('service-delete');

    });

});