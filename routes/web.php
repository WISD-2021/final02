<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product/{type}', [\App\Http\Controllers\ProductController::class, 'searchtype'])->name('product.searchtype');
Route::get('/product/{name}', [\App\Http\Controllers\ProductController::class, 'searchname'])->name('product.searchname');
Route::get('/car', [\App\Http\Controllers\CarController::class, 'index'])->name('car.index');
Route::get('/favor', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favor.index');
Route::get('/favor/{id}', [\App\Http\Controllers\FavoriteController::class, 'add'])->name('favor.add');
Route::get('/favordelete/{id}', [\App\Http\Controllers\FavoriteController::class, 'delete'])->name('favor.delete');
// 無法正常使用 Route::get('/favordelete/{id}', [\App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favor.delete');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
