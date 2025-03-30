<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\TaggableTrait;
use App\Models\Comment;
use App\CommentableTrait;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements HasMedia
{
    Use HasFactory, TaggableTrait, CommentableTrait, InteractsWithMedia;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //function to truncate Article->body
    public function truncatedBody()
    {
        return Str::words($this->body, 30); // Truncate after 30 words
    }

    public function truncatedTitle()
    {
        return Str::words($this->title, 6); // Truncate after 30 words
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