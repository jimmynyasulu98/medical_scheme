<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Helpers\Routes\RouteHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;
use Illuminate\Http\Resources\Json\JsonResource;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

RouteHelper::routeFiles( __DIR__ . '/api');
