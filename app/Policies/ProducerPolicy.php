<?php

namespace App\Policies;

use App\Models\Producer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProducerPolicy
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
        return $user->role->hasPermissionByName('list-producers');
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
        return $user->role->hasPermissionByName('view-producer');
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
        return $user->role->hasPermissionByName('create-producer');
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
        return $user->role->hasPermissionByName('update-producer');
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
        return $user->role->hasPermissionByName('delete-producer');
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
        return $user->role->hasPermissionByName('restore-producer');
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
        return $user->role->hasPermissionByName('force-delete-producer');
    }

    public function filterCountry(User $user)
    {
        //
        return $user->role->hasPermissionByName('filter-country-producer');
    }

    public function viewEnterprises(User $user)
    {
        //
        return $user->role->hasPermissionByName('enterprise-producer');
    }
}
