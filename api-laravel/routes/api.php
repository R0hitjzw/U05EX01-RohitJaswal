<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/posts', [ApiController::class, 'index']);
Route::get('/posts/{id}', [ApiController::class, 'show']);
Route::post('/posts', [ApiController::class, 'store']);
Route::put('/posts/{id}', [ApiController::class, 'update']);
Route::delete('/posts/{id}', [ApiController::class, 'destroy']);