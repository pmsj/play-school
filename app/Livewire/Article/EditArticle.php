<?php

namespace App\Livewire\Article;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\CreateArticle; //reusing the createArticle form to edit

class EditArticle extends Component
{
    use WithFileUploads;

    public $article;

    public CreateArticle $form;


    public function mount(Article $article)
    {
            $article = Article::find($article->id);
      
            $this->form->title = $this->article->title;
            $this->form->body = $this->article->body;
    }

    public function updateArticle()
    {
        //authorizing and validating update
        $this->authorize('update', $this->article);
        $this->form->validate();

        // updating title and body
        $this->article->update($this->form->only('title', 'body',));

          // Check if a new photo is uploaded
    if ($this->form->photo) {
        // Check if the article already has an image
        if ($this->article->hasMedia('articles')) {
            // Get the existing image
            $existingImage = $this->article->getFirstMedia('articles');

            // Compare the existing image with the new image
            if ($existingImage->getPath() !== $this->form->photo->getRealPath()) {
                // If the image has changed, clear the existing media and add the new one
                $this->article->clearMediaCollection('articles');
                $this->article->addMedia($this->form->photo->getRealPath())
                    ->toMediaCollection('articles');
            }
        } else {
            // If no existing image, just add the new one
            $this->article->addMedia($this->form->photo->getRealPath())
                ->toMediaCollection('articles');
        }
    }

        session()->flash('message', 'Article updated successfully.');

        return $this->redirect(route('edit.article', ['article' => $this->article]));

    }

    public function cancel()
    {
        return $this->redirect(route('index.article'));
    }

    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.article.edit-article',);
    }
}
