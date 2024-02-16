<?php

use Illuminate\Support\Facades\Route;

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/', \App\Http\Controllers\HomeController::class);
