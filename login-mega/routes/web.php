<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\MegaLoginController;
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
    return view('pages.login.loginmega');
})->name('login');


Route::post('/loginpost','MegaLoginController@loginPost')->name('login.post');
Route::get('/logout','MegaLoginController@logout')->name('logout');

Route::get('/home','HomeController@index')->name('home.index');
Route::get('/my-folder','HomeController@getfolder')->name('home.getfolder');
Route::get('/my-folder/{id?}','HomeController@viewFolder')->name('home.viewfolder');
