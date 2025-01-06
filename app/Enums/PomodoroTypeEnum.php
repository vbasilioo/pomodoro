<?php

namespace App\Enums;

enum PomodoroTypeEnum: string
{
    // Regular: System defined pomodoro
    case Regular = 'regular';

    // Custom: User defined pomodoro
    case Custom = 'custom';

    // Break: System defined break
    case Break = 'break';

    public static function getAll(): array
    {
        return [
            self::Regular->value,
            self::Custom->value,
            self::Break->value,
        ];
    }
}
