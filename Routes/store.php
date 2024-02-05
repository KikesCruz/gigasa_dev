<?php
use Lib\Route;


use App\Controllers\Store\StoreController;
use App\Controllers\Store\CartController;
use App\Controllers\Store\CustomerController;
use App\Controllers\Store\ProfileCustomerController;



Route::get('/', [StoreController::class, 'home']);
Route::get('/categories', [StoreController::class, 'categories']);

Route::get('/cart', [CartController::class, 'view']);

Route::get('/account', [CustomerController::class, 'view']);

Route::get('/profile', [ProfileCustomerController::class, 'view']);


