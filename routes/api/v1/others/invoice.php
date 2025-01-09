<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;


Route::name('invoice_claims.')
    ->group(function(){

    Route::get('/invoices', [InvoiceController::class, 'index'])
        ->name('index')->whereNumber('invoice');

    Route::get('/invoices/{invoice}',  [InvoiceController::class, 'show'])
        ->name('update')->whereNumber('invoice');

    Route::post('/invoices', [InvoiceController::class, 'store'])
        ->name('store')->whereNumber('invoice');

    Route::patch('/invoices/{invoice}',  [InvoiceController::class, 'update'])
        ->name('update')->whereNumber('invoice');

    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])
        ->name('destroy')->whereNumber('invoice');

});
