<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\IndexController;

Route::controller(IndexController::class)->group(function(){
    Route::get('/','index')->name("admin.dashboard");
    Route::get('/any-data','anyData')->name("admin.dashboard.datatable");
    Route::get('/get-province','getProvince')->name("admin.dashboard.get-province");
    Route::get('/get-district','getDistrict')->name("admin.dashboard.get-district");
    Route::get('/get-ward','getWard')->name("admin.dashboard.get-ward");
    Route::get('/get-price','getPrice')->name("admin.dashboard.get-price");
    Route::get('/get-area','getArea')->name("admin.dashboard.get-area");
    Route::get('/get-data','getData')->name("admin.dashboard.get-data");
});