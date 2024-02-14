<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;



//Index
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//Login & Logout
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Category
Route::get('category', [CategoryController::class, 'viewCategory'])->name('category')->middleware('auth');
Route::get('/viewCategoryInput', [CategoryController::class, 'viewCategoryInput']);
Route::post('/saveCategory', [CategoryController::class, 'saveCategory']);
Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);
Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory']);
Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('updateCategory');

//Products
Route::get('products', [ProductsController::class, 'viewProducts'])->name('products')->middleware('auth');
Route::get('/viewProductsInput', [ProductsController::class, 'viewProductsInput']);
Route::post('/saveProducts', [ProductsController::class, 'saveProducts']);
Route::get('/deleteProducts/{id}', [ProductsController::class, 'deleteProducts']);
Route::get('/editProducts/{id}', [ProductsController::class, 'editProducts']);
Route::post('/updateProducts', [ProductsController::class, 'updateProducts'])->name('updateProducts');




