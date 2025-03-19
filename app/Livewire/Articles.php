<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\CreateArticle;

class Articles extends Component
{
    public CreateArticle $form;

    public function createArticle()
    {
        $this->form->validate();

         // Create an Article instance and save it
        $article = new Article($this->form->only('title','body')); 
        $article->user()->associate(auth()->user());

        $article->save();
      
        $this->reset();
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.articles');
    }
}
