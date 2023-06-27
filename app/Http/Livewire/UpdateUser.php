<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UpdateUser extends Component
{
    public $name, $username, $email, $password, $user_id, $user;

    public $isOpen = false;

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
        $user = User::find($this->user);

        $validatedData = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user->update($validatedData);

        session()->flash('message', 'User updated successfully.');

        $this->emit('userUpdate');
    }

    public function openEditModal($modalName, $id)
    {
        // dd('reached openEditModal inside the UpdateUser component');
        if ($modalName === 'update-user') {
            $this->isOpen = true;
        } else return 'Error loading Modal!';

        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        dd($user);
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function closeEditModal($modalName)
    {
        // dd('reached closeEditModal inside the component');
        if ($modalName ===  'update-user') {
            $this->isOpen = false;
        } else return 'Error loading Modal!';
    }
}
