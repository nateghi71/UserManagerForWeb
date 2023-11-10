<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
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
        return in_array('view-permissions',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Permission $permission): bool
    {
        $role = $user->roles()->first();
        return in_array('view-permissions',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $role = $user->roles()->first();
        return in_array('create-permission',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $permission): bool
    {
        $role = $user->roles()->first();
        return in_array('update-permission',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permission $permission): bool
    {
        $role = $user->roles()->first();
        return in_array('delete-permission',$role->permissions->pluck('name')->toArray());

    }
}
