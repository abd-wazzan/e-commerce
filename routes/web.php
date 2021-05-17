<?php

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

Route::get('/', function () {
    return view('product/index');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/user', function (Illuminate\Http\Request $request) {
    return ResponseHelper::select($request->user());
});
/** this is for project */
