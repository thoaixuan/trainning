<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterEnrollmentController;
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

Route::group(['prefix'=>'/'],function(){
    Route::get('/',[RegisterEnrollmentController::class,'index'])->name('pages.index');
    Route::post('/them-thong-tin',[RegisterEnrollmentController::class,'postInfo'])->name('pages.postInfo');
    Route::get('/thanh-cong',[RegisterEnrollmentController::class,'success'])->name('pages.success');
});

