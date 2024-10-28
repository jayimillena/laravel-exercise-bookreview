<?php

use App\Http\Controllers\{BookController, ReviewController};
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])
    ->name('books.index');

Route::resource('books', BookController::class)
    ->only(['index', 'show']);

Route::resource('books.reviews', ReviewController::class)
    ->scoped(['review' => 'book'])
    ->only(['create', 'store']);
