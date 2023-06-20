<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class AdminUsers2Controller extends Controller
{
    use WithPagination;

    public function index()
    {
        return view('admin.users2.index', [
            'users' => User::latest()->paginate(6)
        ]);
    }

    public function showUserUploadedBooksCount($userId)
    {
        $user = User::findOrFail($userId);
        $uploadedBooksCount = $user->getUploadedBooksCount();

        return $uploadedBooksCount;
    }

    public function create()
    {
        return view('admin.users2.create');
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

        session()->flash('success', 'Your account has been created.');

        return redirect('/');
    }

    public function edit(User $user)
    {
        return view('admin.users2.edit', ['user' => $user]);
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

        session()->flash('success', 'Your account has been updated.');

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User Deleted!');

        return back();
    }
}