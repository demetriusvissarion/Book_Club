<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UpdateUser extends Component
{
    public $user_id, $name, $username, $email, $password;

    public function render()
    {
        return view('livewire.update-user');
    }

    public function mount(User $user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::find($this->user_id);
        $user->update($validatedData);

        session()->flash('message', 'User updated successfully.');

        $this->emit('userUpdate');
    }
}
