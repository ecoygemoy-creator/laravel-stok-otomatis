
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;

// Halaman utama
Route::get('/', [StockController::class, 'index']);

// Produk
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);

// Stok
Route::get('/stocks', [StockController::class, 'index']);
Route::get('/stocks/create', [StockController::class, 'create']);
Route::post('/stocks', [StockController::class, 'store']);
Route::get('/stocks/{id}/edit', [StockController::class, 'edit']);
Route::put('/stocks/{id}', [StockController::class, 'update']);
Route::delete('/stocks/{id}', [StockController::class, 'destroy']);

// Transaksi
Route::resource('transactions', TransactionController::class);
