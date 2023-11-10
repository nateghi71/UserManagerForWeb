<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginAndLogoutController;
use App\Http\Controllers\passwordResetController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginAndLogoutController::class , 'index'])->name('login');
Route::post('/login', [LoginAndLogoutController::class , 'logIn'])->name('login.handle');
Route::post('/logout', [LoginAndLogoutController::class , 'logOut'])->name('logout');
Route::get('/register', [RegisterController::class , 'index'])->name('register');
Route::post('/register', [RegisterController::class , 'register'])->name('register.handle');

Route::get('/email-verify', [RegisterController::class , 'verifyNotice'])->middleware('auth')->name('verification.notice');
Route::get('/email-verify/{id}/{hash}', [RegisterController::class , 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email-verification-notification', [RegisterController::class , 'resendVerifyLink'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', [passwordResetController::class , 'forgetPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [passwordResetController::class , 'forgetPasswordHandle'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [passwordResetController::class , 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [passwordResetController::class , 'resetPasswordHandle'])->middleware('guest')->name('password.update');

Route::name('home.')->middleware(['auth', 'verified'])->group(function (){
    Route::get('/', [HomeController::class , 'index'])->name('index');
    Route::get('/post/{post}', [HomeController::class , 'show'])->name('show');
});

Route::prefix('/admin')->name('admin.')->middleware(['auth', 'verified'])->group(function (){
    Route::resource('users' , UserController::class);
    Route::resource('roles' , RoleController::class);
    Route::resource('permissions' , PermissionController::class);
    Route::resource('posts' , PostController::class);
});
