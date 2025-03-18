<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AllArticles extends Component
{
    public  $articles = [];

    public function mount()
    {
        // Fetch all articles from the database
        $this->articles = Article::all();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.all-articles');
    }
}
