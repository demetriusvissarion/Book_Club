<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUsersController extends Controller
{
    public function users()
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(6)
        ]);
    }

    public function showUserUploadedBooksCount($userId)
    {
        $user = User::findOrFail($userId);
        $uploadedBooksCount = $user->getUploadedBooksCount();

        return $uploadedBooksCount;
    }
}
