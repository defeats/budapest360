<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/* FAVORITES */

Route::resource('/favourites', FavouriteController::class);

Route::post('/favourites', [FavouriteController::class, 'store'])->name('favourites.store')->middleware('auth');

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
