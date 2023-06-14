<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    public function index()
    {
        return view('admin.adminBooks.index', [
            'books' => Book::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view('admin.adminBooks.create');
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
        return view('admin.adminBooks.edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request)
    {
        $data = $request->except('_token', '_method', 'thumbnail');
        $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $book->update($data);

        return redirect('/admin/adminBooks')->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/admin/adminBooks')->with('success', 'Book Deleted!');
    }
}
