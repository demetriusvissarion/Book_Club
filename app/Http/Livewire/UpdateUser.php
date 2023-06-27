<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UpdateUser extends Component
{
    public $name, $username, $email, $password;

    static $isOpen = false;

    public function render()
    {
        return view('livewire.update-user');
    }

    public function mount(User $user)
    {
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

    public function openModal($modalName)
    {
        // dd('reached openModal inside the component');
        if ($modalName ===  'update-user') {
            $this->isOpen = true;
        } else return 'Error loading Modal!';
    }

    public function closeModal($modalName)
    {
        // dd('reached closeModal inside the component');
        if ($modalName ===  'update-user') {
            $this->isOpen = false;
        } else return 'Error loading Modal!';
    }
}
