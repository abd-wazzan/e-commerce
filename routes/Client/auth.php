<?php

use App\Http\Controllers\Client\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('signUp', [AuthController::class,'signUp']);
Route::post('signIn', [AuthController::class,'signIn']);


Route::middleware(['auth:api'])->group(function () {
    Route::get('logout', [AuthController::class,'logout']);
});
