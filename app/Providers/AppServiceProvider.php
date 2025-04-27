<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Group;
use App\Models\Role;
use App\Models\Permission;
use Carbon\CarbonImmutable;
use App\Models\ImageCarousel;

use App\Observers\ArticleObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('manage-users', function(User $user) {
            return $user->hasAnyPermission(['user:create']);
         });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //some setups for each applications
        // Model::unguard();
        Model::shouldBeStrict(!app()->isProduction());
        Date::use(CarbonImmutable::class);
        DB::prohibitDestructiveCommands(app()->isProduction());



        
        //mapping App/Models/user as user
        Relation::enforceMorphMap([
            'user' => User::class
        ]);

        //mapping App/Models/Article as article
        Relation::enforceMorphMap([
            'article' => Article::class
        ]);

        
        //mapping App/Models/Role as role
        Relation::enforceMorphMap([
            'role' => Role::class
        ]);

          //mapping App/Models/Permission as permission
          Relation::enforceMorphMap([
            'permission' => Permission::class
        ]);

        
          //mapping App/Models/Group as group
          Relation::enforceMorphMap([
            'group' => Group::class
        ]);


        //mapping App/Models/Article as article
        Relation::enforceMorphMap([
            'carousel' => ImageCarousel::class
        ]);

          //mapping App/Models/Tag as tag
          Relation::enforceMorphMap([
            'tag' => Tag::class
        ]);
    }
}
