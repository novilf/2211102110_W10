<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\SnackController;

Route::resource('/', SnackController::class);
Route::resource('snack', SnackController::class);
