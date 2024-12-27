<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view permissions');
    }

    public function create(User $user)
    {
        return $user->can('create permissions');
    }

    public function update(User $user)
    {
        return $user->can('edit permissions');
    }

    public function delete(User $user)
    {
        return $user->can('delete permissions');
    }
}
