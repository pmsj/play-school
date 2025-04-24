<?php

namespace App\Livewire\Authorization\Assignment\PermissionToGroup;

use Livewire\Component;
use App\Models\Permission;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;

class EditPermissionsToGroup extends Component
{

    public $roles;
    public $permissions;
    public $selectedRole = null;

    public $IndividualPermissionGroupData; // Property to hold the individualgroup data/
    public GroupForm $form;


    public function mount($id)
    {
       // Fetch the group data using the provided ID
       $this->IndividualPermissionGroupData = Group::findOrFail($id);

       // Populate form fields with existing group data
       $this->form->groupName= $this->IndividualPermissionGroupData->name;
       $this->form->groupDescription = $this->IndividualPermissionGroupData->description;

       // Fetch all permissions to display in the form
       $this->permissions = Permission::all();

       // Set the selected permissions that the group already has
       $this->form->selectedPermissions = $this->IndividualPermissionGroupData->permissions->pluck('id')->toArray();
    }

   // Function to update permissions
   public function updatePermissionsToGroup()
   {
       $this->IndividualPermissionGroupData->permissions()->sync($this->form->selectedPermissions);

       // Update permissions of all users in this group
        $this->syncUsersOfThisGroup();

       session()->flash('message-one', 'Group Permissions updated successfully!');
        session()->flash('message-two', 'Updated permissions of all users in the "' . $this->IndividualPermissionGroupData->name . '" group!');


       $this->redirect(route('manage.group-permissions'));

   }


   protected function syncUsersOfThisGroup()
    {
        // Make sure permissions and users of the group are loaded
        $this->IndividualPermissionGroupData->load('permissions', 'users.groups.permissions');

        // Get this group's permission names
        $updatedGroupPermissionNames = $this->IndividualPermissionGroupData->permissions->pluck('name')->toArray();

        // Loop through all users belonging to this group
        foreach ($this->IndividualPermissionGroupData->users as $user) {
            // Get permissions from other groups (excluding this one)
            $otherPermissions = $user->groups
                ->filter(fn($group) => $group->id !== $this->IndividualPermissionGroupData->id)
                ->flatMap->permissions
                ->pluck('name')
                ->toArray();

            // Merge and make unique
            $finalPermissions = collect(array_merge($otherPermissions, $updatedGroupPermissionNames))
                ->unique()
                ->values()
                ->toArray();

            // Update user's permissions JSON column
            $user->update([
                'permissions' => $finalPermissions,
            ]);
        }
    }


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.permission-to-group.edit-permissions-to-group');
    }
}
