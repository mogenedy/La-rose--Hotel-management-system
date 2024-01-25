<?php

use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomTypeController;

//user routes
Route::get('/', [UserController::class, 'index']);


Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'userStore'])->name('profile.store');
    Route::post('/password/change/store', [UserController::class, 'PasswordChangeStore'])->name('password.change.store');

});

Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
Route::get('/user/changepassword', [UserController::class, 'userChangePassword'])->name('user.change.password');

require __DIR__.'/auth.php';

//admin(team) routes
Route::middleware(['auth','roles:admin'])->group(function(){
Route::get('all/team',[TeamController::class,'AllTeam'])->name('all.team');
Route::get('add/team',[TeamController::class,'AddTeam'])->name('add.team');
Route::post('team/store',[TeamController::class,'TeamStore'])->name('team.store');
Route::get('team/edit/{id}',[TeamController::class,'TeamEdit'])->name('team.edit');
Route::post('team/update/{id}',[TeamController::class,'TeamUpdate'])->name('team.update');
Route::get('team/update/{id}',[TeamController::class,'TeamDelete'])->name('team.delete');
});
//admin(book-area) routes
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('book/area',[TeamController::class,'BookArea'])->name('book.area');
    Route::post('book/area/update',[TeamController::class,'BookAreaUpdate'])->name('book.area.update');

    });

//admin(room type) routes
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('room/type/list',[RoomTypeController::class,'RoomTypeList'])->name('room.type.list');
    Route::get('add/room/type',[RoomTypeController::class,'AddRoomType'])->name('add.room.type');
    Route::post('room/type/store',[RoomTypeController::class,'StoreRoomType'])->name('room.type.store');
    });

    //admin(room) routes
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('room/edit/{id}',[RoomController::class,'RoomEdit'])->name('edit.room');
    Route::post('/update/room/{id}',[RoomController::class,'UpdateRoom'])->name('update.room');
    Route::get('/multi/image/delete/{id}', [RoomController::class,'MultiImageDelete'])->name('multi.image.delete');
    Route::post('/store/room/no/{id}', [RoomController::class,'StoreRoomNumber'])->name('store.room.no');
    Route::post('/store/room2/no/{id}', [RoomController::class,'StoreRoomNumber'])->name('store.room.no');


    });


    //admin(auth) routes

Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard')
->middleware('auth')
->middleware('roles:admin');

Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')
->middleware('auth')->middleware('roles:admin');

Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile')
->middleware('auth')->middleware('roles:admin');

Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store')
->middleware('auth')->middleware('roles:admin');

Route::post('/admin/password/update',[AdminController::class,'AdminPasswordUpdate'])->name('admin.password.update')
->middleware('auth')->middleware('roles:admin');

Route::get('/admin/change/password',[AdminController::class,'AdminPasswordChange'])->name('admin.change.password')
->middleware('auth')->middleware('roles:admin');

Route::get('/admin/login',[AdminController::class,'adminLogin'])->name('admin.login');