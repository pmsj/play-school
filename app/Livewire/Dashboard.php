<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


class Dashboard extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
