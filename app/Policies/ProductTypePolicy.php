<?php

namespace App\Policies;

use App\Models\User;

class ProductTypePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view productTypes');
    }

    public function create(User $user)
    {
        return $user->can('create productTypes');
    }

    public function update(User $user)
    {
        return $user->can('edit productTypes');
    }

    public function delete(User $user)
    {
        return $user->can('delete productTypes');
    }
}
