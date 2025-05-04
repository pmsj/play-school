<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Group;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Permission;
use Laravel\Scout\Searchable;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\Context;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use Searchable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
    ];

    protected $attributes = [
        'permissions' => '[]',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'permissions' => 'array',
        ];
    }

    // TNT Search Exclusion
    public function toSearchableArray()
{
    return [
        'id' =>$this->id,
        'name' => $this->name,
        'email' => $this->email,
        // Exclude permissions here!
    ];
}

    public static function booted()
    {
        static::deleting(function (User $user) {
            $user->comments()->delete();
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_users');
    }

    public function wrote(Article $article) : bool {
        return $this->id === $article->user_id;
    }

    public function didNotWrite(Article $article) : bool {
        return $this->id !== $article->user_id;
    }

    //new mehtods --------------------------------------------------------


    public function getAllPermissions() {
        if (Auth::user()->id === $this->id && Context::hasHidden('permissions')) {
            return Context::getHidden('permissions');
        }

        $groupPermissions = $this
            ->groups()
            ->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name');

        $permissions = collect($this->permissions);

        return $groupPermissions->merge($permissions)->unique()->map(function($item) {
            return strtolower($item);
        });
    }

    public function hasPermission(string $permission) : bool {
        return $this->getAllPermissions()->contains(strtolower($permission));
    }

    public function hasAnyPermission(array $permissions) : bool {
        $perms = array_map('strtolower', $permissions);

        return $this->getAllPermissions()->intersect($perms)->isNotEmpty();
    }
    
}
