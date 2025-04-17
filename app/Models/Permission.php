<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

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
