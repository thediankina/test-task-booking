<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('identified')->group(function() {
    Route::post('/create', [BookingController::class, 'create']);
    Route::get('/all', [BookingController::class, 'all']);
    Route::delete('/delete/{id}', [BookingController::class, 'delete']);
    Route::put('/update/{id}', [BookingController::class, 'update']);
    Route::get('/{id}', [BookingController::class, 'view']);
    Route::get('/user/{id}/all', [UserController::class, 'all']);
});
