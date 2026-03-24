<?php

namespace App\Policies;

use App\Models\Favourite;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FavouritePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->role === "user" || $user->role === "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Favourite $favourite): bool
    {
        if ($user->role === "user" || $user->role === "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->role === "user" || $user->role === "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Favourite $favourite): bool
    {
        if ($user->role === "user" || $user->role === "admin") {
            if ($user->id === $favourite->user_id) {
            return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Favourite $favourite): bool
    {
        if ($user->role === "user" || $user->role === "admin") {
            if ($user->id === $favourite->user_id) {
            return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Favourite $favourite): bool
    {
        if ($user->role === "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Favourite $favourite): bool
    {
        if ($user->role === "admin") {
            return true;
        } else {
            return false;
        }
    }
}
