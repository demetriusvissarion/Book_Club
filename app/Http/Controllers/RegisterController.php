<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'Your account has been created.');
    }

    // public function edit(User $user)
    // {
    //     return view('admin.users.edit', ['user' => $user]);
    // }

    // public function update(User $user, Request $request)
    // {
    //     // $user = auth()->user();

    //     $attributes = request()->validate([
    //         'name' => 'required|max:255',
    //         'username' => 'required|min:3|max:255|unique:users,username,' . $user->id,
    //         'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    //         'password' => 'required|min:7|max:255',
    //     ]);

    //     $user->update($attributes);

    //     return back()->with('success', 'Your account has been updated.');
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return back()->with('success', 'User Deleted!');
    // }
}
