<?php
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SigninController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;




Route::get('/admin-login', [SigninController::class,'index'])->name('admin.index.login');
Route::post('/admin-login', [SigninController::class,'login'])->name('admin.post.login');
Route::get('/admin-logout',[SigninController::class, 'logout'])->name('admin.logout.login');
Route::get('/admin-info', [DashboardController::class,'index'])->middleware('checkLogin')->name('admin.index.dashboard');
Route::prefix('admin')->middleware('checkLogin')->group(function () {
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class,'index'])->name('admin.index.user')->middleware('checkPermission:user-list');
        Route::get('/insert-user',[UserController::class,'getDetail'])->name('admin.get_insert.user')->middleware('checkPermission:user-add');
        Route::get('/edit-user',[UserController::class,'getUpdate'])->name('admin.update.user')->middleware('checkPermission:user-edit');
        Route::get('/delete-user',[UserController::class,'delete'])->name('admin.delete.user')->middleware('checkPermission:user-delete');
        Route::get('/get-detail',[UserController::class,'getDetail'])->name('admin.get_detail.user')->middleware('checkPermission:user-list');

        Route::get('/get-room',[UserController::class,'getRoom'])->name('admin.get_room.user');
        Route::get('/data-role',[UserController::class,'dataRole'])->name('admin.data_role.user');
        Route::get('/check-login',[UserController::class,'checkLogin'])->name('guest.check_login.user');
        Route::get('/anydata', [UserController::class,'anyData'])->name('admin.datatables.user');
        Route::post('/edit-user',[UserController::class,'postUpdate'])->name('admin.update_data.user');
        Route::post('/insert-user',[UserController::class,'add'])->name('admin.insert.user');



    });

    Route::prefix('room')->group(function(){
        Route::get('/', [RoomController::class,'index'])->name('admin.index.room')->middleware('checkPermission:room-list');
        Route::post('/insert-room',[RoomController::class,'add'])->name('admin.insert.room')->middleware('checkPermission:room-add');
        Route::get('/insert-room',[RoomController::class,'getInsert'])->name('admin.get_insert.room')->middleware('checkPermission:room-add');
        Route::get('/edit-room',[RoomController::class,'getUpdate'])->name('admin.update.room')->middleware('checkPermission:room-edit');
        Route::post('/edit-room',[RoomController::class,'postUpdate'])->name('admin.update_data.room')->middleware('checkPermission:room-edit');
        Route::get('/delete-room',[RoomController::class,'delete'])->name('admin.delete.room')->middleware('checkPermission:room-delete');
        Route::get('/permision-room',[RoomController::class,'getPermision'])->name('admin.get_permision.room');
        Route::get('/getdata', [RoomController::class,'getDate'])->name('admin.get_data.room');
        Route::get('/anydata', [RoomController::class,'anyData'])->name('admin.datatables.room');
    });

    Route::prefix('permission')->group(function(){
        Route::get('/', [PermissionController::class,'index'])->name('admin.index.permission')->middleware('checkPermission:role-list');
        Route::post('/insert-permission',[PermissionController::class,'add'])->name('admin.insert.permission')->middleware('checkPermission:role-add');
        Route::get('/edit-permission',[PermissionController::class,'getUpdate'])->name('admin.update.permission')->middleware('checkPermission:role-edit');
        Route::put('/edit-permission',[PermissionController::class,'postUpdate'])->name('admin.update_data.permission')->middleware('checkPermission:role-edit');
        Route::get('/delete-permission',[PermissionController::class,'delete'])->name('admin.delete.permission')->middleware('checkPermission:role-delete');
        Route::get('/permision-permission',[PermissionController::class,'getPermision'])->name('admin.get_permision.permission');
        Route::get('/getdata', [PermissionController::class,'getDate'])->name('admin.get_data.permission');
        Route::get('/anydata', [PermissionController::class,'anyData'])->name('admin.datatables.permission');
    });

    Route::prefix('role')->group(function(){
        Route::get('/', [RoleController::class,'index'])->name('admin.index.role')->middleware('checkPermission:role-list');
        Route::post('/insert-role',[RoleController::class,'add'])->name('admin.insert.role')->middleware('checkPermission:role-add');
        Route::get('/insert-role',[RoleController::class,'getInsert'])->name('admin.get_insert.role')->middleware('checkPermission:role-add');
        Route::get('/edit-role',[RoleController::class,'getUpdate'])->name('admin.update.role')->middleware('checkPermission:role-edit');
        Route::post('/edit-role',[RoleController::class,'postUpdate'])->name('admin.update_data.role')->middleware('checkPermission:role-edit');
        Route::get('/delete-role',[RoleController::class,'delete'])->name('admin.delete.role')->middleware('checkPermission:role-delete');
        Route::get('/data-permission',[RoleController::class,'dataPermission'])->name('admin.permission.role');
        Route::get('/getdata', [RoleController::class,'getDate'])->name('admin.get_data.role');
        Route::get('/anydata', [RoleController::class,'anyData'])->name('admin.datatables.role');
    });



});
