<?php
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/admin', function () {
        return view('Admin.auth.login');
    });
    Route::post('/checkLoginAdmin', 'LoginController@checkLogin');
    Route::get('/logoutAdmin', 'LoginController@logoutAdmin')->name('logout-admin');
});

Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => 'authAdmin'],function (){
    Route::get('/dashboard','DashboardController@getDashboard')->name('dashboard');
    Route::group(['prefix' => 'services'], function () {
        Route::get('/','ServicesController@getService')->name('services');
        Route::get('/datatable','ServicesController@getDatatable')->name('service_datatable');
        Route::get('/update','ServicesController@getUpdateServices')->name('service_update');
        Route::post('/update','ServicesController@postUpdateServices')->name('service_update');
        Route::post('/insert','ServicesController@postInsertServices')->name('service_insert');
        Route::post('/delete','ServicesController@destroyService')->name('service_delete');
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/all','ProjectsController@getProject')->name('projects');
        Route::get('/expired','ProjectsController@getExpired')->name('projects_expired');
        Route::get('/unexpired','ProjectsController@getUnexpired')->name('projects_unexpired');


        Route::get('/datatable','ProjectsController@getDatatable')->name('project_datatable');
        Route::get('/datatable-expired','ProjectsController@getDatatableExpired')->name('projects_datatable_exprired');
        Route::get('/datatable-unexpired','ProjectsController@getDatatableUnexpired')->name('projects_datatable_unexpired');

        Route::get('/update','ProjectsController@getUpdateProjects')->name('project_update');
        Route::post('/update','ProjectsController@postUpdateProjects')->name('project_update');
        Route::post('/insert','ProjectsController@postInsertProjects')->name('project_insert');
        Route::post('/delete','ProjectsController@destroyProject')->name('project_delete');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/','PagesController@getPage')->name('pages');
        Route::get('/datatable','PagesController@getDatatable')->name('page_datatable');
        Route::get('/update','PagesController@getUpdatePages')->name('page_update');
        Route::post('/update','PagesController@postUpdatePages')->name('page_update');
        Route::post('/insert','PagesController@postInsertPages')->name('page_insert');
        Route::post('/delete','PagesController@destroyPage')->name('page_delete');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/','UsersController@getUser')->name('users');
        Route::get('/datatable','UsersController@getDatatable')->name('user_datatable');
        Route::get('/update','UsersController@getUpdateUsers')->name('user_update');
        Route::post('/update','UsersController@postUpdateUsers')->name('user_update');
        Route::post('/insert','UsersController@postInsertUsers')->name('user_insert');
        Route::post('/delete','UsersController@destroyUser')->name('user_delete');
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/','ContactController@getContact')->name('contact');
        Route::get('/datatable','ContactController@getDatatable')->name('contact_datatable');
        Route::post('/delete','ContactController@destroyContact')->name('contact_delete');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/','SettingsController@getSetting')->name('settings');
        Route::post('/update-mail','SettingsController@updateMail')->name('settings_update_mail');
    });
});