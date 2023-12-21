<?php
use Spatie\Backup\Tasks\Backup\BackupJob;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

use Illuminate\Support\Facades\Route;

/*
Route::get('/install', function () {
    \Artisan::call('migrate');
    \Artisan::call('migrate:fresh --seed');
    return redirect()->route('guest.index');
});
*/
Route::get('/backup-db', function () {
    //Run lệnh backup database.
    // Create a new backup job for the database only
    $backupJob = BackupJobFactory::createFromArray(config('backup.backup'));

    // Run the backup job
    $backupJob->run();

    // Get the backup destination
    $backupDestination = BackupDestinationFactory::createFromArray(config('backup.backup.destination'));

});


$route_admin = route_admin()==null?'admin':route_admin();//admin / setting()->route_admin

Route::group(['namespace'=>'Auth'],function(){
    $route_login = route_login()==null?'admin-login':route_login();//admin-login / setting()->route_login
    Route::get($route_login,'LoginController@index')->name('admin.index.login');
    Route::post('/login-admin','LoginController@login')->name('admin.auth.login');
    Route::get('/logout-admin','LoginController@logout')->name('admin.auth.logout');
    Route::get('/404','LoginController@index404')->name('admin.error.404');
});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['checkAuth']],function(){
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/view', 'DashboardController@view')->name('admin.view');

    Route::group(['prefix' => 'news'],function(){
        Route::get('/','NewsController@index')->name('admin.news.index');
        Route::get('/data-news','NewsController@getDatatable')->name('admin.news.getDatatable');
        Route::post('/insert-news','NewsController@postInsertNews')->name('admin.news.insert');
        Route::get('/update-data-news','NewsController@updateData')->name('admin.news.getUpdate');
        Route::post('/update-news','NewsController@update')->name('admin.news.postUpdate');
        Route::get('/delete','NewsController@delete')->name('admin.news.delete');
        Route::get('/getInsert','NewsController@getInsert')->name('admin.news.getInsert');
        Route::get('/get-category','NewsController@getCategory')->name('admin.news.getCategory');
        Route::get('/check-slug','NewsController@checkSlug')->name('admin.news.checkSlug');

    });

    Route::group(['prefix' => 'pages'],function(){
        Route::get('/','PageController@index')->name('admin.page.index');
        Route::get('/fetchData','PageController@fetchData')->name('admin.page.datatables');
        Route::get('/fetchUpdate','PageController@fetchUpdate')->name('admin.page.fetch_update');
        Route::post('/insert','PageController@insert')->name('admin.page.insert');
        Route::post('/update','PageController@update')->name('admin.page.update');
        Route::get('/delete','PageController@delete')->name('admin.page.delete');
        Route::get('/check-slug','PageController@checkSlug')->name('admin.page.checkSlug');
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('/','UserController@index')->name('admin.user.index');
        Route::get('/any-data','UserController@anyData')->name('admin.user.datatable');
        Route::get('/get-users','UserController@getUsers')->name('admin.user.getUsers');
        Route::get('/user-permission','UserController@getPermission')->name('admin.user.getPermission');
        Route::get('/get-insert','UserController@getInsert')->name('admin.user.getInsert');
        Route::post('/insert','UserController@insert')->name('admin.user.insert');
        Route::get('/get-update','UserController@getUpdate')->name('admin.user.getUpdate');
        Route::post('/update','UserController@update')->name('admin.user.update');
        Route::get('/delete','UserController@delete')->name('admin.user.delete');
    });

    Route::group(['prefix' => 'contact'],function(){
        Route::get('/','ContactController@index')->name('admin.contact.index');
        Route::get('/data-contact','ContactController@getDatatable')->name('admin.contact.getDatatable');
        Route::get('/change-status','ContactController@changeStatus')->name('admin.contact.changeStatus');
        Route::get('/delete','ContactController@delete')->name('admin.contact.delete');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/','SettingController@index')->name('admin.setting.index');
        Route::get('/icon','SettingController@indexIcon')->name('admin.setting.indexIcon');
        Route::post('/update-home-banner','SettingController@updateHomeBanner')->name('admin.setting.homeBannerUpdate');
        Route::post('/update-home-project','SettingController@updateHomeProject')->name('admin.setting.homeProjectUpdate');
        Route::post('/update-home-camket','SettingController@updateHomeCamket')->name('admin.setting.homeCamketUpdate');
        Route::post('/update-website','SettingController@updateWebsite')->name('admin.setting.websiteUpdate');
        Route::post('/update-mail','SettingController@updateMail')->name('admin.setting.mailUpdate');
        Route::post('/update-google','SettingController@updateGoogle')->name('admin.setting.googleUpdate');
        Route::get('/backup', 'SettingController@backup')->name('admin.setting.backup');
    });
});