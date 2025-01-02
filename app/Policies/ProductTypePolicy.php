<?php

namespace App\Policies;

use App\Models\User\User;

class ProductTypePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view productTypes');
    }

    public function create(User $user): bool
    {
        return $user->can('create productTypes');
    }

    public function update(User $user): bool
    {
        return $user->can('edit productTypes');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete productTypes');
    }
}
