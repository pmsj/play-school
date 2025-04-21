<?php

namespace App\Livewire\Authorization\Assignment\UserToGroup;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ManageUserGroups extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::select('id', 'name', 'email', 'profile_photo_path', 'permissions') // Select specific fields for users
                            ->with([
                                'groups:id,name', // Load only the necessary fields for groups
                                'groups.permissions:id,description' // Load only the necessary fields for permissions
                            ])
                            ->get();
    }


    
    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.assignment.user-to-group.manage-user-groups');
    }
}
