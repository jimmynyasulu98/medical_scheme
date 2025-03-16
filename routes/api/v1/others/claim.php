<?php

use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;


Route::name('invoice_claims.')
    ->group(function(){

    Route::get('/claims/{claim}',  [ClaimController::class, 'show'])
        ->name('update')->whereNumber('claim');

    Route::post('/claims/approve/{claim}', [ClaimController::class, 'approve'])
    ->name('approve');  
   
    Route::post('/claims/reject/{claim}', [ClaimController::class, 'reject'])
    ->name('reject');  
    Route::post('/claims/restore_status/{claim}', [ClaimController::class, 'restore_status'])
    ->name('restore_status'); 

    Route::post('/claims', [ClaimController::class, 'store'])
        ->name('store')->whereNumber('claim');
        

    Route::patch('/claims/{claim}',  [ClaimController::class, 'update'])
        ->name('update')->whereNumber('claim');

    Route::post('/claim/submit/{claim}', [ClaimController::class, 'submit'])
    ->name('submit');   

    Route::delete('/claims/{claim}', [ClaimController::class, 'destroy'])
        ->name('destroy')->whereNumber('claim');
    
   

});
