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

//首頁
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
//商品頁面
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
//商品類別分類功能
Route::get('/product/{type}', [\App\Http\Controllers\ProductController::class, 'searchtype'])->name('product.searchtype');
//商品關鍵字查詢
Route::get('/productname', [\App\Http\Controllers\ProductController::class, 'searchname'])->name('product.searchname');
//購物車頁面
Route::get('/car', [\App\Http\Controllers\CarController::class, 'index'])->name('car.index');
//我的最愛頁面
Route::get('/favor', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favor.index');
//新增我的最愛
Route::get('/favor/{id}', [\App\Http\Controllers\FavoriteController::class, 'add'])->name('favor.add');
//刪除我的最愛
Route::get('/favordelete/{id}', [\App\Http\Controllers\FavoriteController::class, 'delete'])->name('favor.delete');
//新增購物車
Route::get('/car/{id}', [\App\Http\Controllers\CarController::class, 'add'])->name('car.add');
//刪除購物車
Route::get('/cardelete/{id}', [\App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');
//按下訂進入確認訂單頁面
Route::get('/carcheck/{id}', [\App\Http\Controllers\CarController::class, 'check'])->name('car.check');
//購物車變成訂單，原購物車刪除
Route::get('/orderadd/{id}', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
//訂單頁面
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
//訂單使用狀況分類
Route::get('/order/{status}', [\App\Http\Controllers\OrderController::class, 'searchstatus'])->name('order.searchstatus');
//使用票劵
Route::get('/orderuse/{id}', [\App\Http\Controllers\OrderController::class, 'use'])->name('order.use');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//後台
Route::prefix('admin')->group(function () {
     Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard.index');

     Route::get('products', [\App\Http\Controllers\AdminProductController::class, 'index'])->name('admin.products.index');
     //新增票券
     Route::get('products/create', [\App\Http\Controllers\AdminProductController::class, 'create'])->name('admin.products.create');
     Route::get('products/{id}/edit', [\App\Http\Controllers\AdminProductController::class, 'edit'])->name('admin.products.edit');
     //儲存票券
     Route::post('products',[\App\Http\Controllers\AdminProductController::class,'store'])->name('admin.products.store');
     Route::patch('products/{id}',[\App\Http\Controllers\AdminProductController::class,'update'])->name('admin.products.update');
     Route::get('products/{id}',[\App\Http\Controllers\AdminProductController::class,'delete'])->name('admin.products.delete');


     /*Route::get('posts/{id}/edit', [AdminPostsController::class, 'edit'])->name('admin.posts.edit');
     Route::post('posts',[AdminPostsController::class,'store'])->name('admin.posts.store');
 */
});

