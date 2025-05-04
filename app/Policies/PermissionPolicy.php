<?php

namespace App\Policies;


use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{

    public function managePermissions(User $user) {
        return $user->hasAnyPermission([
            'permission:view',
            'permission:create',
            'permission:update',
            'permission:delete',
          ]
        );
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyPermission(['permission:view-any','permission:view', 'permission:update',]);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->hasAnyPermission(['permission:view-any','permission:view', 'permission:update',]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        if ($user->hasPermission('permission:create:deny')) {
            return Response::denyAsNotFound();
        }

        return $user->hasPermission('permission:create') ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): Response
    {
        if ($user->hasPermission('permission:update:deny')) {
            return Response::denyAsNotFound();
        }
    
        return $user->hasPermission('permission:update')
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): Response
    {
     
            if ($user->hasPermission('article:delete-any:deny')) {
                return Response::denyAsNotFound();
            }

            return $user->hasPermission('article:delete') ?
                Response::allow() :
                Response::denyAsNotFound();
    }
}
