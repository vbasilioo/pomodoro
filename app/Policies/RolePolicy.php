<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view roles');
    }

    public function create(User $user)
    {
        return $user->can('create roles');
    }

    public function update(User $user)
    {
        return $user->can('edit roles');
    }

    public function delete(User $user)
    {
        return $user->can('delete roles');
    }
}
