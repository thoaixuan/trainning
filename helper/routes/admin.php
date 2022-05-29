<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SupportController;

Route::group(['namespace'=>'Admin'],function(){
    Route::get('/logout',[LoginController::class,'logout'])->name('admin.login.logout');
    Route::get('/login', [LoginController::class,'login'])->name('admin.login.index');
    Route::post('/login', [LoginController::class,'index'])->name('admin.login.login');
    Route::get('/send-password',[LoginController::class,'handleSendPassword'])->name('admin.login.send_password');
    Route::get('/forget-password', [LoginController::class,'forgetPassword'])->name('admin.login.forget_password');
    Route::post('/change-password', [LoginController::class,'changePassword'])->name('admin.login.change_password');
    Route::group(['middleware'=>['checkPermission']],function(){
        Route::get('/', [DashboardController::class,'index'])->name('admin.index.dashboard');
        Route::group(['prefix' => 'contact'], function () {
            Route::get('/',[ContactController::class,'index'])->name('admin.contact.index');
            Route::get('/fecth-datatable',[ContactController::class,'fetchData'])->name('admin.contact.datatable');
            Route::get('/delete',[ContactController::class,'delete'])->name('admin.contact.delete');
        });
        Route::group(['prefix' => 'support'], function () {
            Route::get('/',[SupportController::class,'index'])->name('admin.support.index');
            Route::get('/fecth-datatable',[SupportController::class,'fetchData'])->name('admin.support.datatable');
            Route::get('/delete',[SupportController::class,'delete'])->name('admin.support.delete');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/',[SettingController::class,'index'])->name('admin.setting.index');
            Route::post('/update-home',[SettingController::class,'updateHome'])->name('admin.setting.update_home');
            Route::post('/update-website',[SettingController::class,'updateWebsite'])->name('admin.setting.update_website');
            Route::post('/update-mail',[SettingController::class,'updateMail'])->name('admin.setting.update_mail');
            Route::post('/update-google',[SettingController::class,'updateGoogle'])->name('admin.setting.update_google');
        });
    });
    
    
});