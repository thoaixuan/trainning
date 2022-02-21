<?php
// Route::group(['middleware'=>['checklogin','....']])
Route::middleware('checkLogin')->group(function(){
    
    Route::get('/','AdminController@index')->name('admin.get.index');
    Route::get('/user','UserController@index')->name('admin.get.user');
    Route::get('/data-user','UserController@anyData')->name('admin.datatables.user');
    Route::get('/edit-user','UserController@getUpdate')->name('admin.update.user');
    Route::put('/edit-user','UserController@postUpdate')->name('admin.update_data.user');
    Route::get('/delete-user','UserController@delete')->name('admin.delete.user');
    Route::post('/insert-user','UserController@add')->name('admin.insert.user');

    Route::get('/service','ServiceController@index')->name('admin.get.service');
    Route::get('/data-service','ServiceController@anyData')->name('admin.datatables.service');
    Route::get('/edit-service','ServiceController@getUpdate')->name('admin.update.service');
    Route::put('/edit-service','ServiceController@postUpdate')->name('admin.update_data.service');
    Route::get('/delete-service','ServiceController@delete')->name('admin.delete.service');
    Route::post('/insert-service','ServiceController@add')->name('admin.insert.service');
    
    Route::get('/project','ProjectController@index')->name('admin.get.project');
    Route::get('/data-project','ProjectController@anyData')->name('admin.datatables.project');
    Route::get('/edit-project','ProjectController@getUpdate')->name('admin.update.project');
    Route::put('/edit-project','ProjectController@postUpdate')->name('admin.update_data.project');
    Route::get('/delete-project','ProjectController@delete')->name('admin.delete.project');
    Route::post('/insert-project','ProjectController@add')->name('admin.insert.project');

});
Route::get('/signin', 'LoginController@index')->name('admin.signin');
Route::post('/signin','LoginController@signin');

Route::get('/logout','LoginController@logout')->name('admin.logout');   