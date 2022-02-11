<?php

use Illuminate\Support\Facades\Route;
use App\User;
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


Route::get('/','DatatablesController@getIndex');
Route::get('/data','DatatablesController@anyData');
Route::get('/{id}/edit','DatatablesController@update')->name('edit');
Route::get('/{id}/delete','DatatablesController@delete')->name('delete');