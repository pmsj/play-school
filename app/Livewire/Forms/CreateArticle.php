<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class CreateArticle extends Form
{
    
    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $body = '';
}
