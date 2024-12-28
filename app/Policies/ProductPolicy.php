<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view products');
    }

    public function create(User $user)
    {
        return $user->can('create products');
    }

    public function update(User $user)
    {
        return $user->can('edit products');
    }

    public function delete(User $user)
    {
        return $user->can('delete products');
    }
}
