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

Route::get('/data','DatatablesController@anyData')->name('admin.datatable.dashboard');
Route::get('/edit','DatatablesController@getUpdate')->name('admin.update.dashboard');
Route::put('/edit','DatatablesController@postUpdate')->name('admin.update_data.dashboard');
Route::get('/delete','DatatablesController@delete')->name('admin.delete.dashboard');
Route::post('/insert','DatatablesController@addUser')->name('admin.insert.dashboard');