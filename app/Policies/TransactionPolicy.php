<?php

namespace App\Policies;

use App\Models\User;

class TransactionPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view transactions');
    }

    public function create(User $user)
    {
        return $user->can('create transactions');
    }

    public function update(User $user)
    {
        return $user->can('edit transactions');
    }

    public function delete(User $user)
    {
        return $user->can('delete transactions');
    }
}
