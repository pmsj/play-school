<?php

use App\Livewire\Articles;
use App\Livewire\AllArticles;
use App\Livewire\ArticleShow;
use App\Livewire\CreateArticle;
use App\Livewire\Profile\DeleteUserForm;
use Illuminate\Support\Facades\Route;
use App\Livewire\Profile\Security;
use App\Livewire\Profile\UpdatePasswordForm;
use App\Livewire\Profile\UpdateProfileInformationForm;
use App\Livewire\Website;

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
    Route::get('/articles', AllArticles::class)->name('article.index');
    Route::get('/article/create', Articles::class)->name('article.create');
    Route::get('/articles/{article:slug}', ArticleShow::class)->name('article.show');
});





