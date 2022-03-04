<?php
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\DashboardController;

Route::prefix('admin')->group(function () {
    Route::get('/home', [DashboardController::class,'index'])->name('admin.index.dashboard');

    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class,'index'])->name('admin.index.user');
        Route::get('/anydata', [UserController::class,'anyData'])->name('admin.datatables.user');
        Route::post('/insert-user',[UserController::class,'add'])->name('admin.insert.user');
        Route::get('/edit-user',[UserController::class,'getUpdate'])->name('admin.update.user');
        Route::put('/edit-user',[UserController::class,'postUpdate'])->name('admin.update_data.user');
        Route::get('/delete-user',[UserController::class,'delete'])->name('admin.delete.user');
    });

});
