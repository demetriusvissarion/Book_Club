<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
// use Illuminate\Http\Request;

class Users extends Component
{
    use WithPagination;

    public $name, $username, $email, $password, $user_id;
    public $createMode = false;
    public $updateMode = false;

    static $isOpen = false;

    public function render()
    {
        // $this->users = User::all();
        return view('livewire.users', [
            'users' => User::latest()->paginate(6),
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
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

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function cancel()
    {
        $this->createMode = false;
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        dd('reached update method inside UserMangement component');
        $validatedDate = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required', // 'required|password',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'User Updated Successfully.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        dd('reached delete method inside UserMangement component');
        if ($id) {
            User::where('id', $id)->delete();
            session()->flash('message', 'User Deleted Successfully.');
        }
    }

    public function openCreateModal()
    {
        $this->createMode = true;
        $this->resetInputFields();
    }
}
