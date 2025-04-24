<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Permissions\HasPermissionsTrait;

class Role extends Model
{

    use HasPermissionsTrait;
   

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles');
    }
}
