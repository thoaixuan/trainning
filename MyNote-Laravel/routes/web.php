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


Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('userLoggedIn');

Route::prefix('users')->group(function (){
    Route::get('/', [UserController::class,'index'])->name('users')->middleware('userLoggedIn','checkUserRole');
    Route::get('/getusers', [UserController::class,'users'])->name('getusers')->middleware('userLoggedIn','checkUserRole');
    Route::get('/getuser', [UserController::class,'getuser'])->name('users.getuser')->middleware('userLoggedIn','checkUserRole');
    Route::post('/create', [UserController::class,'create'])->name('users.create')->middleware('userLoggedIn','checkUserRole');
    Route::post('/update', [UserController::class,'update'])->name('users.update')->middleware('userLoggedIn','checkUserRole');
    Route::get('/delete', [UserController::class,'destroy'])->name('users.delete')->middleware('userLoggedIn','checkUserRole');
});

Route::prefix('notes')->group(function (){
    Route::get('/', [NoteController::class,'index'])->name('notes')->middleware('userLoggedIn');
    Route::get('/getnotes', [NoteController::class,'notes'])->name('getnotes')->middleware('userLoggedIn');
    Route::get('/getnote', [NoteController::class,'getnote'])->name('notes.getnote')->middleware('userLoggedIn');
    Route::post('/create', [NoteController::class,'create'])->name('notes.create')->middleware('userLoggedIn');
    Route::post('/update', [NoteController::class,'update'])->name('notes.update')->middleware('userLoggedIn','checkNoteOwnership');
    Route::get('/delete', [NoteController::class,'destroy'])->name('notes.delete')->middleware('userLoggedIn','checkNoteOwnership');
});

Route::prefix('contact')->group(function (){
    Route::get('/', [ContactController::class,'index'])->name('contact');
    Route::post('/sendcontact', [ContactController::class,'sendContact'])->name('sendcontact');
    Route::get('/list', [ContactController::class,'list'])->name('list')->middleware('userLoggedIn','checkUserRole');
    Route::get('/getcontact', [ContactController::class,'getContact'])->name('listcontact')->middleware('userLoggedIn','checkUserRole');
    Route::get('/deletecontact', [ContactController::class,'deleteContact'])->name('deletecontact')->middleware('userLoggedIn','checkUserRole');
});






