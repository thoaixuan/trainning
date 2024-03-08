<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\ProductController;
use App\Http\Controllers\guest\NewsController;
use App\Http\Controllers\guest\SocialController;
use App\Http\Controllers\guest\PreOrderController;
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
Route::get('/', [HomeController::class, 'index'])->name('guest.home');
Route::get('/e-gate-gpt-chat',function(){
    return redirect('/clients-dashboard/e-gate-gpt-chat');
})->name('guest.chatgpt');
Route::get('/pre-orders', [PreOrderController::class, 'index'])->name('guest.preOders');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('guest.product');
Route::get('/product', [ProductController::class, 'indexCategory'])->name('guest.indexCategory');
Route::get('/category/{slug}', [ProductController::class, 'getCategory'])->name('guest.category');

Route::get('/news', [NewsController::class, 'indexNews'])->name('guest.indexNews');
Route::get('/news/{id}', [NewsController::class, 'index'])->name('guest.news');

Route::get('/about-us', [HomeController::class, 'indexAboutUs'])->name('guest.indexAboutUs');

Route::get('/contact', [HomeController::class, 'indexContact'])->name('guest.indexContact');

Route::get('/auth/{driver}', [SocialController::class, 'redirectToProvider'])->name('client.social.oauth');
Route::get('/auth/{driver}/callback',[SocialController::class, 'handleProviderCallback'])->name('client.social.callback');
Route::get('/maintenance',function(){
    return view('guest.layouts.maintenance');
})->name('guest.maintenance');
// Chính sách laravel
Route::get('/privacy-policy',function(){
    return view('guest.pages.privacy-policy');
});
Route::get('/clients-dashboard',function(){
    return view('guest.layouts.main-client-dashboard');
});
Route::get('/clients-dashboard/{any}',function(){
    return view('guest.layouts.main-client-dashboard');
})->where('any', '.*');
Route::any('{any}', function () {
    return view('guest.layouts.main');
})->where('any', '.*');