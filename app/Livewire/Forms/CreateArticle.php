<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;


class CreateArticle extends Form 
{

    use WithFileUploads;

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $body = '';

    #[Rule('required|image|mimes:jpeg,png,gif,webp|max:1024')]
    public $photo = '';
}
