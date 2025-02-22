<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



# Retrieve Currrent User;
Route::get('/user', function () {
    return Auth::user();
});
