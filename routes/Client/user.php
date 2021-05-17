<?php

use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class,'getUserData'])->middleware('auth:api');
