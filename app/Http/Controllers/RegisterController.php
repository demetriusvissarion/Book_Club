<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        // dd(request()->get('book-slug'));
        return view('register.create');
    }

    public function store()
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        // return redirect('/books/' . request()->book_slug . '/show')->with('success', 'Your account has been created.');
        return request()->book_slug ? redirect('/books/' . request()->book_slug . '/show')->with('success', 'Your account has been created.') : redirect('/')->with('success', 'Your account has been created.');
    }

    public function edit(User $user)
    {
        return view('register.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|min:7|max:255',
        ]);

        $user->update($attributes);

        return redirect('/')->with('success', 'Your account has been updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/')->with('success', 'User Deleted!');
    }
}
