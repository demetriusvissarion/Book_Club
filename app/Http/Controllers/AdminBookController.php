<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminBookController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'books' => Book::latest()->paginate(6)
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
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
            'pdf' => request()->file('pdf')->store('pdf'),
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

        if ($attributes['pdf'] ?? false) {
            $attributes['pdf'] = request()->file('pdf')->store('pdf');
        }

        $book->update($attributes);

        return back()->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/admin/books')->with('success', 'Book Deleted!');
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

    public function users()
    {
        return view('admin.users', [
            'users' => User::latest()->paginate(6)
        ]);
    }

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::latest()->paginate(6)
        ]);
    }
}
