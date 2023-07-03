<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersBooksController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $books = Book::where('user_id', $user->id)->latest()->paginate(6);

        return view('userBooks.index', compact('books'));
    }

    public function create()
    {
        return view('userBooks.create');
    }

    public function store(Request $request)
    {
        $attributes = [
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'slug' => $request->input('slug'),
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'thumbnail' => $request->file('thumbnail')->store('thumbnails'),
            'pdf' => $request->file('pdf')->store('pdf'),
        ];

        Book::create($attributes);

        return redirect('/')->with('success', 'Book Published!');
    }

    public function edit(Book $book)
    {
        return view('userBooks.edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request)
    {
        $attributes = $this->validateBook($book);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        if ($attributes['pdf'] ?? false) {
            $attributes['pdf'] = request()->file('pdf')->store('pdf');
        }

        $book->update($attributes);

        return redirect('/userBooks')->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/userBooks')->with('success', 'Book Deleted!');
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
