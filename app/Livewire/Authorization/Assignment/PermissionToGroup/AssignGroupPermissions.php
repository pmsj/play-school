<?php

namespace App\Livewire\Authorization\Assignment\PermissionToGroup;

use Livewire\Component;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use App\Models\Permission;
use Livewire\Attributes\Layout;

class AssignGroupPermissions extends Component
{

    public $roles;
    public $permissions;
    public GroupForm $form;

    

    public function assignPermissionsToGroup()
    {
        $this->form->validate();
        
        $group = Group::create([
            'nam' => $this->form->groupName,
            'description' => $this->form->groupDescription,
        ]);

        $group->permissions()->sync($this->form->selectedPermissions);

        session()->flash('message', 'Permissions assigned successfully!');
    }


    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function updatedSelectedRole($value)
    {
       
    }

    public function updatePermissions()
    {
      
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.permission-to-group.assign-group-permissions');
    }
}
