<?php

namespace App\Livewire\Authorization\Permission;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\PermissionForm;
use Spatie\Permission\Models\Permission;

class CreatePermission extends Component
{
    public PermissionForm $form;
    public bool $showModal = false;

    #[On('createPermission')]
    public function openModal()
    {
        $this->showModal = true;
    }

    public function createPermission()
    {
        $this->form->validate();
      
        $permission = Permission::make($this->form->only('name')); 
        $permission->saveOrFail();

          // Reset the form
          $this->reset();

          // Optionally, you can add a session flash message or event
          session()->flash('message', 'Permision created successfully.');

        $this->redirect(route('index.permission'));
    }

    // close model with cancel button
    public function cancel()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.authorization.permission.create-permission');
    }
}
