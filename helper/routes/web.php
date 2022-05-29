<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\SupportController;

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

Route::group(['namespace'=>'Guest'],function(){
    Route::get('/',[HomeController::class,'index'])->name('guest.home.index');
    Route::group(['prefix'=>'/contact'],function(){
        Route::get('/',[ContactController::class,'index'])->name('guest.contact.index');
        Route::post('/send_contacts',[ContactController::class,'insert'])->name('guest.contact.send_contacts');
    });
    Route::group(['prefix'=>'/support'],function(){
        Route::get('/',[SupportController::class,'index'])->name('guest.support.index');
        Route::post('/send-support',[SupportController::class,'insert'])->name('guest.support.send_support');
    });
});

// Route::get('/contact',[ContactController::class,'index'])->name('guest.contact.index');
