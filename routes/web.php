<?php

use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\UsersBooksController;
use App\Http\Controllers\BookCommentsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('books/{book:slug}/show', [BookController::class, 'show'])->name('books.show');

// Book Section (access restricted to users)
Route::middleware('can:users')->group(function () {
    Route::resource('books', BookController::class)->except('show', 'destroy');
    Route::delete('books/{book}', [BookController::class, 'userDestroy'])->name('books.userDestroy');
    Route::get('books/{slug}/download', [BookController::class, 'download']);
});

// Book Comment section
Route::post('books/{book:slug}/comments', [BookCommentsController::class, 'store']);

// User section
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('register/{user}/edit', [RegisterController::class, 'edit'])->name('register.edit');
Route::patch('register/{user}', [RegisterController::class, 'update'])->name('register.update');
Route::delete('register/{user}', [RegisterController::class, 'destroy'])->name('register.destroy');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// User dashboard
Route::middleware('can:users')->group(function () {
    Route::resource('userBooks', UsersBooksController::class)->except('show', 'update', 'destroy');
});

// Admin Section (access restricted to admin)
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/adminBooks', AdminBooksController::class)->except('show', 'edit', 'update', 'destroy');
    Route::get('admin/adminBooks/{book}/edit', [AdminBooksController::class, 'edit'])->name('adminBooks.edit');
    Route::patch('admin/adminBooks/{book}', [AdminBooksController::class, 'update'])->name('adminBooks.update');
    Route::delete('admin/adminBooks/{book}', [AdminBooksController::class, 'destroy'])->name('adminBooks.destroy');

    Route::resource('admin/categories', AdminCategoriesController::class)->except('show');
    Route::resource('admin/users', AdminUsersController::class)->except('show');
});

// Users component with Livewire
Route::view('users', 'livewire.home');
