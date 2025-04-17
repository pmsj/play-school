<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class PermissionForm extends Form
{
    #[Rule('required', message: 'Please enter a Permission name')]
    public $name;

    #[Rule('required', message: 'Add Description for what the permission does')]
    public $description;
}
