<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\BookCommentsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');

// Book Section
Route::middleware('can:users')->group(function () {
    Route::resource('books', BookController::class)->except('destroy');
    Route::delete('books/{book}', [BookController::class, 'userDestroy'])->name('books.userDestroy');
});
Route::get('books/{id}/download', [BookController::class, 'download']);

// The 'guestRedirect' middleware is applied to this route, which redirects guests to the login page if they try to access the Book Page
Route::get('books/{book:slug}', [BookController::class, 'show'])
    ->middleware('guestRedirect')
    ->name('books.show');

// Book Comment section
Route::post('books/{book:slug}/comments', [BookCommentsController::class, 'store']);

// User section
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('admin/users/{user}/edit', [RegisterController::class, 'edit'])->middleware('auth')->name('edit');
Route::put('admin/users/{user}/update', [RegisterController::class, 'update'])->middleware('auth')->name('update');
Route::delete('admin/users/{user}', [RegisterController::class, 'destroy'])->middleware('auth')->name('destroy');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/books', AdminBookController::class)->except('show');
});
Route::get('admin/users', [AdminBookController::class, 'users'])->name('users');
Route::get('admin/categories', [AdminBookController::class, 'categories'])->name('categories');
