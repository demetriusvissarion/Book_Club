<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function __construct()
    {
        // every function under this controller must use the auth middleware except for the index and show functions
        $this->middleware('auth')->except('index', 'show');
    }
    public function index(Request $request): View
    {
        $query = Book::query();

        if ($request->filled('user')) {
            $query->where('user_id', $request->input('user'));
        }

        $books = $query->with(['category', 'author'])
            ->latest()
            ->filter($request->only('search', 'author', 'category'))
            ->paginate(6);

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

    public function create()
    {
        // dd('Reached "create" method');
        return view('books.create');
    }

    public function store(Request $request)
    {
        // dd('reached BookController store method');
        $attributes = [
            'user_id' => Auth::id(),
            'category_id' => $request->input('category_id'),
            'slug' => Str::random(6),
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'thumbnail' => $request->file('thumbnail')->store('thumbnails'),
            'pdf' => $request->file('pdf')->store('pdf'),
        ];

        Book::create($attributes);

        return redirect('/')->with('success', 'Book Published!');
    }

    public function download()
    {
        //PDF file is stored under project/public/storage/pdf/TestPDF1.pdf
        $file = public_path() . "/storage/pdf/TestPDF1.pdf";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
    }

    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request)
    {
        $attributes = $this->validateBook($book);

        // checks if user is the author
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

    public function userDestroy(Book $book)
    {
        if ($book->user_id === Auth::user()->id)
            $book->delete();
        else {
            return response()->json(['status_message' => 'Unathorised'], 401);
        }

        return redirect('/')->with('success', 'Book Deleted!');
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
