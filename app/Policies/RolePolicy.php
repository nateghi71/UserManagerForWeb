<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
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
        return in_array('view-roles',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        $role = $user->roles()->first();
        return in_array('view-roles',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $role = $user->roles()->first();
        return in_array('create-role',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        $role = $user->roles()->first();
        return in_array('update-role',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        $role = $user->roles()->first();
        return in_array('delete-role',$role->permissions->pluck('name')->toArray());
    }
}
