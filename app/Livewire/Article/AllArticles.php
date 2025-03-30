<?php

namespace App\Livewire\Article;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Layout;

class AllArticles extends Component
{
    public User $user;

    public  $articles = [];

    public function mount(User $user)
    {
        $this->user = $user;
        // Fetch all articles from the database
        $this->articles = Article::with('user')->latest()->get();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.article.all-articles');
    }
}
