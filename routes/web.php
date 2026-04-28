<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

Route::post('/locale-change', function (Request $request) {
    $locale = $request->input('locale');
    if (in_array($locale, ['en', 'hu'])) {
        Session::put('locale', $locale);
    }
    return back();
})->name('locale.change');

Route::get('/', function () {
    $popularPlaces = Place::where('status', 'approved')
        ->orderByDesc('clicks')
        ->take(6)
        ->get();

    $categories = Category::all();
    $events = Place::where('category_id', '7')->get();

    return view('welcome', ['popularPlaces' => $popularPlaces, 'categories' => $categories, 'events' => $events]);
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
