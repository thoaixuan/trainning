<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\LoginController;
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



Route::get('/',[HomeController::class, 'index'])->name('guest.index.home');
Route::get('/data',[HomeController::class, 'getdata'])->name('guest.getdata.home');
Route::get('/any-data',[HomeController::class, 'anydata'])->name('guest.anydata.home');
Route::get('/login',[LoginController::class, 'index'])->name('guest.signin.home');
Route::get('/logout',[LoginController::class, 'logout'])->name('guest.logout.home');
Route::post('/login',[LoginController::class, 'login'])->name('guest.post_signin.home');
Route::get('/edit-user',[HomeController::class,'getUpdate'])->name('guest.update.user');
Route::post('/edit-user',[HomeController::class,'postUpdate'])->name('guest.update_data.user');
Route::get('/delete-user',[HomeController::class,'delete'])->name('guest.delete.user');
Route::get('/get-room',[HomeController::class,'getRoom'])->name('guest.get_room.user');
