<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view users');
    }

    public function create(User $user)
    {
        return $user->can('create users');
    }

    public function update(User $user)
    {
        return $user->can('edit users');
    }

    public function delete(User $user)
    {
        return $user->can('delete users');
    }
}
