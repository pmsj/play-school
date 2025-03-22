<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Article;
use Carbon\CarbonImmutable;
use App\Observers\ArticleObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Model;
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
        //some setups for each applications
        Model::unguard();
        Model::shouldBeStrict(!app()->isProduction());
        Date::use(CarbonImmutable::class);
        DB::prohibitDestructiveCommands(app()->isProduction());




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
