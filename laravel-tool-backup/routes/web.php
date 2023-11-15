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
    Route::get('/', 'BlogController@index')->name('guest.index');

    Route::group(['prefix' => '/blog'], function () {
        Route::get('/danh-muc/{slug?}', 'BlogController@index')->name('guest.blog.index');
        Route::get('/{slug?}', 'BlogController@viewDetail')->name('guest.blog.detail');
    });
    Route::group(['prefix' => '/pages'], function () {
        Route::get('/{slug?}', 'PageController@index')->name('guest.page.index');
        Route::get('/detail', 'BlogController@viewDetail')->name('guest.page.detail');
    });
    Route::group(['prefix'=>'/contact'],function(){
        Route::get('/','ContactController@index')->name('guest.contact.index');
        Route::post('/send_contacts','ContactController@insert')->name('guest.contact.send_contacts');
    });
});