<?php

use App\Http\Controllers\DependantController;
use Illuminate\Support\Facades\Route;


# Route::apiResource('users', UserContoller::class);
Route::name('dependants.')
->group(function(){
    Route::get('/dependants', [DependantController::class, 'index'])->name('index');

    Route::get('/dependants/{dependant}', [DependantController::class, 'show'])->name('show')->whereNumber('dependant');

    Route::post('/dependants',  [DependantController::class, 'store'])->name('store');

    Route::patch('/dependants/{dependant}',  [DependantController::class, 'update'])->name('update')->whereNumber('dependant');

    Route::delete('/dependants/{dependant}', [DependantController::class, 'destroy'])->name('destroy')->whereNumber('dependant');
});
