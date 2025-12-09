<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/featured', function() {
    return view('featured.index');
})->name('featured');

Route::get('/restaurants', function() {
    return view('restaurants.index');
})->name('restaurants');

Route::get('/sights', function() {
    return view('sights.index');
})->name('sights');

Route::get('/accomodations', function() {
    return view('accomodations.index');
})->name('accomodations');

Route::get('/malls', function() {
    return view('malls.index');
})->name('malls');

Route::get('/culture', function() {
    return view('culture.index');
})->name('culture');

Route::get('/other', function() {
    return view('other.index');
})->name('other');

Route::resource('places', PlaceController::class);
Route::resource('categories', CategoryController::class);
Route::resource('multimedia', MultimediaController::class);
Route::resource('reviews', ReviewController::class);
