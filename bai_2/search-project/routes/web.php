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
Route::get('/','HomeController@index')->name('guest.home');

Route::get('/signin', 'GuestController@index')->name('guest.signin');
Route::post('/signin', 'GuestController@signin')->name('guest.signin');

Route::get('/any-data','HomeController@anyData')->name('guest.datatables.home');



