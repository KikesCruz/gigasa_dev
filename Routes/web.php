<?php
use Lib\Route;

// controller Admin
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProfileController;
use App\Controllers\Admin\UsersController;
use App\Controllers\Admin\BannersController;
use App\Controllers\Admin\DepartmentsController;
use App\Controllers\Admin\CategoriesController;
use App\Controllers\Admin\BrandsController;
use App\Controllers\Admin\CatalogoController;

// controllers e-commerce
use App\Controllers\Store\StoreController;
use App\Controllers\Store\CartController;
use App\Controllers\Store\CustomerController;
use App\Controllers\Store\ProfileCustomerController;



/** Routes admin */ 
Route::get('/admin',[LoginController::class,'login']);
Route::post('/admin/auth',[LoginController::class,'auth']);
Route::get('/admin/home', [HomeController::class, 'home']);


/*** Routes users */
Route::get('/admin/users', [UsersController::class, 'users']);
Route::post('/admin/users/add', [UsersController::class, 'users_add']);
Route::post('/admin/users/update', [UsersController::class, 'users_update']);
Route::post('/admin/users/down', [UsersController::class, 'users_down']);
Route::post('/admin/users/active', [UsersController::class, 'users_active']);

/** Routes Banners */
Route::get('/admin/banners', [BannersController::class, 'banners_page']);
Route::post('/admin/banners/upload', [BannersController::class, 'banners_upload']);

/** Departamentos */
Route::get('/admin/departamentos',[DepartmentsController::class,'view']);
Route::post('/admin/departamentos/add', [DepartmentsController::class, 'add']);
Route::post('/admin/departamentos/enable', [DepartmentsController::class, 'enable']);
Route::post('/admin/departamentos/disable', [DepartmentsController::class, 'disable']);
Route::post('/admin/departamentos/update', [DepartmentsController::class, 'update']);


/** Categorías */
Route::get('/admin/categorias',[CategoriesController::class,'view']);
Route::post('/admin/categorias/add',[CategoriesController::class,'add']);
Route::post('/admin/categorias/disable',[CategoriesController::class,'disable']);
Route::post('/admin/categorias/enable',[CategoriesController::class,'enable']);
Route::get('/admin/categorias/update',[CategoriesController::class,'update']);
Route::post('/admin/categorias/update',[CategoriesController::class,'update']);

/** Brands */
Route::get('admin/brands',[BrandsController::class,'view']);
Route::post('admin/brands/add',[BrandsController::class,'add']);
Route::post('admin/brands/disable',[BrandsController::class,'disable']);
Route::post('admin/brands/enable',[BrandsController::class,'enable']);
Route::post('admin/brands/update',[BrandsController::class,'update']);


/** Catalog */
Route::get('admin/catalogo',[CatalogoController::class,'view']);

/** Store Routes */

Route::get('/', [StoreController::class, 'home']);

Route::get('/cart', [CartController::class, 'view']);

Route::get('/account', [CustomerController::class, 'view']);

Route::get('/profile', [ProfileCustomerController::class, 'view']);


Route::dispatch();