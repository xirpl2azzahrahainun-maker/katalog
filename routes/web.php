<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

// 1. Beranda / Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// 2. Halaman Admin (Kelola Produk dalam bentuk Tabel)
Route::get('/admin/products', [productController::class, 'adminIndex'])->name('products.admin');

// 3. Resource Route CRUD Produk
Route::resource('products', productController::class);
