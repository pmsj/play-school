<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class CreateCarouselItem extends Form
{

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $subtitle = '';

    #[Rule('required|image|mimes:jpeg,png,gif,webp|max:1024')]
    public $photo = '';
}
