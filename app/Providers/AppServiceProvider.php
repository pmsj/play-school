<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Tag;
use App\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //mapping App/Models/Article as article
        Relation::enforceMorphMap([
            'article' => Article::class
        ]);

          //mapping App/Models/Tag as tag
          Relation::enforceMorphMap([
            'tag' => Tag::class
        ]);

    }
}
