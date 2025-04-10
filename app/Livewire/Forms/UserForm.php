<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class UserForm extends Form
{
    #[Rule('required', message: 'Please enter a Role name')]
    public $name;

    #[Rule('required', message: 'Please enter a Role name')]
    public $email;

    #[Rule('required')]
    public $password;

}
