<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::latest()->paginate(6)
        ]);
    }
}
