<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register','AuthController@register')->name('auth.register.api');
Route::post('login','AuthController@login')->name('auth.login.api');
Route::middleware('auth:sanctum')->group(function(){
    Route::get('user','AuthController@getAll')->name('auth.getAll.api');
    Route::post('logout','AuthController@logout')->name('auth.logout.api');
});
