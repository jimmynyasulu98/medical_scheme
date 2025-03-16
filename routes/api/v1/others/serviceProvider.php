<?php

use App\Http\Controllers\ServiceProviderController;
use Illuminate\Support\Facades\Route;

Route::middleware([
//    'auth:api',
])
    ->name('service-providers.')
    ->group(function () {
        Route::get('/service-providers', [ServiceProviderController::class, 'index'])
            ->name('index');

        Route::get('/service-providers/search', [ServiceProviderController::class, 'search'])
        ->name('search');

        Route::get('/service-providers/{service_provider}', [ServiceProviderController::class, 'show'])
            ->name('show')
            ->whereNumber('service_provider');

        Route::post('/service-providers', [ServiceProviderController::class, 'store'])->name('store');

        Route::patch('/service-providers/{service_provider}', [ServiceProviderController::class, 'update'])->name('update');

        Route::delete('/service-providers/{service_provider}', [ServiceProviderController::class, 'destroy'])->name('destroy');

    });