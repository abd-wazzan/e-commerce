<?php

use App\Http\Controllers\Category\CategoryController;
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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/test', function () {
    return view('layout.app');
});

Route::get('/user', function () {
    return ResponseHelper::select(auth()->user());
});
/** this is for project */

Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('add/{id}', [CategoryController::class,'getCategorySpecs']);
    Route::post('store', [ProductController::class, 'store'])->name('product.store');
});
