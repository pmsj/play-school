<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ManageUsers extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::with('groups')->get();
    }


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.user.manage-users');
    }
}
