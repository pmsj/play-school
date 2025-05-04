<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class PermissionForm extends Form
{
      
    #[Rule('required|unique:permissions,name')]
    public $name;

    #[Rule('required')]
    public $description;

    public $selectedPermissions = [];
}
