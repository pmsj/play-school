<?php

namespace App\Livewire\Authorization\Permission;

use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\PermissionForm;

class EditPermission extends Component
{
    public PermissionForm $form;

    public function mount(Permission $permission)
    {
        $data = Permission::find($permission->id); 

        $this->form->name = $data->name;
        $this->form->description = $data->description;
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.permission.edit-permission');
    }
}
