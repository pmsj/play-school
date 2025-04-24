<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;

class EditUser extends Component
{
    public UserForm $form;
    public bool $showModal = false;

    #[On('updateUser')]
    public function openModal()
    {
        $this->showModal = true;
    }

    
    public function render()
    {
        return view('livewire.user.edit-user');
    }
}
