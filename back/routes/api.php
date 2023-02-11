<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::post('/user', [UserController::class, 'register']);
Route::apiResource('/post',PostController::class)->only([
    'index','store','show','destroy'
]);