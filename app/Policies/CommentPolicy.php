<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{

    public function reply(User $user, Comment $comment): bool
    {
         return is_null($comment->parent_id);
    }

    public function edit(User $user, Comment $comment): bool
    {
         return $user->id === $comment->user->id;
    }

    public function delete(User $user, Comment $comment): bool
    {
         return $user->id === $comment->user->id;
    }


}
