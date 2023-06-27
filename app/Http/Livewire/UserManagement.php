<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
// use Illuminate\Http\Request;

class UserManagement extends Component
{
    use WithPagination;

    public $name, $username, $email, $password;

    static $isOpen = false;

    public $updateMode = false;

    public function render()
    {
        // $this->users = User::all();
        // return view('livewire.user-management');
        return view('livewire.user-management', [
            'users' => User::latest()->paginate(6),
        ]);
    }

    // private function resetInputFields()
    // {
    //     $this->name = '';
    //     $this->email = '';
    // }

    // public function store()
    // {
    //     $validatedDate = $this->validate([
    //         'name' => 'required',
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|email',
    //     ]);

    //     User::create($validatedDate);

    //     session()->flash('message', 'Users Created Successfully.');

    //     $this->resetInputFields();

    //     $this->emit('userStore');
    // }

    // public function edit($id)
    // {
    //     $this->updateMode = true;
    //     $user = User::where('id', $id)->first();
    //     $this->name = $user->name;
    //     $this->username = $user->username;
    //     $this->email = $user->email;
    //     $this->password = $user->password;
    // }

    // public function cancel()
    // {
    //     $this->updateMode = false;
    //     $this->resetInputFields();
    // }

    // public function update()
    // {
    //     $validatedDate = $this->validate([
    //         'name' => 'required',
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|email',
    //     ]);

    //     if ($this->user_id) {
    //         $user = User::find($this->user_id);
    //         $user->update([
    //             'name' => $this->name,
    //             'username' => $this->username,
    //             'email' => $this->email,
    //             'password' => $this->password,
    //         ]);
    //         $this->updateMode = false;
    //         session()->flash('message', 'User Updated Successfully.');
    //         $this->resetInputFields();
    //     }
    // }

    public function delete($id)
    {
        dd('reached delete method inside userMangement component');
        if ($id) {
            User::where('id', $id)->delete();
            session()->flash('message', 'User Deleted Successfully.');
        }
    }

    // public function openEditModal($modalName)
    // {
    //     dd('reached openEditModal inside the UserManagement component');
    //     if ($modalName === 'update-user') {
    //         $this->isOpen = true;
    //     } else return 'Error loading Modal!';
    // }

    // public function closeEditModal($modalName)
    // {
    //     // dd('reached closeEditModal inside the component');
    //     if ($modalName ===  'update-user') {
    //         $this->isOpen = false;
    //     } else return 'Error loading Modal!';
    // }
}
