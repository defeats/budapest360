<?php

namespace App\Policies;

use App\Models\Favourite;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FavouritePolicy
{
    public function before(User $user): bool|null
    {
        if ($user->role === "admin") {
            return true;
        } 
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Favourite $favourite): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Favourite $favourite): bool
    {
        if (auth()->check()) {
            return $user->id === $favourite->user_id;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Favourite $favourite): bool
    {
        if (auth()->check()) {
            return $user->id === $favourite->user_id;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Favourite $favourite): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Favourite $favourite): bool
    {
        return false;
    }
}
