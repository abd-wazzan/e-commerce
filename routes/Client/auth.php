<?php

use App\Http\Controllers\Client\AuthController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;


Route::view('login', 'client.auth.login')->middleware('guest');
Route::post('login', [AuthController::class,'signIn'])->name('login');

Route::view('signup', 'client.auth.signup')->middleware('guest');
Route::post('signup', [AuthController::class,'signUp'])->name('signup');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});
