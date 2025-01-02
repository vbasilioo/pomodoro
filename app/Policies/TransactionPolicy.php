<?php

namespace App\Policies;

use App\Models\User\User;

class TransactionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view transactions');
    }

    public function create(User $user): bool
    {
        return $user->can('create transactions');
    }

    public function update(User $user): bool
    {
        return $user->can('edit transactions');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete transactions');
    }
}
