<?php

use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

//admin routes
Route::middleware(['auth','roles:admin'])->group(function(){
Route::get('all/team',[TeamController::class,'AllTeam'])->name('all.team');
Route::get('add/team',[TeamController::class,'AddTeam'])->name('add.team');
Route::post('team/store',[TeamController::class,'TeamStore'])->name('team.store');
Route::get('team/edit/{id}',[TeamController::class,'TeamEdit'])->name('team.edit');
Route::post('team/update/{id}',[TeamController::class,'TeamUpdate'])->name('team.update');
Route::get('team/update/{id}',[TeamController::class,'TeamDelete'])->name('team.delete');
});


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
