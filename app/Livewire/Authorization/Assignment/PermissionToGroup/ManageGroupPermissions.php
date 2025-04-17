<?php

namespace App\Livewire\Authorization\Assignment\PermissionToGroup;

use App\Models\Group;
use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\Layout;

class ManageGroupPermissions extends Component
{
    public $permissions = [];
    public $groups;


    public function mount()
    {
        $this->groups = Group::all();
        $this->permissions = Permission::all();
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.permission-to-group.manage-group-permissions');
    }
}
