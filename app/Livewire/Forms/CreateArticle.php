<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;


class CreateArticle extends Form 
{

    use WithFileUploads;

    #[Rule('required', message: 'Please enter a title')]
    public $title;

    #[Rule('required', message: 'Please fill in the article body')]
    public $body = '';

    #[Rule('nullable|image|mimes:jpeg,png,gif,webp|max:1024')]
    public $photo = '';
}
