<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        // every function under this controller must use the auth middleware except for the the index function
        $this->middleware('auth')->except('index');
    }
    public function index(Request $request): View
    {
        $query = Book::query();

        if ($request->filled('user')) {
            $query->where('user_id', $request->input('user'));
        }

        $books = $query->latest()->filter(
            $request->only('search', 'category')
        )->paginate(18)->withQueryString();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book
        ]);
    }
}
