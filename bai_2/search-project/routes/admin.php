<?php
// Route::group(['middleware'=>['checklogin','....']])
Route::middleware('checkLogin')->group(function(){
    Route::get('/','AdminController@index')->name('admin.get.index');
    Route::get('/user','UserController@index')->name('admin.get.user');
    Route::get('/data','UserController@anyData')->name('admin.datatables.user');
    Route::get('/edit','UserController@getUpdate')->name('admin.update.user');
    Route::put('/edit','UserController@postUpdate')->name('admin.update_data.user');
    Route::get('/delete','UserController@delete')->name('admin.delete.user');
    Route::post('/insert','UserController@addUser')->name('admin.insert.user');

});
Route::get('/signin', 'LoginController@index')->name('admin.signin');
Route::post('/signin','LoginController@signin');

Route::get('/logout','LoginController@logout')->name('admin.logout');   