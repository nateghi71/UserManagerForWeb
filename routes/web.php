<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginAndLogoutController;
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

Route::name('home.')->group(function (){
    Route::get('/', [HomeController::class , 'index'])->name('index');
    Route::get('/article', [HomeController::class , 'show'])->name('show');
    Route::get('/logIn', [LoginAndLogoutController::class , 'index'])->name('logInOut.index');
    Route::get('/logIn/logIn', [LoginAndLogoutController::class , 'logIn'])->name('logInOut.logIn');
    Route::get('/logOut', [LoginAndLogoutController::class , 'logOut'])->name('logInOut.logOut');
    Route::get('/register', [RegisterController::class , 'index'])->name('logInOut.index');
    Route::get('/register/register', [RegisterController::class , 'register'])->name('logInOut.register');
});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('users' , UserController::class);
    Route::resource('roles' , RoleController::class);
    Route::resource('permissions' , PermissionController::class);
    Route::resource('posts' , PostController::class);
});
