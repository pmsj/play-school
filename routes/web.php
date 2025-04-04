<?php


use App\Livewire\Website;
use App\Models\Article;
use App\Livewire\Article\Articles;
use App\Livewire\Article\ArticleShow;
use App\Livewire\CreateArticle;
use App\Livewire\Profile\Security;
use App\Livewire\Article\AllArticles;
use App\Livewire\Article\EditArticle;
use App\Livewire\Authorization\Role\AllRoles;
use App\Livewire\Authorization\Role\CreateRole;
use App\Livewire\Authorization\Role\ManageRole;
use App\Livewire\Carousel\CarouselItem;
use Illuminate\Support\Facades\Route;
use App\Livewire\Profile\DeleteUserForm;
use App\Livewire\Profile\UpdatePasswordForm;
use App\Livewire\Profile\UpdateProfileInformationForm;
use App\Livewire\UserArticles;

Route::get('/', Website::class)->name('home.website');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.dashboard');
    })->name('user.dashboard');

    Route::get('/user/profile/info', UpdateProfileInformationForm::class)->name('profile.info');
    Route::get('/user/profile/password', UpdatePasswordForm::class)->name('profile.password');
    Route::get('/user/profile/security', Security::class)->name('profile.security');
    Route::get('/user/profile/delete', DeleteUserForm::class)->name('profile.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/article/create', Articles::class)->name('create.article');
    Route::get('/article/{article:slug}/edit', EditArticle::class)->name('edit.article');
    Route::get('/carousel/create', CarouselItem::class)->name('create.carousel');
    Route::get('/user/{user}/articles', UserArticles::class)->name('user.articles');

    //Role
    Route::get('/role/create', CreateRole::class)->name('create.role');
    Route::get('/manage-roles', ManageRole::class)->name('index.role');
});
//Article ----> public links
Route::get('/articles', AllArticles::class)->name('index.article');
Route::get('/article/{article:slug}', ArticleShow::class)->name('show.article');





