<?php

namespace App\Livewire\Authorization\Role;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public RoleForm $form;
    public bool $showModal = false;

    
    #[On('createRole')]
    public function openModal()
    {
        $this->showModal = true;
    }

    public function createRole()
    {
        $this->form->validate();
        Role::create($this->form->only('name'));

          // Reset the form
          $this->reset();

          // Optionally, you can add a session flash message or event
          session()->flash('message', 'Role created successfully.');

        $this->redirect(route('index.role'));
    }

     
    public function cancle()
    {
        $this->showModal = false;
    }


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.role.create-role');
    }
}
