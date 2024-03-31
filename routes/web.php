<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\GenreController;

Route::get('/', [BukuController::class, 'index']);

// BOOKS MANAGEMENT

Route::resource('books', BukuController::class);

// GENRE MANAGEMENT

Route::resource('genre', GenreController::class);
