<?php

namespace App\Livewire\Article;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\CreateArticle; //reusing the createArticle form to edit

class EditArticle extends Component
{
    use WithFileUploads;

    public $article;

    public CreateArticle $form;


    public function mount(Article $article)
    {
            $article = Article::find($article->id);
      
            $this->form->title = $this->article->title;
            $this->form->body = $this->article->body;
    }

    public function updateArticle()
    {
        $this->form->validate();
       dd('yes');
    }

    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.article.edit-article',);
    }
}
