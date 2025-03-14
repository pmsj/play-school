<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ArticleShow extends Component
{
    public Article $article;

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.article-show');
    }
}
