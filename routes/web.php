<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;


Route::get('/', function () {
return view('welcome');
});


Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::resource('loans', LoanController::class);