<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);
Route::post('/favorit', [PostController::class, 'store']);
Route::delete('/favorit/{id}', [PostController::class, 'destroy']);