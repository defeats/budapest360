<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('users.register');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::resource('places', PlaceController::class);

Route::resource('categories', CategoryController::class);

Route::resource('multimedia', MultimediaController::class);

Route::resource('reviews', ReviewController::class);

Route::resource('users', UserController::class);
