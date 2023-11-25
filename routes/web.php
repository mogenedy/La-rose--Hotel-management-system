<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//user routes
Route::get('/', [UserController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin routes

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