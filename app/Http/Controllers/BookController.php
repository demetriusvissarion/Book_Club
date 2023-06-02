<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
        )->simplePaginate(3)->withQueryString();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function show(Book $book): View
    {
        // ddd(auth()->id());

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function create()
    {
        // dd('test');
        return view('books.create');
    }

    public function store()
    {
        Book::create(array_merge($this->validateBook(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            'pdf' => request()->file('pdf')->store('pdf'),
        ]));

        return redirect('/');
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Book $book)
    {
        $attributes = $this->validateBook($book);

        if (!Gate::allows('update-book', $book)) {
            abort(403);
        }

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        if ($attributes['pdf'] ?? false) {
            $attributes['pdf'] = request()->file('pdf')->store('pdf');
        }

        $book->update($attributes);

        return redirect('/books')->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books')->with('success', 'Book Deleted!');
    }

    protected function validateBook(?Book $book = null): array
    {
        $book ??= new Book(); // if there is a book use it if not create a new one

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $book->exists ? ['image'] : ['required', 'image'],
            'pdf' => $book->exists ? ['file'] : ['required', 'file'],
            'slug' => ['required', Rule::unique('books', 'slug')->ignore($book)],
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
