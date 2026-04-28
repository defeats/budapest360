<?php

use App\Http\Controllers\Api\PlaceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Place;

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('/register', [UserController::class, 'register'])->middleware('throttle:2,1440')->withoutMiddleware('auth:sanctum');
        Route::post('/login', [UserController::class, 'login'])->middleware('throttle:5,1')->withoutMiddleware('auth:sanctum');
        Route::get('/checkTokenExpiryDate', [UserController::class, 'checkTokenExpiryDate']);
        Route::get('/user', 'user');
        Route::get('/users', 'index');
        Route::post('/logout', 'logout');
    });

    Route::controller(PlaceController::class)->group(function () {
        Route::get('/places', 'index')->withoutMiddleware('auth:sanctum');
        Route::post('/places', 'store');
        Route::put('/places/{place}', 'update');
        Route::delete('/places/{place}', 'destroy');
    });
});