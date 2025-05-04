<?php

use App\Http\Controllers\CreatePaymentController;
use App\Http\Controllers\CreateUserController;
use App\Http\Middlewares\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('/user', CreateUserController::class);

Route::middleware(AuthenticateMiddleware::class)->group(function () {
    Route::post('/payment', CreatePaymentController::class);
});