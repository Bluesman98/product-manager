<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('admin');

Route::get('products/{product:slug}', [HomeController::class, 'show'])->middleware('admin');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Product
Route::post('admin/products', [ProductController::class, 'store'])->middleware('admin');
Route::get('admin/products/create', [ProductController::class, 'create'])->middleware('admin');
Route::get('admin/products', [ProductController::class, 'index'])->middleware('admin');
Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->middleware('admin');
Route::patch('admin/products/{product}', [ProductController::class, 'update'])->middleware('admin');
Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->middleware('admin');

// Category
Route::post('admin/categories', [CategoryController::class, 'store'])->middleware('admin');
Route::get('admin/categories/create', [CategoryController::class, 'create'])->middleware('admin');
Route::get('admin/categories', [CategoryController::class, 'index'])->middleware('admin');
Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->middleware('admin');
Route::patch('admin/categories/{category}', [CategoryController::class, 'update'])->middleware('admin');
Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->middleware('admin');
