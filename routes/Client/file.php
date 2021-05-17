<?php

use App\Http\Controllers\Client\FileController;
use Illuminate\Support\Facades\Route;

Route::post('uploadImage', [FileController::class,'uploadImage']);
