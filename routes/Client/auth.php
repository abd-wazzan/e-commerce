<?php

use App\Http\Controllers\Client\AuthController;
use Illuminate\Support\Facades\Route;


Route::view('login', 'client.auth.login');
Route::post('login', [AuthController::class,'signIn'])->name('login');

Route::view('signup', 'client.auth.signup');
Route::post('signup', [AuthController::class,'signUp'])->name('signup');

Route::middleware(['auth:web'])->group(function () {
    Route::get('logout', [AuthController::class,'logout']);
});
