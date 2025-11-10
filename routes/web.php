<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('books.index');
    Route::post('/books', 'store')->name('books.store');
    Route::get('/books/{id}/edit', 'edit')->name('books.edit');
    Route::put('/books/{id}', 'update')->name('books.update');
    Route::delete('/books/{id}', 'destroy')->name('books.destroy');
});
