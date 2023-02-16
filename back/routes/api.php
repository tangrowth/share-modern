<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::post('/user', [UserController::class, 'register']);
Route::apiResource('/post',PostController::class)->only([
    'index','store','show','destroy'
]);

Route::post('/comment', [CommentController::class, 'store']);