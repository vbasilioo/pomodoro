<?php

namespace App\Policies;

use App\Models\User\User;

class PomodoroSessionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view sessions');
    }

    public function create(User $user): bool
    {
        return $user->can('create sessions');
    }

    public function update(User $user): bool
    {
        return $user->can('edit sessions');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete sessions');
    }
}
