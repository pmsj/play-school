<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class ArticleCard extends Component
{
    Public Article $article;

    public bool $articleDeleted = false;

    //deleting Article
    public function deleteArticle()
    {
         //authorization check
         $this->authorize('update', $this->article);

         $this->article->delete();

         $this->articleDeleted = true;

         
        // session()->flash('message', 'Article deleted successfully.');

        // return $this->redirect(route('index.article'));

    }
    
    public function render()
    {
        return view('livewire.article.article-card');
    }
}
