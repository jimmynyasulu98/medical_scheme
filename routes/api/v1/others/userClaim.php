<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;


# Route::apiResource('users', UserContoller::class);
Route::name('user_claim.')
->group(function(){
    Route::get('/user/{user}/claims', [UserContoller::class, 'index'])->name('index')->whereNumber('user');

    Route::get('/users/{user}/', [UserContoller::class, 'show'])->name('show');

});

