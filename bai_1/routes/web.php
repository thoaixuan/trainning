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
Route::get('/data','DatatablesController@anyData')->name('user.datatable');
Route::get('/edit','DatatablesController@getUpdate')->name('user.update');
Route::put('/edit','DatatablesController@postUpdate')->name('user.update.data');
Route::get('/delete','DatatablesController@delete')->name('user.delete');
Route::post('/insert','DatatablesController@addUser')->name('user.insert');