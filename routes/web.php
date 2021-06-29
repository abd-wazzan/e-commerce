<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\FavoriteController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/test', function () {
    return view('layout.app');
});


Route::get('/user', function () {
    return ResponseHelper::select(auth()->user());
});
/** this is for project */

Route::middleware('auth')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('add/{id}', [CategoryController::class, 'getCategorySpecs'])->name('product.add');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/cat', [CategoryController::class, 'getCategories'])->name('chose-cat');
        Route::get('show/{id}', [ProductController::class, 'showProduct'])->name('product.show');
        Route::get('store/{id}', [ProductController::class, 'viewStore'])->name('store.show');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        });

    Route::prefix('favorite')->group(function () {
        Route::get('toggle/{product_id}', [FavoriteController::class, 'toggle'])->name('favorite.toggle');
    });

    Route::prefix('cart')->group(function () {
        Route::get('toggle/{product_id}', [CartController::class, 'toggle'])->name('cart.toggle');
    });
});

