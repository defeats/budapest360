<?php

use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Place;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
;

Route::post('/register', [UserController::class, 'register'])->middleware('throttle:2,1440');
Route::post('/login', [UserController::class, 'login'])->middleware('throttle:5,1');

/* API routes for places */

Route::get('/places', [PlaceController::class, 'index']);
Route::post('/places', [PlaceController::class, 'store']);
Route::put('/places/{place}', [PlaceController::class, 'update']);
Route::delete('/places/{place}', [PlaceController::class, 'destroy']);

