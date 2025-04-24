<?php

namespace App\Livewire\Authorization\Role;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{

    public RoleForm $form;
    public $roleId;
    public bool $showModal = false;


    #[On('editRole')]
    public function editRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->roleId = $role->id;
        $this->form->name = $role->name;
        $this->showModal = true;
    }

    public function updateRole()
    {
        $this->form->validate();

        Role::where('id', $this->roleId)->update($this->form->only('name'));

        $this->dispatch('roleUpdated');
        $this->showModal = false;
    }

    public function cancle()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.authorization.role.edit-role');
    }
}
