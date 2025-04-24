<?php

namespace App\Livewire\Authorization\Permission;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ManagePermission extends Component
{


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.permission.manage-permission');
    }
}
