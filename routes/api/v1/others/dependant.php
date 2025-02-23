<?php

use App\Http\Controllers\DependantController;
use Illuminate\Support\Facades\Route;


# Route::apiResource('users', UserContoller::class);
Route::name('dependants.')
->group(function(){
    Route::get('/dependats', [DependantController::class, 'index'])->name('index');

    Route::get('/dependats/{dependant}', [DependantController::class, 'show'])->name('show')->whereNumber('dependant');

    Route::post('/dependats',  [DependantController::class, 'store'])->name('store');

    Route::patch('/dependats/{dependant}',  [DependantController::class, 'update'])->name('update')->whereNumber('dependant');

    Route::delete('/dependats/{dependant}', [DependantController::class, 'destroy'])->name('destroy')->whereNumber('dependant');
});
