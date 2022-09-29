<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/all', [BookingController::class, 'all']);

Route::middleware('retrieved')
    ->group(function() {
        Route::get('/{id}', [BookingController::class, 'view']);
        Route::get('/user/{id}/all', [UserController::class, 'booking']);
        Route::get('/delete/{id}', [BookingController::class, 'delete']);
        Route::post('/update/{id}', [BookingController::class, 'update'])
            ->middleware('identified');
});

Route::post('/create', [BookingController::class, 'create'])
    ->middleware('identified');
