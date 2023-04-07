<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', function(){
    return view('auth.login');
});

Route::post('/login','App\Http\Controllers\LoginController@login')->name('login');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('userLoggedIn');

Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users')->middleware('userLoggedIn','checkUserRole');
Route::get('/users/id', 'App\Http\Controllers\UserController@getId')->name('users/id')->middleware('userLoggedIn','checkUserRole');
Route::get('/users/getusers', 'App\Http\Controllers\UserController@users')->name('getusers')->middleware('userLoggedIn','checkUserRole');
Route::get('users/getuser/{id}', 'App\Http\Controllers\UserController@getuser')->name('users.getuser')->middleware('userLoggedIn','checkUserRole');
Route::post('users/create', 'App\Http\Controllers\UserController@create')->name('users.create')->middleware('userLoggedIn','checkUserRole');
Route::post('users/update', 'App\Http\Controllers\UserController@update')->name('users.update')->middleware('userLoggedIn','checkUserRole');
Route::get('users/delete/{id}', 'App\Http\Controllers\UserController@destroy')->name('users.delete')->middleware('userLoggedIn','checkUserRole');

Route::get('/notes', 'App\Http\Controllers\NoteController@index')->name('notes')->middleware('userLoggedIn');
Route::get('/notes/getnotes', 'App\Http\Controllers\NoteController@notes')->name('getnotes')->middleware('userLoggedIn');
Route::get('notes/getnote/{id}', 'App\Http\Controllers\NoteController@getnote')->name('notes.getnote')->middleware('userLoggedIn');
Route::post('notes/create', 'App\Http\Controllers\NoteController@create')->name('notes.create')->middleware('userLoggedIn');
Route::post('notes/update', 'App\Http\Controllers\NoteController@update')->name('notes.update')->middleware('userLoggedIn');
Route::get('notes/delete/{id}', 'App\Http\Controllers\NoteController@destroy')->name('notes.delete')->middleware('userLoggedIn');





