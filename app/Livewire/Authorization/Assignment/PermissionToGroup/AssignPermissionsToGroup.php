<?php

namespace App\Livewire\Authorization\Assignment\PermissionToGroup;

use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\Layout;

class AssignPermissionsToGroup extends Component
{
    
    public $roles;
    public $permissions;
    public GroupForm $form;


    public function assignPermissionsToGroup()
    {
        $group = Group::create([
            'name' => $this->form->groupName,
            'description' => $this->form->groupDescription,
        ]);

        $group->permissions()->sync($this->form->selectedPermissions);

        session()->flash('message', 'Permissions assigned successfully!');
    }


    public function mount()
    {
        $this->permissions = Permission::all();
    }



    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.permission-to-group.assign-permissions-to-group');
    }
}
