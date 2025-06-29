<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todos', [TodoController::class, 'index']);
Route::post('/todos/post', [TodoController::class, 'store']);
