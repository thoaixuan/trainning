<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;


Route::get('/', function(){
    return view('auth.login');
})->name('showLogin');

Route::controller(LoginController::class)->group(function(){
    Route::post('/login','login')->name('login');
    Route::get('/logout','logout')->name('logout');
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/home', 'index')->name('home')->middleware('userLoggedIn');
});


Route::controller(UserController::class)->group(function (){
    Route::get('/users', 'index')->name('users')->middleware('userLoggedIn','checkUserRole');
    Route::get('/users/getusers', 'users')->name('getusers')->middleware('userLoggedIn','checkUserRole');
    Route::get('/users/getuser','getuser')->name('users.getuser')->middleware('userLoggedIn','checkUserRole');
    Route::post('/users/create', 'create')->name('users.create')->middleware('userLoggedIn','checkUserRole');
    Route::post('/users/update', 'update')->name('users.update')->middleware('userLoggedIn','checkUserRole');
    Route::get('/users/delete', 'destroy')->name('users.delete')->middleware('userLoggedIn','checkUserRole');
});

Route::controller(NoteController::class)->group(function (){
    Route::get('/notes', 'index')->name('notes')->middleware('userLoggedIn');
    Route::get('/notes/getnotes', 'notes')->name('getnotes')->middleware('userLoggedIn');
    Route::get('/notes/getnote', 'getnote')->name('notes.getnote')->middleware('userLoggedIn');
    Route::post('/notes/create', 'create')->name('notes.create')->middleware('userLoggedIn');
    Route::post('/notes/update', 'update')->name('notes.update')->middleware('userLoggedIn','checkNoteOwnership');
    Route::get('/notes/delete', 'destroy')->name('notes.delete')->middleware('userLoggedIn','checkNoteOwnership');
});

Route::controller(ContactController::class)->group(function (){
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact/sendcontact', 'sendContact')->name('sendcontact');
    Route::get('/contact/list', 'list')->name('list')->middleware('userLoggedIn','checkUserRole');
    Route::get('/contact/getcontacts','getContacts')->name('listcontact')->middleware('userLoggedIn','checkUserRole');
    Route::get('/contact/getcontact','getContact')->name('getcontact')->middleware('userLoggedIn','checkUserRole');
    Route::post('/contact/updatecontact','updateContact')->name('updatecontact')->middleware('userLoggedIn','checkUserRole');
    Route::get('/contact/deletecontact','deleteContact')->name('deletecontact')->middleware('userLoggedIn','checkUserRole');
});






