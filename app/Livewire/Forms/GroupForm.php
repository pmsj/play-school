<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class GroupForm extends Form
{
    
    #[Rule('required')]
    public $groupName;

    #[Rule('nullable')]
    public $groupDescription;

    public $selectedPermissions = [];

}
