<?php

use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BookCommentsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('books/{book:slug}', [BookController::class, 'show'])->name('books.show');

// Book Section (access restricted to users and admin)
Route::middleware(['can:users'])->group(function () {
    Route::resource('books', BookController::class)->except('destroy', 'show');
    Route::delete('books/{book}', [BookController::class, 'userDestroy'])->name('books.userDestroy');
    Route::get('books/{id}/download', [BookController::class, 'download']);
});

// Book Comment section
Route::post('books/{book:slug}/comments', [BookCommentsController::class, 'store']);

// User section
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin Section (access restricted to admin)
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/books', AdminBooksController::class)->except('show');
    Route::resource('admin/categories', AdminCategoriesController::class)->except('show');
    Route::resource('admin/users', AdminUsersController::class)->except('show');
});
