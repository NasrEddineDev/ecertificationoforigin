<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewList(User $user)
    {
        //
        return $user->role->hasPermissionByName('list-certificates');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->role->hasPermissionByName('view-certificate');
    }

    public function viewWhite(User $user)
    {
        //
        return $user->role->hasPermissionByName('showwhite-certificate');
    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->role->hasPermissionByName('create-certificate');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return $user->role->hasPermissionByName('update-certificate');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return $user->role->hasPermissionByName('delete-certificate');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(User $user)
    {
        //
        return $user->role->hasPermissionByName('restore-certificate');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
        return $user->role->hasPermissionByName('force-delete-certificate');
    }

    public function duplicate(User $user)
    {
        //
        return $user->role->hasPermissionByName('duplicate-certificate');
    }

    public function retrospective(User $user)
    {
        //
        return $user->role->hasPermissionByName('retrospective-certificate');
    }

    public function print(User $user)
    {
        //
        return $user->role->hasPermissionByName('print-certificate');
    }
}
