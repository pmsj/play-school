<?php

namespace App\Models;

use App\CommentableTrait;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\TaggableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements HasMedia
{
    Use HasFactory, TaggableTrait, CommentableTrait, InteractsWithMedia;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // In your Article model (e.g., Article.php)
    public function getReadTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->body));
        $averageReadingSpeed = 200; // words per minute
        $readTime = ceil($wordCount / $averageReadingSpeed);

        return $readTime; //accessed as [ read_time ] in the view
    }
}