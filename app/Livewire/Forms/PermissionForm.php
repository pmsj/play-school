<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class PermissionForm extends Form
{
      
    #[Rule('required')]
    public $name;

    #[Rule('nullable')]
    public $description;

    public $selectedPermissions = [];
}
