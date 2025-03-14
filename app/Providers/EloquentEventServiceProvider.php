<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Str;
use App\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
          //Article Observer for inserting article-slug
          Article::observe(ArticleObserver::class);
    }
}
