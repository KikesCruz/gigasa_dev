<?php
use Lib\Route;

use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProfileController;

// controllers ecommers
use App\Controllers\Ecommer\EcommerController;


// Routes by admin
Route::get('/admin',[LoginController::class,'login']);
Route::post('/admin/auth',[LoginController::class,'auth']);
Route::get('/admin/home', [HomeController::class, 'home']);
Route::get('/admin/profile', [ProfileController::class, 'viewProfile']);

Route::get('/', [EcommerController::class, 'index']);

Route::dispatch();