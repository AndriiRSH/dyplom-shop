<?php

use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



////Route::middleware(['auth', 'admin',])->group(function () {
//Route::middleware([])->group(function () {
//    Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
//        Route::group(['namespace' => 'Main'], function () {
//            Route::get('/admin', \App\Http\Controllers\Admin\Main\AdminController::class)->name('main.index');
//        });
//
//    });
//});


Route::get('/{category}/posts', [HomeController::class, 'products'])->name('category.product.index');
Route::get('/posts/{post}', [HomeController::class, 'product'])->name('post.show');

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {

        Route::get('/', \App\Http\Controllers\Admin\Main\AdminController::class)->name('main.index');

        Route::group(['prefix' => 'colors'], function (){
            Route::get('/', [ColorController::class, 'index'])->name('color.index');
            Route::get('/create', [ColorController::class, 'create'])->name('color.create');
            Route::post('/', [ColorController::class, 'store'])->name('color.store');
            Route::get('/{color}/edit', [ColorController::class, 'edit'])->name('color.edit');
            Route::get('/{color}', [ColorController::class, 'show'])->name('color.show');
            Route::patch('/{color}', [ColorController::class, 'update'])->name('color.update');
            Route::delete('/{color}', [ColorController::class, 'delete'])->name('color.delete');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/', [UserController::class, 'store'])->name('user.store');
            Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::patch('/{user}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/', [ProductController::class, 'store'])->name('product.store');
            Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/{product}', [ProductController::class, 'delete'])->name('product.delete');
        });

});

Route::get('/', [HomeController::class, 'index'])->name('home');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');