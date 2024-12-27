<?php

namespace App\Policies;

use App\Models\User;

class UserProductPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view userProducts');
    }

    public function create(User $user)
    {
        return $user->can('create userProducts');
    }

    public function update(User $user)
    {
        return $user->can('edit userProducts');
    }

    public function delete(User $user)
    {
        return $user->can('delete userProducts');
    }
}
