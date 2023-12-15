<?php
use Lib\Route;

use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProfileController;
use App\Controllers\Admin\UsersController;
use App\Controllers\Admin\BannersController;

// controllers ecommers
use App\Controllers\Ecommer\EcommerController;


// Routes by admin

Route::get('/admin',[LoginController::class,'login']);
Route::post('/admin/auth',[LoginController::class,'auth']);
Route::get('/admin/home', [HomeController::class, 'home']);
Route::get('/admin/profile', [ProfileController::class, 'viewProfile']);
/*** Routes users */
Route::get('/admin/users', [UsersController::class, 'users']);
Route::post('/admin/users/add', [UsersController::class, 'users_add']);
Route::post('/admin/users/update', [UsersController::class, 'users_update']);
Route::post('/admin/users/down', [UsersController::class, 'users_down']);
Route::post('/admin/users/active', [UsersController::class, 'users_active']);
/** Routes Banners */
Route::get('/admin/banners', [BannersController::class, 'banners_page']);



Route::get('/', [EcommerController::class, 'index']);

Route::dispatch();