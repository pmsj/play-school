<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserForm;

class CreateUser extends Component
{
    public UserForm $form;
    public bool $showModal = false;

    #[On('createNewUser')]
    public function openModal()
    {
        $this->showModal = true;
    }

    public function createNewUser()
    {
        $this->form->validate();
      
        $permission = User::make($this->form->only('name')); 
        $permission->saveOrFail();

          // Reset the form
          $this->reset();

          // Optionally, you can add a session flash message or event
          session()->flash('message', 'User created successfully.');

        $this->redirect(route('index.permission'));
    }

    // close model with cancel button
    public function cancel()
    {
        $this->showModal = false;
    }


    public function render()
    {
        return view('livewire.user.create-user');
    }
}
