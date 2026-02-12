<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Place;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/api/places', function (Request $request) {
    $places = Place::all();
    return response()->json($places);
})->middleware('auth:sanctum');

