<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// Halaman Dashboard
// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index']); // optional, biar '/' juga ke dashboard



// Halaman Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
// tambah produk
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
// hapus produk
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// tampilkan form edit (opsional, kita pakai modal di halaman yang sama)
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');

// update produk
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
// tampilkan detail produk
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');


// Halaman Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');

// Halaman User
Route::get('/user', [UserController::class, 'index'])->name('user');