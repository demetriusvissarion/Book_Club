<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // 'slug' => $request->input('slug'),
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
        $data = $request->except('_token', '_method', 'thumbnail');
        // $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $book->update($data);

        return redirect('/userBooks')->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/userBooks')->with('success', 'Book Deleted!');
    }
}
