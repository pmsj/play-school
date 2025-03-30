<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

use App\Livewire\Forms\CreateArticle;


class Articles extends Component 
{
    use WithFileUploads;
    
    public CreateArticle $form;

    public function createArticle()
    {
     
        $this->form->validate();
        
        $article = request()->user()->articles()->create($this->form->only('title', 'body'));

        // Handle the uploaded image
        if ($this->form->photo) {
            $article->addMedia($this->form->photo->getRealPath())
                    ->toMediaCollection('articles');
        }

        // Reset the form
        $this->reset();

        // Optionally, you can add a session flash message or event
        session()->flash('message', 'Article created successfully.');
    }

    
    public function cancel()
    {
        return $this->redirect(route('index.article'));
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.article.articles');
    }
}
