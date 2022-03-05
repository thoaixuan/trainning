<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guest\HomeController;
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
    return view('guest.pages.home.home');
});

// Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login',[HomeController::class, 'login'])->name('login');
Route::post('/login',[HomeController::class, 'postLogin'])->name('login');