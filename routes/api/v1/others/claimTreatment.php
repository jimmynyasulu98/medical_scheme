<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimTreatmentController;


Route::name('claim_treatment.')
    ->group(function(){
  
    Route::post('/claim/{claim}/claim-treatments', [ClaimTreatmentController::class, 'store'])
    ->name('store')->whereNumber('claim');  

    Route::delete('/claim/{claim}/claim-treatments/{claimTreatment}', [ClaimTreatmentController::class, 'destroy'])
    ->name('destroy'); 
       

});
