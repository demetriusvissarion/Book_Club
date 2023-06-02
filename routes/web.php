<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\BookCommentsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');

// User Section
Route::middleware('can:users')->group(function () {
    Route::resource('books', BookController::class);
});

// The 'guestRedirect' middleware is applied to this route, which redirects guests to the login page if they try to access the Book Page
Route::get('books/{book:slug}', [BookController::class, 'show'])
    ->middleware('guestRedirect')
    ->name('books.show');


Route::post('books/{book:slug}/comments', [BookCommentsController::class, 'store']);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/books', AdminBookController::class)->except('show');
});
