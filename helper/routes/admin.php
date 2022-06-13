<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HomeCategoryController;
use App\Http\Controllers\Admin\HomeQuestionController;
use App\Http\Controllers\Admin\DepartmentController;
/*
-- Chỉ mở ra khi đang code, dùng cho lúc dev!
Route::get('/install', function () {
    \Artisan::call('migrate');
    \Artisan::call('migrate:fresh --seed');
    return redirect()->route('guest.home.index');
});
*/
// $route_admin = 'admin';
$route_admin = route_admin()==null?'admin':route_admin();//admin / setting()->route_admin
Route::group(['namespace'=>'Admin'],function(){
    $route_login = route_login()==null?'admin-login':route_login();//admin-login / setting()->route_login
    Route::get('/logout',[LoginController::class,'logout'])->name('admin.login.logout');
    Route::get($route_login, [LoginController::class,'login'])->name('admin.login.index');
    Route::post('/login', [LoginController::class,'index'])->name('admin.login.login');
    Route::get('/send-password',[LoginController::class,'handleSendPassword'])->name('admin.login.send_password');
    Route::get('/forget-password', [LoginController::class,'forgetPassword'])->name('admin.login.forget_password');
    Route::post('/change-password', [LoginController::class,'changePassword'])->name('admin.login.change_password');
    Route::get('/404', [LoginController::class,'index404'])->name('admin.error.404');
}); 
Route::group(['prefix' => $route_admin,'namespace'=>'Admin'],function(){
    Route::group(['middleware'=>['checkPermission']],function(){
        Route::get('/', [DashboardController::class,'index'])->name('admin.index.dashboard');
        Route::group(['prefix' => 'pages'],function(){
            Route::get('/',[PageController::class,'index'])->name('admin.page.index');
            Route::get('/fetchData',[PageController::class,'fetchData'])->name('admin.page.datatables');
            Route::get('/fetchUpdate',[PageController::class,'fetchUpdate'])->name('admin.page.fetch_update');
            Route::post('/insert',[PageController::class,'insert'])->name('admin.page.insert');
            Route::post('/update',[PageController::class,'update'])->name('admin.page.update');
            Route::get('/delete',[PageController::class,'delete'])->name('admin.page.delete');
        });
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
        Route::group(['prefix' => 'home-category'],function(){
            Route::get('/',[HomeCategoryController::class,'index'])->name('admin.homeCategory.index');
            Route::get('/icon', [HomeCategoryController::class,'indexIcon'])->name('admin.homeCategory.indexIcon');
            Route::get('/datatable',[HomeCategoryController::class,'getDatatable'])->name('admin.homeCategory.datatable');
            Route::post('/insert',[HomeCategoryController::class,'postInsert'])->name('admin.homeCategory.insert');
            Route::get('/update-data-home-category',[HomeCategoryController::class,'updateData'])->name('admin.homeCategory.getUpdate');
            Route::post('/update-home-category',[HomeCategoryController::class,'update'])->name('admin.homeCategory.update');
            Route::get('/delete',[HomeCategoryController::class,'delete'])->name('admin.homeCategory.delete');
        });
        Route::group(['prefix' => 'home-question'],function(){
            Route::get('/',[HomeQuestionController::class,'index'])->name('admin.homeQuestion.index');
            Route::get('/datatable',[HomeQuestionController::class,'getDatatable'])->name('admin.homeQuestion.datatable');
            Route::post('/insert',[HomeQuestionController::class,'postInsert'])->name('admin.homeQuestion.insert');
            Route::get('/update-data-home-question',[HomeQuestionController::class,'updateData'])->name('admin.homeQuestion.getUpdate');
            Route::post('/update-home-question',[HomeQuestionController::class,'update'])->name('admin.homeQuestion.update');
            Route::get('/delete',[HomeQuestionController::class,'delete'])->name('admin.homeQuestion.delete');
        });
        Route::group(['prefix' => 'department'],function(){
            Route::get('/',[DepartmentController::class,'index'])->name('admin.department.index');
            Route::get('/datatable',[DepartmentController::class,'getDatatable'])->name('admin.department.datatable');
            Route::post('/insert-department',[DepartmentController::class,'postInsert'])->name('admin.department.insert');
            Route::get('/update-data-department',[DepartmentController::class,'updateData'])->name('admin.department.getUpdate');
            Route::post('/update-department',[DepartmentController::class,'update'])->name('admin.department.update');
            Route::get('/delete',[DepartmentController::class,'delete'])->name('admin.department.delete');
        });
        Route::group(['prefix' => 'setting'], function () {
            Route::get('/',[SettingController::class,'index'])->name('admin.setting.index');
            Route::post('/update-home',[SettingController::class,'updateHome'])->name('admin.setting.update_home');
            Route::post('/update-home-info',[SettingController::class,'updateHomeInfo'])->name('admin.setting.update_homeInfo');
            Route::post('/update-website',[SettingController::class,'updateWebsite'])->name('admin.setting.update_website');
            Route::post('/update-mail',[SettingController::class,'updateMail'])->name('admin.setting.update_mail');
            Route::post('/update-google',[SettingController::class,'updateGoogle'])->name('admin.setting.update_google');
        });
    });
    
    
});