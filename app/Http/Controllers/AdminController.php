<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
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
        Book::create(request()->except('_token'));

        return back();
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request)
    {
        $data = $request->except('_token', '_method', 'thumbnail');
        $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $book->update($data);

        return back()->with('success', 'Book Updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/admin/books')->with('success', 'Book Deleted!');
    }

    public function users()
    {
        return view('admin.users.users', [
            'users' => User::latest()->paginate(6)
        ]);
    }

    public function showUserUploadedBooksCount($userId)
    {
        $user = User::findOrFail($userId);
        $uploadedBooksCount = $user->getUploadedBooksCount();

        return $uploadedBooksCount;
    }

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::latest()->paginate(6)
        ]);
    }
}