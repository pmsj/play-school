<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
   use HasFactory;
   use SoftDeletes;


   protected $guarded = ['id'];

   public function user()
   {
    return $this->belongsTo(User::class);
   }

   //relationship for sub comments
   public function children()
   {
      return $this->hasMany(Comment::class, 'parent_id', 'id');
   }

}
