<?php

namespace App\Models;

use App\CommentableTrait;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\TaggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    Use HasFactory, TaggableTrait, CommentableTrait;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}