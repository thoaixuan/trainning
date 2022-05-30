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
    return view('Admin.pages.dashboard.dashboard');
});
Route::prefix('product')->group(function(){
    Route::get('/','ProductController@getProduct')->name('product');
    Route::get('/datatable','ProductController@getDatatable')->name('product_datatable');
    Route::get('/update','ProductController@getUpdateProduct')->name('product_update');
    Route::post('/update','ProductController@postUpdateProduct')->name('product_update');
    Route::post('/insert','ProductController@postInsertProduct')->name('product_insert');
    Route::post('/delete','ProductController@destroyProduct')->name('product_delete');
});
