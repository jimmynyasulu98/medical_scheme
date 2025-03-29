<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::name('permission.')
    ->group(function(){

    Route::get('/permissions',  [PermissionController::class, 'index'])
        ->name('index')->whereNumber('permission');

    Route::post('/permissions', [PermissionController::class, 'store'])
        ->name('store')->whereNumber('permission');

    Route::patch('/permissions/{role}',  [PermissionController::class, 'update'])
        ->name('update')->whereNumber('permission');

    Route::delete('/permissions/{role}', [PermissionController::class, 'destroy'])
        ->name('destroy')->whereNumber('permission');

});
