<?php

namespace App;

use App\Models\Comment;

trait CommentableTrait
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
