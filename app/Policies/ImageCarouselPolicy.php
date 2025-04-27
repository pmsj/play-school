<?php

namespace App\Policies;

use App\Models\ImageCarousel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ImageCarouselPolicy
{
    public function manageCarousel(User $user) {
        return $user->hasAnyPermission([
            'carousel:view',
            'carousel:view-any',
            'carousel:create',
            'carousel:update',
            'carousel:delete',
            'carousel:delete-any'
          ]
        );
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyPermission(['carousel:view-any','carousel:view', 'carousel:update', 'carousel:delete','carousel:delete-any']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ImageCarousel $imageCarousel): bool
    {
        return $user->hasAnyPermission(['carousel:view-any','carousel:view', 'carousel:update', 'carousel:delete']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        if ($user->hasPermission('carousel:create:deny')) {
            return Response::denyAsNotFound();
        }

        return $user->hasPermission('carousel:create') ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ImageCarousel $imageCarousel): Response
    {
        if ($user->hasPermission('carousel:update:deny')) {
            return Response::denyAsNotFound();
        }
    
        return $user->hasPermission('carousel:update')
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ImageCarousel $imageCarousel): Response
    {
        if ($user->hasPermission('carousel:delete-any:deny')) {
            return Response::denyAsNotFound();
        }

        return $user->hasPermission('carousel:delete') ?
            Response::allow() :
            Response::denyAsNotFound();
    }

}
