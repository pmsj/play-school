<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }
}
