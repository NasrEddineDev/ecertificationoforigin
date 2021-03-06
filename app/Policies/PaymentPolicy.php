<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
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
        return $user->role->hasPermissionByName('list-payments');
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
        return $user->role->hasPermissionByName('view-payment');
    }
    public function balance(User $user)
    {
        //
        return $user->role->hasPermissionByName('balance-payment');
    }
    public function enterprise(User $user)
    {
        //
        return $user->role->hasPermissionByName('enterprise-payment');
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
        return $user->role->hasPermissionByName('create-payment');
    }



    public function dhahabia(User $user)
    {
        //
        return $user->role->hasPermissionByName('dhahabia-payment');
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
        return $user->role->hasPermissionByName('update-payment');
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
        return $user->role->hasPermissionByName('delete-payment');
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
        return $user->role->hasPermissionByName('restore-payment');
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
        return $user->role->hasPermissionByName('force-delete-payment');
    }
}
