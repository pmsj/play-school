<?php

namespace App\Livewire\Authorization\Assignment\UserToGroup;

use App\Models\Group;
use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\Layout;
use App\Models\User;

class AssignUserGroups extends Component
{
    public $users;
    public $groups;


    public $selectedUser;
    public $selectedPermissionGroupsId = [];
    public $selectedPermissionsId = [];

    public $roles;
    public $permissions;
    
    public function mount()
    {
       
        $this->permissions = Permission::all();
        $this->users = User::all();
        $this->groups = Group::all();     

        $this->getUpdatedSelectedPermissionGroupsId();

    }

    
    public function updatedSelectedPermissionGroupsId()
    {
            $this->getUpdatedSelectedPermissionGroupsId();
    }

    public function getUpdatedSelectedPermissionGroupsId()
    {
        $groupIds = $this->selectedPermissionGroupsId;

        if($this->selectedPermissionGroupsId != '')
        { 

            $this->permissions = Permission::whereHas('groups', function ($query) use ($groupIds) {
                $query->whereIn('groups.id', $groupIds);
            })->get();
        }
        else{
   
            $this->permissions = [];
        }
    }


    public function assignUserToGroups( User $user)
    {
        $user = User::find($this->selectedUser);

        if (!$user) {
            session()->flash('error', 'User not found. Please select a user.');
            return;
        }


        $permissions = Permission::whereIn('id', $this->selectedPermissionsId)->get();
        $selectedUser = User::find($this->selectedUser); 
      
        dd($selectedUser->name);

        $user->update([
            'name' => $selectedUser->name,
            'permissions' => $permissions->pluck('name'),
        ]);

        $user->groups()->sync($this->selectedPermissionGroupsId);
        
        session()->flash('message', 'Group(s) assigned successfully!');
    }



    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.user-to-group.assign-user-groups');
    }
}
