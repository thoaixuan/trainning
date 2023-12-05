<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\AuthController;
use app\Http\Controllers\Home\HomeController;
use app\Http\Controllers\Note\MyNoteController;
use app\Http\Controllers\Users\UserController;
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
    return view('auth.login');
})->name('LoginUser');


Route::get('/login','Auth\AuthController@login')->name('login');
Route::post('/loginpost','Auth\AuthController@loginPost')->name('login.post');
Route::get('/register', 'Auth\AuthController@register')->name('register');
Route::post('/registerpost', 'Auth\AuthController@registerPost')->name('register.post');
Route::get('/logout','Auth\AuthController@logout')->name('logout');

Route::get('/home','Home\HomeController@index')->name('home.index')->middleware('userLoggedIn');


Route::prefix('mynote')->group(function(){
    Route::get('/','Note\MyNoteController@index')->name('note.index')->middleware('userLoggedIn');
    Route::get('/tablenote','Note\MyNoteController@getDatatable')->name('note.table')->middleware('userLoggedIn');
    // Route::get('/create','Note\MyNoteController@create')->name('note.create')->middleware('userLoggedIn');;
    Route::post('/createpost','Note\MyNoteController@createPost')->name('note.createpost')->middleware('userLoggedIn');
    Route::get('/update','Note\MyNoteController@update')->name('note.update')->middleware('userLoggedIn');
    Route::post('/updatepost','Note\MyNoteController@updatePost')->name('note.updatepost')->middleware('userLoggedIn');
    Route::get('/delete','Note\MyNoteController@delete')->name('note.delete')->middleware('userLoggedIn');
});

Route::prefix('users')->group(function(){
    Route::get('/','Users\UserController@index')->name('users.index')->middleware('userLoggedIn');
    Route::get('/table-users','Users\UserController@getTableUsers')->name('users.table')->middleware('userLoggedIn');
    Route::get('/create','Users\UserController@createUsers')->name('users.create')->middleware('userLoggedIn');
    Route::post('/create-users','Users\UserController@createUsersPost')->name('users.createpost')->middleware('userLoggedIn');
    Route::get('/update','Users\UserController@update')->name('users.update')->middleware('userLoggedIn');
    Route::post('/update-users','Users\UserController@updateUsersPost')->name('users.updatepost')->middleware('userLoggedIn');
    Route::get('/delete','Users\UserController@delete')->name('users.delete')->middleware('userLoggedIn');
});

