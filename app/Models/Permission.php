<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['name', 'description'];

    public function toSearchableArray()
    {
        return [
            'id' =>$this->id,
            'description' => $this->description,
            // Exclude permissions here!
        ];
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_permission');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissions_roles');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
