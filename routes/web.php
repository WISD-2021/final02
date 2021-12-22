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
//Route::get('/product/{name}', [\App\Http\Controllers\ProductController::class, 'searchname'])->name('product.searchname');
Route::get('/productname', [\App\Http\Controllers\ProductController::class, 'searchname'])->name('product.searchname');
Route::get('/car', [\App\Http\Controllers\CarController::class, 'index'])->name('car.index');
Route::get('/favor', [\App\Http\Controllers\FavoriteController::class, 'index'])->name('favor.index');
Route::get('/favor/{id}', [\App\Http\Controllers\FavoriteController::class, 'add'])->name('favor.add');
Route::get('/favordelete/{id}', [\App\Http\Controllers\FavoriteController::class, 'delete'])->name('favor.delete');
// 無法正常使用 Route::get('/favordelete/{id}', [\App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favor.delete');
Route::get('/car/{id}', [\App\Http\Controllers\CarController::class, 'add'])->name('car.add');
Route::get('/cardelete/{id}', [\App\Http\Controllers\CarController::class, 'delete'])->name('car.delete');
Route::get('/carcheck/{id}', [\App\Http\Controllers\CarController::class, 'check'])->name('car.check');
Route::get('/orderadd/{id}', [\App\Http\Controllers\OrderController::class, 'add'])->name('order.add');
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
Route::get('/order/{status}', [\App\Http\Controllers\OrderController::class, 'searchstatus'])->name('order.searchstatus');
Route::get('/orderuse/{id}', [\App\Http\Controllers\OrderController::class, 'use'])->name('order.use');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//後台
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard.index');

    /*Route::get('posts', [AdminPostsController::class, 'index'])->name('admin.posts.index');
    Route::get('posts/create', [AdminPostsController::class, 'create'])->name('admin.posts.create');
    Route::get('posts/{id}/edit', [AdminPostsController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('posts/{post}',[AdminPostsController::class,'update'])->name('admin.posts.update');
    Route::post('posts',[AdminPostsController::class,'store'])->name('admin.posts.store');
    Route::delete('posts/{post}',[AdminPostsController::class,'destroy'])->name('admin.posts.destroy');
*/
});

