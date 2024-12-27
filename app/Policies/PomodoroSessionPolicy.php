<?php

namespace App\Policies;

use App\Models\User;

class PomodoroSessionPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view sessions');
    }

    public function create(User $user)
    {
        return $user->can('create sessions');
    }

    public function update(User $user)
    {
        return $user->can('edit sessions');
    }

    public function delete(User $user)
    {
        return $user->can('delete sessions');
    }
}
