<?php

namespace App\Livewire\Authorization\Assignment\UserToGroup;

use App\Models\User;
use App\Models\Group;
use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;

class AssignUserGroups extends Component
{

    
    #[Rule('required')]
    public $selectedUser;

    #[Rule('required')]
    public $selectedPermissionGroupsIds = [];

    #[Rule('required')]
    public $selectedPermissionsIds = [];

    public $roles;
    public $allPermissions;
    public  $users;
    public  $groups;
    
    public function mount()
    {
       
        $this->allPermissions = Permission::all();
        $this->users = User::all();
        $this->groups = Group::all();     
        
    }


    public function updatedSelectedPermissionGroupsIds()
    {
       

        $groupIds = $this->selectedPermissionGroupsIds;

        if (!empty($groupIds)) {
            // Fetch all permissions related to the selected groups
            $permissions = Permission::whereHas('groups', function ($query) use ($groupIds) {
                $query->whereIn('groups.id', $groupIds);
            })->get();
    
            // Set all available permissions for display
            $this->allPermissions = $permissions;
    
            // Automatically check these permissions in the UI
            $this->selectedPermissionsIds = $permissions->pluck('id')->toArray();
        } else {
            $this->allPermissions = collect(); // nothing to display
            $this->selectedPermissionsIds = []; // nothing checked
        }
    
    }


    public function assignUserToGroups( User $user)
    {
        $this->validate();
        
        $user = User::find($this->selectedUser);

        if (!$user) {
            session()->flash('error', 'User not found. Please select a user.');
            return;
        }


        $permissions = Permission::whereIn('id', $this->selectedPermissionsIds)->get();
        $selectedUser = User::find($this->selectedUser); 
      
     

        $user->update([
            'name' => $selectedUser->name,
            'permissions' => $permissions->pluck('name')
        ]);

        $user->groups()->sync($this->selectedPermissionGroupsIds);
        
        session()->flash('message', 'Group(s) assigned successfully!');
    }



    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.user-to-group.assign-user-groups');
    }
}
