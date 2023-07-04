<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $name, $username, $email, $password, $user_id;
    public $createMode = false;
    public $updateMode = false;

    // static $isOpen = false;

    protected $listeners = ['flashMessageTimeout'];

    public $search;
    public $sortField;
    public $sortAsc = true;

    protected $queryString = ['search', 'sortAsc', 'sortField'];

    public function sortby($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        };

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')->orwhere('email', 'like', '%' . $this->search . '%');
            })->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(6),
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
        // dd('reached update method inside Users component');

        $validatedData = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($validatedData);

        session()->flash('message', 'User created successfully.');

        $this->resetInputFields();

        $this->cancel();

        $this->emit('flashMessageTimeout');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        // $this->user_id = $id;
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
        // dd('reached update method inside Users component');
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

            // Flash message
            session()->flash('message', 'User Updated Successfully.');

            $this->resetInputFields();

            $this->emit('flashMessageTimeout');
        }
    }

    public function flashMessageTimeout()
    {
        $this->emit('hideFlashMessage');
    }

    public function delete($id)
    {
        // dd('reached delete method inside Users component');
        if ($id) {
            User::where('id', $id)->delete();
            session()->flash('message', 'User Deleted Successfully.');
        }

        $this->emit('flashMessageTimeout');
    }

    public function openCreateModal()
    {
        $this->createMode = true;
        $this->resetInputFields();
    }
}
