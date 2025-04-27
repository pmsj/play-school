<?php

namespace App\Livewire\Authorization\Permission;

use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\PermissionForm;

class EditPermission extends Component
{
    public PermissionForm $form;
    public $permissionId;

    public function mount(Permission $permission)
    {
        $data = Permission::find($permission->id); 
        $this->permissionId = $data->id;

        $this->form->name = $data->name;
        $this->form->description = $data->description;
    }

    
    public function updatePermission()
    {
        $this->form->validate();

        Permission::where('id', $this->permissionId)->update($this->form->only('name','description' ));

        session()->flash('message', 'Permision details updated successfully.');

        $this->redirect(route('index.permission'));
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.permission.edit-permission');
    }
}
