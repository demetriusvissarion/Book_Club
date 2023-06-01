<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Validation\Rule;

class AdminBookController extends Controller
{
    public function index()
    {
        return view('admin.books.index', [
            'books' => Book::paginate(6)
        ]);
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store()
    {
        Book::create(array_merge($this->validateBook(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', ['book' => $book]);
    }

    public function update(Book $book)
    {
        $attributes = $this->validateBook($book);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $book->update($attributes);

        return back()->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('success', 'Book Deleted!');
    }

    protected function validateBook(?Book $book = null): array
    {
        $book ??= new Book(); // if there is a book use it if not create a new one

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $book->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('books', 'slug')->ignore($book)],
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
