<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;


# Route::apiResource('users', UserContoller::class);
Route::get('/users', [UserContoller::class, 'index']);

Route::get('/users/{id}', [UserContoller::class, 'show']);

Route::post('/users',  [UserContoller::class, 'store']);

Route::patch('/users/{id}',  [UserContoller::class, 'update']);

Route::delete('/users/{id}', [UserContoller::class, 'destroy']);
