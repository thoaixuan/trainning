<?php
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SigninController;

Route::get('/admin-info', [DashboardController::class,'index'])->name('admin.index.dashboard')->middleware('checkLogin');
Route::get('/admin-login', [SigninController::class,'index'])->name('admin.index.login');
Route::post('/admin-login', [SigninController::class,'login'])->name('admin.post.login');
Route::get('/admin-logout',[SigninController::class, 'logout'])->name('admin.logout.login');

Route::prefix('admin')->middleware('checkLogin')->group(function () {
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class,'index'])->name('admin.index.user');
        Route::get('/anydata', [UserController::class,'anyData'])->name('admin.datatables.user');
        Route::post('/insert-user',[UserController::class,'add'])->name('admin.insert.user');
        Route::get('/edit-user',[UserController::class,'getUpdate'])->name('admin.update.user');
        Route::post('/edit-user',[UserController::class,'postUpdate'])->name('admin.update_data.user');
        Route::get('/delete-user',[UserController::class,'delete'])->name('admin.delete.user');
        Route::get('/get-room',[UserController::class,'getRoom'])->name('admin.get_room.user');
    });

    Route::prefix('room')->group(function(){
        Route::get('/', [RoomController::class,'index'])->name('admin.index.room');
        Route::get('/getdata', [RoomController::class,'getDate'])->name('admin.get_data.room');
        Route::get('/anydata', [RoomController::class,'anyData'])->name('admin.datatables.room');
        Route::post('/insert-room',[RoomController::class,'add'])->name('admin.insert.room');
        Route::get('/edit-room',[RoomController::class,'getUpdate'])->name('admin.update.room');
        Route::put('/edit-room',[RoomController::class,'postUpdate'])->name('admin.update_data.room');
        Route::get('/delete-room',[RoomController::class,'delete'])->name('admin.delete.room');
        Route::get('/permision-room',[RoomController::class,'getPermision'])->name('admin.get_permision.room');
    });

});
