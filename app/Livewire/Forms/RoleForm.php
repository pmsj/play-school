<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class RoleForm extends Form
{
    #[Rule('required', message: 'Please enter a Role name')]
    public $name;
}
