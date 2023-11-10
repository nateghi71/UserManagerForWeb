<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
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
        return in_array('view-posts',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        $role = $user->roles()->first();
        return in_array('view-posts',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $role = $user->roles()->first();
        return in_array('create-post',$role->permissions->pluck('name')->toArray());
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        $role = $user->roles()->first();
        if($role->name == 'writer')
            return (in_array('update-post',$role->permissions->pluck('name')->toArray()) &&
                $user->id == $post->user_id);
        else
            return in_array('update-post',$role->permissions->pluck('name')->toArray());

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        $role = $user->roles()->first();
        if($role->name == 'writer')
            return (in_array('delete-post',$role->permissions->pluck('name')->toArray()) &&
                $user->id == $post->user_id);
        else
            return in_array('delete-post',$role->permissions->pluck('name')->toArray());
    }
}
