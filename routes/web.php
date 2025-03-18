<?php

use App\Livewire\Articles;
use App\Livewire\Dashboard;
use App\Livewire\AllArticles;

use App\Livewire\ArticleShow;
use App\Livewire\CreateArticle;
use App\Livewire\DeleteUserForm;
use App\Livewire\Profile\ProfileInfo;
use Illuminate\Support\Facades\Route;
use App\Livewire\Profile\UpdatePassword;
use App\Livewire\Security;
use App\Livewire\UpdatePasswordForm;
use App\Livewire\UpdateProfileInformationForm;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');

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





