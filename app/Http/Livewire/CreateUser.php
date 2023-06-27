<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $name, $username, $email, $password;
    public $isOpen = false;

    public function render()
    {
        return view('livewire.create-user');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($validatedData);

        session()->flash('message', 'User created successfully.');

        $this->resetInputFields();

        $this->emit('userStore');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
    }

    public function openModal($modalName)
    {
        // dd('reached openModal inside the component');
        if ($modalName === 'create-user') {
            $this->isOpen = true;
        } else return 'Error loading Modal!';
    }

    public function closeModal($modalName)
    {
        // dd('reached closeModal inside the component');
        if ($modalName === 'create-user') {
            $this->isOpen = false;
        } else return 'Error loading Modal!';
    }
}
