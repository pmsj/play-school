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
       session()->flash('message', 'Group Permissions updated successfully!');

       $this->redirect(route('manage.group-permissions'));

   }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.permission-to-group.edit-permissions-to-group');
    }
}
