<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
        return $user->role->hasPermissionByName('list-products');
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
        return $user->role->hasPermissionByName('view-product');
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
        return $user->role->hasPermissionByName('create-product');
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
        return $user->role->hasPermissionByName('update-product');
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
        return $user->role->hasPermissionByName('delete-product');
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
        return $user->role->hasPermissionByName('restore-product');
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
        return $user->role->hasPermissionByName('force-delete-product');
    }

    public function filterCountry(User $user)
    {
        //
        return $user->role->hasPermissionByName('filter-country-product');
    }

    public function viewEnterprises(User $user)
    {
        //
        return $user->role->hasPermissionByName('enterprise-product');
    }
}
