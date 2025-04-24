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

    public function createUser()
    {

        $this->form->validate();

       User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => $this->form->password,
        ]);

          // Optionally, you can add a session flash message or event
          session()->flash('message', 'User created successfully.');

          $this->form->reset();

        $this->redirect(route('index.user'));
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
