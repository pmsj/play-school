<?php

namespace App\Livewire\Authorization\Assignment\UserToGroup;

use App\Models\User;
use App\Models\Group;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;

class EditUserGroups extends Component
{
    public $userId;
    public $user;
    public $users;
    public $groups;
    public $selectedUser;
    public $selectedPermissionGroupsIds = [];
    public $selectedPermissionsIds = [];
    public $groupPermissions = [];

    public function mount($id)
    {
        $this->selectedUser = $id;
        $user = User::with('groups.permissions')
                 ->select('id', 'name')
                 ->findOrFail($id); 
        $this->user = $user;
        $this->selectedPermissionGroupsIds = $user->groups->pluck('id')->toArray();



        $this->users = User::select('id', 'name')->get();
        $this->groups = Group::select('id', 'name')->get();

        $this->selectedUser = $this->user->id;
        $this->selectedPermissionGroupsIds = $user->groups->pluck('id')->map(fn($id) => (string) $id)->toArray(); // mapping selected option in => wireui

        $this->loadPermissionsFromGroups();

        // Pre-fill selected permissions
        $this->selectedPermissionsIds = $this->user->groups
            ->flatMap->permissions
            ->pluck('id')
            ->unique()
            ->values()
            ->toArray();
    }

    public function updatedSelectedPermissionGroupsIds()
    {
        $this->loadPermissionsFromGroups();
    }

    public function loadPermissionsFromGroups()
    {
        $this->groupPermissions = Group::with('permissions')
            ->whereIn('id', $this->selectedPermissionGroupsIds)
            ->get()
            ->flatMap->permissions
            ->unique('id')
            ->values();
    }

    public function assignUserToGroups()
    {
        $user = User::findOrFail($this->selectedUser);

        // Sync groups
        $user->groups()->sync($this->selectedPermissionGroupsIds);

        session()->flash('message', 'User groups updated successfully!');
    }



    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.user-to-group.edit-user-groups');
    }
}
