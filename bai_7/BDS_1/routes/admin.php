<?php
Route::group(['namespace'=>'Admin',''],function(){
    Route::get('/','DashboardController@index')->name('admin.dashboard');
});