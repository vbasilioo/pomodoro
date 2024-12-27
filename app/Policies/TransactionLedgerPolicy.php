<?php

namespace App\Policies;

use App\Models\User;

class TransactionLedgerPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view transactionLedgers');
    }

    public function create(User $user)
    {
        return $user->can('create transactionLedgers');
    }

    public function update(User $user)
    {
        return $user->can('edit transactionLedgers');
    }

    public function delete(User $user)
    {
        return $user->can('delete transactionLedgers');
    }
}
