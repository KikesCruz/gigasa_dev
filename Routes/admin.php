<?php
use Lib\Route;

// controller Admin
use App\Controllers\Admin\LoginController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\ProfileController;
use App\Controllers\Admin\UsersController;


use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\SubCategoryController;
use App\Controllers\Admin\ProductTypeController;
use App\Controllers\Admin\BrandsController;
use App\Controllers\Admin\CatalogoController;

/** Routes users */ 
Route::get('/admin',[LoginController::class,'login']);
//Route::post('/admin/auth',[LoginController::class,'auth']);
Route::get('/admin/home', [HomeController::class, 'home']);




/** Categories */
Route::get('/admin/categorias',[CategoryController::class,'view']);
Route::post('/admin/categorias/add', [CategoryController::class, 'add']);
Route::post('/admin/categorias/status', [CategoryController::class, 'status_update']);
Route::post('/admin/categorias/update', [CategoryController::class, 'update']);
Route::post('/admin/categorias/web_update_status', [CategoryController::class, 'web_status']);
Route::get('/admin/categorias/update_img', [CategoryController::class, 'update_img']);
Route::post('/admin/categorias/update_img', [CategoryController::class, 'update_img']);

/** Sub categories */
Route::get('/admin/sub-categorias',[SubCategoryController::class,'view']);
Route::post('/admin/sub-categorias/add',[SubCategoryController::class,'add']);
Route::post('/admin/sub-categorias/status',[SubCategoryController::class,'update_status']);
Route::post('/admin/sub-categorias/edit',[SubCategoryController::class,'edit']);
Route::get('/admin/sub-categorias/edit',[SubCategoryController::class,'edit']);


/** Product Type */
Route::get('/admin/tipo-articulos',[ProductTypeController::class,'view']);
Route::get('/admin/tipo-articulos/categories/search/:slug',[ProductTypeController::class,'get_categories']);
Route::post('/admin/tipo-articulos/add',[ProductTypeController::class,'add']);
Route::post('/admin/tipo-articulos/status',[ProductTypeController::class,'update_status']);


/** Products */
Route::get('admin/catalogo',[CatalogoController::class,'view']);
Route::post('admin/catalogo/add',[CatalogoController::class,'add']);


/** Brands */
Route::get('admin/brands',[BrandsController::class,'view']);
Route::post('admin/brands/add',[BrandsController::class,'add']);
