<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('places', PlaceController::class);
Route::resource('categories', CategoryController::class);
Route::resource('multimedia', MultimediaController::class);
Route::resource('reviews', ReviewController::class);
