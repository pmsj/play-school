<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ManageUsers extends Component
{


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.user.manage-users');
    }
}
