<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;


# Route::apiResource('users', UserContoller::class);
Route::name('users.')
->group(function(){
    Route::get('/users', [UserContoller::class, 'index'])->name('index');

    Route::get('/users/{user}', [UserContoller::class, 'show'])->name('show')->whereNumber('user');

    Route::post('/users',  [UserContoller::class, 'store'])->name('store');

    Route::patch('/users/{user}',  [UserContoller::class, 'update'])->name('update')->whereNumber('user');

    Route::delete('/users/{user}', [UserContoller::class, 'destroy'])->name('destroy')->whereNumber('user');
});

