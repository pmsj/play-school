<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Comments extends Component
{
    public Model $model; //type hinting **model** itself to be able to attach comments on any model
    public CreateComment $form;

    public function createComment()
    {
        $this->form->validate();

        $comment = $this->model->comments()->make($this->form->only('body'));
        $comment->user()->associate(auth()->user());

        $comment->save();
        $this->form->reset('body');
    }

    public function render()
    {

        return view('livewire.comments', [
            'comments' => $this->model->comments()
                ->with([
                    'user', 
                    'children' => function ($query) {
                        $query->latest()->with('user');
                    }
                    ])
                ->latest()
                ->get()
        ]);
    }
}

