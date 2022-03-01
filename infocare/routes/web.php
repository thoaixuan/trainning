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

Route::group(['namespace' => 'Guest'], function () {
    
    Route::group(['prefix' => '/'], function () {
        Route::get('/', 'HomeController@getHome')->name('guest_home');
        Route::get('/infomation', 'HomeController@getInformation')->name('guest_information');
        Route::get('/search', 'HomeController@searchInfomation')->name('guest_search_info');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/{slug?}', 'PagesController@getPages')->name('guest_pages');
    });
    
});