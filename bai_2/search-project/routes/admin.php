<?php
// Route::group(['middleware'=>['checklogin','....']])
Route::middleware('checkLogin')->group(function(){

    Route::get('/','AdminController@index')->name('admin.get.index');
    
    Route::prefix('user')->group(function () {
        Route::get('/','UserController@index')->name('admin.get.user');
        Route::get('/data-user','UserController@anyData')->name('admin.datatables.user');
        Route::get('/edit-user','UserController@getUpdate')->name('admin.update.user');
        Route::put('/edit-user','UserController@postUpdate')->name('admin.update_data.user');
        Route::get('/delete-user','UserController@delete')->name('admin.delete.user');
        Route::post('/insert-user','UserController@add')->name('admin.insert.user');
    });

    Route::prefix('service')->group(function () {
        Route::get('/','ServiceController@index')->name('admin.get.service');
        Route::get('/data-service','ServiceController@anyData')->name('admin.datatables.service');
        Route::get('/edit-service','ServiceController@getUpdate')->name('admin.update.service');
        Route::put('/edit-service','ServiceController@postUpdate')->name('admin.update_data.service');
        Route::get('/delete-service','ServiceController@delete')->name('admin.delete.service');
        Route::post('/insert-service','ServiceController@add')->name('admin.insert.service');
    });
 
    Route::prefix('project')->group(function () {
        Route::get('/','ProjectController@index')->name('admin.get.project');
        Route::get('/data-project','ProjectController@anyData')->name('admin.datatables.project');
        Route::get('/edit-project','ProjectController@getUpdate')->name('admin.update.project');
        Route::put('/edit-project','ProjectController@postUpdate')->name('admin.update_data.project');
        Route::get('/delete-project','ProjectController@delete')->name('admin.delete.project');
        Route::post('/insert-project','ProjectController@add')->name('admin.insert.project');
        Route::get('/project-user','ProjectController@getUser')->name('admin.get_user.project');
        Route::get('/project-service','ProjectController@getService')->name('admin.get_service.project');
    });

    Route::prefix('page')->group(function(){
        Route::get('/','PageController@index')->name('admin.get.page');
        Route::get('/data-page','PageController@anyData')->name('admin.datatables.page');
        // Route::get('/edit-page','PageController@getUpdate')->name('admin.update.page');
        // Route::put('/edit-page','PageController@postUpdate')->name('admin.update_data.page');
        // Route::get('/delete-page','PageController@delete')->name('admin.delete.page');
        // Route::post('/insert-page','PageController@add')->name('admin.insert.page');
    });

    Route::get('/info-admin','LoginController@getInfo')->name('admin.get_info.index');
    Route::put('/update-info-admin','LoginController@postUpdate')->name('admin.update_data.info');
});
Route::get('/signin', 'LoginController@index')->name('admin.signin');
Route::post('/signin','LoginController@signin');
Route::get('/logout','LoginController@logout')->name('admin.logout');   