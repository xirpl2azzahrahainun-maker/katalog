<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

// Halaman Utama / Redirect langsung ke katalog produk
Route::get('/', [productController::class, 'index']);

// Resource Route untuk CRUD Produk
Route::resource('products', productController::class);
