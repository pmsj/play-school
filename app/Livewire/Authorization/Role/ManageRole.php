<?php

namespace App\Livewire\Authorization\Role;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ManageRole extends Component
{
    
    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.role.manage-role');
    }
}
