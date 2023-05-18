<?php

use App\Http\Controllers\BookController;

use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [BookController::class, 'show']);
