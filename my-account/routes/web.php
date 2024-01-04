<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\AuthController;

use app\Http\Controllers\Admin\NoteAdminController;
use app\Http\Controllers\Admin\HomeAdminController;
use app\Http\Controllers\Admin\UserAdminController;

use app\Http\Controllers\Guest\ContactGuestController;
use app\Http\Controllers\Guest\HomeGuestController;
use app\Http\Controllers\Guest\NoteGuestController;

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
Route::get('/404', 'Auth\AuthController@index404')->name('error.404');


Route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('/home','HomeAdminController@index')->name('admin.home.index')->middleware('userLoggedIn');

    Route::prefix('users')->group(function(){
        Route::get('/','UserAdminController@index')->name('admin.users.index')->middleware('userLoggedIn', 'CheckPerUsers');
        Route::get('/table-users','UserAdminController@getTableUsers')->name('admin.users.table')->middleware('userLoggedIn', 'CheckPerUsers');
        Route::get('/get-user','UserAdminController@getUser')->name('admin.users.getuser')->middleware('userLoggedIn', 'CheckPerUsers');
        Route::post('/create-users','UserAdminController@createUsersPost')->name('admin.users.createpost')->middleware('userLoggedIn', 'CheckPerUsers');
        Route::post('/update-users','UserAdminController@updateUsersPost')->name('admin.users.updatepost')->middleware('userLoggedIn', 'CheckPerUsers');
        Route::get('/delete','UserAdminController@delete')->name('admin.users.delete')->middleware('userLoggedIn', 'CheckPerUsers');
        Route::post('/upload-image','UserAdminController@uploadImage')->name('admin.users.image')->middleware('userLoggedIn', 'CheckPerUsers');
    });

    Route::prefix('mynote')->group(function(){
        Route::get('/','NoteAdminController@index')->name('admin.note.index')->middleware('userLoggedIn');
        Route::get('/tablenote','NoteAdminController@getDatatable')->name('admin.note.table')->middleware('userLoggedIn');
        Route::post('/createpost','NoteAdminController@createPost')->name('admin.note.createpost')->middleware('userLoggedIn');
        Route::get('/update','NoteAdminController@update')->name('admin.note.update')->middleware('userLoggedIn');
        Route::post('/updatepost','NoteAdminController@updatePost')->name('admin.note.updatepost')->middleware('userLoggedIn');
        Route::get('/delete','NoteAdminController@delete')->name('admin.note.delete')->middleware('userLoggedIn');
    });

    Route::prefix('mytask')->group(function(){
        Route::get('/','TaskAdminController@index')->name('admin.task.index')->middleware('userLoggedIn');
        Route::get('/table-task','TaskAdminController@getDatatable')->name('admin.task.table')->middleware('userLoggedIn');
        Route::post('/create-task','TaskAdminController@createTaskPost')->name('admin.task.createpost')->middleware('userLoggedIn');
        Route::get('/update','TaskAdminController@update')->name('admin.task.update')->middleware('userLoggedIn');
        Route::post('/update-task','TaskAdminController@updateTaskPost')->name('admin.task.updatepost')->middleware('userLoggedIn');
        Route::get('/delete','TaskAdminController@delete')->name('admin.task.delete')->middleware('userLoggedIn');
    });
});

Route::group(['namespace' => 'Guest','prefix' => 'guest'],function (){

    Route::get('/home','HomeGuestController@index')->name('guest.home.index')->middleware('userLoggedIn');

    Route::prefix('mynote')->group(function(){
        Route::get('/','NoteGuestController@index')->name('guest.note.index')->middleware('userLoggedIn');
        Route::get('/tablenote','NoteGuestController@getDatatable')->name('guest.note.table')->middleware('userLoggedIn');
        Route::post('/createpost','NoteGuestController@createPost')->name('guest.note.createpost')->middleware('userLoggedIn');
        Route::get('/update','NoteGuestController@update')->name('guest.note.update')->middleware('userLoggedIn');
        Route::post('/updatepost','NoteGuestController@updatePost')->name('guest.note.updatepost')->middleware('userLoggedIn');
        Route::get('/delete','NoteGuestController@delete')->name('guest.note.delete')->middleware('userLoggedIn');
    });
    Route::prefix('contact')->group(function(){
        Route::get('/','ContactGuestController@index')->name('guest.contact.index')->middleware('userLoggedIn');
        Route::post('/contactpost','ContactGuestController@contactPost')->name('guest.contact.post')->middleware('userLoggedIn');
    });

});
