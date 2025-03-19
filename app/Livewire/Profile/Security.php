<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Security extends Component
{

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.profile.security');
    }
}
