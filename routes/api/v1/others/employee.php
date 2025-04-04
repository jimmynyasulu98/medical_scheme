<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::name('employees.')
    ->group(function(){

    Route::get('/employees',  [EmployeeController::class, 'index'])
    ->name('index');

    Route::get('/employees/{employee}',  [EmployeeController::class, 'show'])
        ->name('show')->whereNumber('employee');

    Route::post('/employees', [EmployeeController::class, 'store'])
        ->name('store')->whereNumber('employee');
        

    Route::patch('/employees/{employee}',  [EmployeeController::class, 'update'])
        ->name('update')->whereNumber('employee');

    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])
        ->name('destroy')->whereNumber('employee');

    Route::post('/employees/{employee}/assign-role', [EmployeeController::class, 'assign_role'])
    ->name('assign_role')->whereNumber('employee'); 

    Route::post('/employees/{employee}/unassign-role', [EmployeeController::class, 'unassign_role'])
    ->name('unassign_role')->whereNumber('employee');  
    
    Route::post('/employees/{employee}/assign-permission', [EmployeeController::class, 'assign_permission'])
    ->name('assign_role')->whereNumber('employee'); 

    Route::post('/employees/{employee}/unassign-permission', [EmployeeController::class, 'unassign_permission'])
    ->name('unassign_permission')->whereNumber('employee');

});