<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/signin', function () {
    return view('guest.pages.signin.signin');
});
Route::get('/signup', function () {
    return view('guest.pages.signup.signup');
});
Route::get('/about', function () {
    return view('guest.pages.about.about');
});
Route::get('/blog-details', function () {
    return view('guest.pages.blog-details.blog-details');
});
Route::get('/blog-grid', function () {
    return view('guest.pages.blog-grid.blog-grid');
});
Route::get('/contact', function () {
    return view('guest.pages.contact.contact');
});
Route::get('/shop', function () {
    return view('guest.pages.shop.shop');
});
Route::get('/team', function () {
    return view('guest.pages.team.team');
});
Route::get('/thank-you', function () {
    return view('guest.pages.thank-you.thank-you');
});