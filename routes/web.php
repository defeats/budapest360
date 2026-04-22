<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

App::setLocale('en'); //test

Route::get('/', function () {
    $popularPlaces = Place::where('status', 'approved')
        ->with('multimedias')
        ->orderByDesc('clicks')
        ->take(5)
        ->get();

    return view('welcome', compact('popularPlaces'));
});

/* AUTH */

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/* LOGOUT */

Route::post('logout', function () {
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');

/* PLACES */

Route::resource('places', PlaceController::class)->except(['show', 'update']);

Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');

Route::put('/places/{place}', [PlaceController::class, 'update'])->name('places.update')->middleware('auth');

/* FAVORITES */

Route::resource('/favourites', FavouriteController::class);

Route::post('/favourites', [FavouriteController::class, 'store'])->name('favourites.store')->middleware('auth');

/* REVIEWS */

Route::resource('reviews', ReviewController::class);

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

/* CATEGORIES */

Route::resource('categories', CategoryController::class);

Route::get('/categories/{slug}', [CategoryController::class, 'show'])/*->name('categories.show')*/;

/* MULTIMEDIA */

Route::resource('multimedia', MultimediaController::class);
