<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')->name('dashboard')->middleware('auth');

/* REGISTER */

Route::get('register', function () {
    return view('users.register');
})->name("register");

Route::post('register', RegisterController::class)->name('register.store');

/* LOGIN */

Route::get('login', function () {
    return view('users.login');
})->name("login");

Route::post("login", LoginController::class)->name('login.attempt')->middleware('throttle:5,1');

/* LOGOUT */

Route::post('logout', function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');

/* RESOURCES */

Route::resource('places', PlaceController::class);

Route::resource('categories', CategoryController::class);

Route::resource('multimedia', MultimediaController::class);

Route::resource('reviews', ReviewController::class);
