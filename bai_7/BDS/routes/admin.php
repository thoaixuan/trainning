<?php
use App\Http\Controllers\Admin\DashboardController;
Route::controller(DashboardController::class)->group(function(){
    Route::get('/','index')->name("admin.dashboard");
    Route::get('/any-data','anyData')->name("admin.dashboard.datatable");
});