<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/all', [BookingController::class, 'all']);
Route::post('/user/{id}/all', [UserController::class, 'booking']);

Route::middleware('retrieved')
    ->group(function() {
        Route::get('/{id}', [BookingController::class, 'view']);
        Route::get('/delete/{id}', [BookingController::class, 'delete']);
        Route::post('/update/{id}', [BookingController::class, 'update']);
});

Route::post('/create', [BookingController::class, 'create']);
