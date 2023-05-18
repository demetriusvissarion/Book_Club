<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        //        dd('test');
        //        dd(Gate::allows('admin'));
        return view('books.index', [
            'books' => Book::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book
        ]);
    }
}
