<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        $role = $user->roles()->first();

        if($role->name == 'user'){
            return false;
        }
        else if($role->name == 'admin'){
            return true;
        }

        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $role = $user->roles()->first();
        return in_array('manage-users',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        $role = $user->roles()->first();
        return in_array('manage-users',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $role = $user->roles()->first();
        return in_array('manage-users',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        $role = $user->roles()->first();
        return in_array('manage-users',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        $role = $user->roles()->first();
        return in_array('manage-users',$role->permissions->pluck('name')->toArray());
    }
}
