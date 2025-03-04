<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');//商品一覧を表示
Route::get('/products/register', [ProductController::class, 'register'])->name('products.register');//商品登録を表示
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');//商品詳細の表示
Route::post('/products', [ProductController::class, 'store'])->name('products.store');//新しい商品をデータベースに保存
Route::put('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');//商品更新
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');//商品の検索結果を表示
Route::delete('/products/{productId}/delete', [ProductController::class, 'destroy'])->name('products.destroy');//商品の削除

