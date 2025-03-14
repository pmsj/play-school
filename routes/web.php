<?php

use App\Livewire\AllArticles;
use App\Livewire\Articles;
use App\Livewire\ArticleShow;

use App\Livewire\CreateArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/articles', AllArticles::class)->name('article.index');
Route::get('/article/create', Articles::class)->name('article.create');
Route::get('/articles/{article:slug}', ArticleShow::class)->name('article.show');
