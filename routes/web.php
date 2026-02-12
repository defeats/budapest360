<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
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
})->name('welcome');

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

/* PROFILE */

Route::get('/profile', function () {
    return view('users.profile');
})->middleware('auth')->name('profile');

/* FAVORITES */

Route::resource('/favourites', FavouriteController::class);

/* LOGOUT */

Route::post('logout', function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');

/* CATEGORIES */

Route::resource('places', PlaceController::class);

Route::get('/places/{slug}', [PlaceController::class, 'show']);

Route::resource('categories', CategoryController::class);

Route::get('/categories/{slug}', [CategoryController::class, 'show'])/*->name('categories.show')*/;

Route::resource('multimedia', MultimediaController::class);

Route::resource('reviews', ReviewController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
