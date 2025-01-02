<?php

namespace App\Policies;

use App\Models\User\User;

class UserProductPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view userProducts');
    }

    public function create(User $user): bool
    {
        return $user->can('create userProducts');
    }

    public function update(User $user): bool
    {
        return $user->can('edit userProducts');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete userProducts');
    }
}
