<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/books')->name('home.books');

Route::get('/books/cheapest', [BookController::class, 'cheapest'])->name('books.cheapest');
Route::get('/books/longest', [BookController::class, 'longest'])->name('books.longest');


Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('authors/search', [AuthorController::class, 'search'])->name('authors.search');
Route::get('loans/search', [LoanController::class, 'search'])->name('loans.search');

Route::resource('books', BookController::class);

Route::resource('loans',LoanController::class);

Route::resource('authors', AuthorController::class);
