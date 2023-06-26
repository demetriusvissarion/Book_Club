<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class UserManagementModal extends ModalComponent
{
    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function saveUser()
    {
        // Logic to save user goes here
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.user-management-modal');
    }
}
