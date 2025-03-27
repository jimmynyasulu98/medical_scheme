<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::name('user_role.')
    ->group(function(){

    Route::get('/roles/{role}',  [RoleController::class, 'show'])
        ->name('update')->whereNumber('role');

    Route::post('/roles', [RoleController::class, 'store'])
        ->name('store')->whereNumber('role');
        

    Route::patch('/roles/{role}',  [RoleController::class, 'update'])
        ->name('update')->whereNumber('role');

    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
        ->name('destroy')->whereNumber('role');

});
