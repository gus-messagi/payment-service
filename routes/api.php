<?php

use App\Http\Controllers\CreateUserController;
use Illuminate\Support\Facades\Route;


Route::post('/user', CreateUserController::class);
