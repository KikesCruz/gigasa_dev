<?php
use Lib\Route;

// controller Admin
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProfileController;
use App\Controllers\Admin\UsersController;
use App\Controllers\Admin\BannersController;

use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\CategoriesController;
use App\Controllers\Admin\BrandsController;
use App\Controllers\Admin\CatalogoController;

/**ADD SUBCAT */
use App\Controllers\Admin\SubCategoriesController;





/** Routes admin */ 
Route::get('/admin',[LoginController::class,'login']);
//Route::post('/admin/auth',[LoginController::class,'auth']);
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

/** Categories */
Route::get('/admin/categories',[CategoryController::class,'view']);
Route::post('/admin/categories/add', [CategoryController::class, 'add']);
Route::post('/admin/categories/status', [CategoryController::class, 'status_update']);
Route::post('/admin/categories/update', [CategoryController::class, 'update']);
Route::post('/admin/categories/web_update_status', [CategoryController::class, 'web_status']);
Route::get('/admin/categories/update_img', [CategoryController::class, 'update_img']);
Route::post('/admin/categories/update_img', [CategoryController::class, 'update_img']);


/** sub Categorías */
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


/** Products */
Route::get('admin/catalogo',[CatalogoController::class,'view']);
Route::post('admin/catalogo/add',[CatalogoController::class,'add']);


/*** type products ***/
Route::get('/admin/subcategorias',[SubCategoriesController::class,'view']);
Route::post('/admin/subcategorias/add',[SubCategoriesController::class,'add']);
Route::post('/admin/subcategorias/disable',[SubCategoriesController::class,'disable']);
Route::post('/admin/subcategorias/enable',[SubCategoriesController::class,'enable']);
Route::get('/admin/subcategorias/update',[SubCategoriesController::class,'update']);
Route::post('/admin/subcategorias/update',[SubCategoriesController::class,'update']);




