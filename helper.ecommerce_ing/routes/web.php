<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\ContactController;

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

Route::get('/',[HomeController::class,'index'])->name('guest.home.index');
Route::group(['prefix'=>'/contact'],function(){
    Route::get('/',[ContactController::class,'index'])->name('guest.contact.index');
    Route::post('/send_contacts',[ContactController::class,'insert'])->name('guest.contact.send_contacts');
});
// Route::get('/contact',[ContactController::class,'index'])->name('guest.contact.index');
