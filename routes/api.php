<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookApiController;

Route::get('books',[BookApiController::class, 'list']);
Route::post('books',[BookApiController::class, 'store']);
Route::put('books/{id}',[BookApiController::class, 'update']);
Route::delete('books/{id}',[BookApiController::class, 'destroy']);
Route::get('books/{id}',[BookApiController::class, 'find']);
