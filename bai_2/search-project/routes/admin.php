<?php
// Route::group(['middleware'=>['checklogin','....']])
Route::middleware('checkLogin')->group(function(){
    Route::get('/','AdminController@index')->name('admin.get.index');
    Route::get('/user','UserController@index')->name('admin.get.user');
    Route::get('/any-data','UserController@anyData')->name('admin.datatables.user');

});
Route::get('/signin', 'LoginController@index')->name('admin.signin');
Route::post('/signin','LoginController@signin');

Route::get('/logout','LoginController@logout')->name('admin.logout');