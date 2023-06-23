<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Variation;
use Illuminate\Auth\Access\HandlesAuthorization;

class VariationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the variation can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list variations');
    }

    /**
     * Determine whether the variation can view the model.
     */
    public function view(User $user, Variation $model): bool
    {
        return $user->hasPermissionTo('view variations');
    }

    /**
     * Determine whether the variation can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create variations');
    }

    /**
     * Determine whether the variation can update the model.
     */
    public function update(User $user, Variation $model): bool
    {
        return $user->hasPermissionTo('update variations');
    }

    /**
     * Determine whether the variation can delete the model.
     */
    public function delete(User $user, Variation $model): bool
    {
        return $user->hasPermissionTo('delete variations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete variations');
    }

    /**
     * Determine whether the variation can restore the model.
     */
    public function restore(User $user, Variation $model): bool
    {
        return false;
    }

    /**
     * Determine whether the variation can permanently delete the model.
     */
    public function forceDelete(User $user, Variation $model): bool
    {
        return false;
    }
}
