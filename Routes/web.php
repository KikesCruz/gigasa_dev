<?php
use Lib\Route;

use App\Controllers\Admin\LoginController;
use App\Controllers\Ecommer\EcommerController;


// Routes by admin
Route::get('/admin',[LoginController::class,'login']);
Route::post('/admin/auth',[LoginController::class,'auth']);
Route::get('/', [EcommerController::class, 'index']);

Route::dispatch();