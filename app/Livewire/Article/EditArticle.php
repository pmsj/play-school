<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use App\Livewire\Forms\CreateArticle; //reusing the createArticle form to edit

class EditArticle extends Component
{
    public $articleId;
    public $title;
    public $body;
 
    protected $rules = [
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ];

    public $showModal = false;
    protected $listeners = ['openModal' => 'open'];

    public function open()
    {
        $this->showModal = true;
    }

    public function mount($articleId)
    {
        $article = Article::findOrFail($articleId);
        $this->articleId = $article->id;
        $this->title = $article->title;
        $this->body = $article->body;
    }

    public function editArticle()
    {
      
        $this->validate();

        $article = Article::findOrFail($this->articleId);
        $article->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->dispatch('article-updated');
    }
    
    public function render()
    {
        return view('livewire.article.edit-article');
    }
}
