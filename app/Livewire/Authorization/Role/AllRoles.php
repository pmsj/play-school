<?php

namespace App\Livewire\Authorization\Role;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;

class AllRoles extends Component
{
    public $allRoles;

    public function mount()
    {
        $this->allRoles = Role::latest()->get();
    }



    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.authorization.role.all-roles');
    }
}
