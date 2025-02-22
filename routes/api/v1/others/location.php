<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::middleware([
//    'auth:api',
])
    ->name('locations.')
    ->group(function () {
        Route::get('/locations', [LocationController::class, 'index'])
            ->name('index');

        Route::get('/locations/{location}', [LocationController::class, 'show'])
            ->name('show')
            ->whereNumber('location');

        Route::post('/locations', [LocationController::class, 'store'])->name('store');

        Route::patch('/locations/{location}', [LocationController::class, 'update'])->name('update');

        Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('destroy');

    });