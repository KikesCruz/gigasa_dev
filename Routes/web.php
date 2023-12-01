<?php
use Lib\Route;

use App\Controllers\HomeController;

Route::get('/home',[HomeController::class,'index']);

Route::dispatch();