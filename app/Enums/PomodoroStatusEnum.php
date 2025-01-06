<?php

namespace App\Enums;

enum PomodoroStatusEnum: string
{
    // Running: Pomodoro is currently running
    case Running = 'running';

    // Completed: Pomodoro has been completed
    case Completed = 'completed';

    // Abandoned: Pomodoro has been abandoned
    case Abandoned = 'abandoned';

    // Paused: Pomodoro has been paused
    case Paused = 'paused';

    public static function getAll(): array
    {
        return [
            self::Running->value,
            self::Completed->value,
            self::Abandoned->value,
            self::Paused->value,
        ];
    }
}
