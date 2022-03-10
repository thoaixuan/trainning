<?php
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SigninController;
use App\Http\Controllers\admin\PermissionController;

Route::get('/admin-info', [DashboardController::class,'index'])->name('admin.index.dashboard');
Route::get('/admin-login', [SigninController::class,'index'])->name('admin.index.login');
Route::post('/admin-login', [SigninController::class,'login'])->name('admin.post.login');
Route::get('/admin-logout',[SigninController::class, 'logout'])->name('admin.logout.login');

Route::prefix('admin')->middleware('checkLogin')->middleware('checkGroup')->group(function () {
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class,'index'])->name('admin.index.user');
        Route::get('/anydata', [UserController::class,'anyData'])->name('admin.datatables.user');
        Route::post('/insert-user',[UserController::class,'add'])->name('admin.insert.user');
        Route::get('/edit-user',[UserController::class,'getUpdate'])->name('admin.update.user');
        Route::post('/edit-user',[UserController::class,'postUpdate'])->name('admin.update_data.user');
        Route::get('/delete-user',[UserController::class,'delete'])->name('admin.delete.user');
        Route::get('/get-room',[UserController::class,'getRoom'])->name('admin.get_room.user');
        Route::get('/check-login',[UserController::class,'checkLogin'])->name('guest.check_login.user');

    });

    Route::prefix('room')->middleware('checkGroup')->group(function(){
        Route::get('/', [RoomController::class,'index'])->name('admin.index.room');
        Route::get('/getdata', [RoomController::class,'getDate'])->name('admin.get_data.room');
        Route::get('/anydata', [RoomController::class,'anyData'])->name('admin.datatables.room');
        Route::post('/insert-room',[RoomController::class,'add'])->name('admin.insert.room');
        Route::get('/edit-room',[RoomController::class,'getUpdate'])->name('admin.update.room');
        Route::put('/edit-room',[RoomController::class,'postUpdate'])->name('admin.update_data.room');
        Route::get('/delete-room',[RoomController::class,'delete'])->name('admin.delete.room');
        Route::get('/permision-room',[RoomController::class,'getPermision'])->name('admin.get_permision.room');
    });

    Route::prefix('permission')->group(function(){
        Route::get('/', [PermissionController::class,'index'])->name('admin.index.permission');
        Route::get('/getdata', [PermissionController::class,'getDate'])->name('admin.get_data.permission');
        Route::get('/anydata', [PermissionController::class,'anyData'])->name('admin.datatables.permission');
        Route::post('/insert-permission',[PermissionController::class,'add'])->name('admin.insert.permission');
        Route::get('/edit-permission',[PermissionController::class,'getUpdate'])->name('admin.update.permission');
        Route::put('/edit-permission',[PermissionController::class,'postUpdate'])->name('admin.update_data.permission');
        Route::get('/delete-permission',[PermissionController::class,'delete'])->name('admin.delete.permission');
        Route::get('/permision-permission',[PermissionController::class,'getPermision'])->name('admin.get_permision.permission');
    });


});
