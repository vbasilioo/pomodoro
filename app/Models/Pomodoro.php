<?php

namespace App\Models;

use App\Enums\PomodoroStatusEnum;
use App\Enums\PomodoroTypeEnum;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pomodoro extends Model
{
    use SoftDeletes;

    protected $table = 'pomodoro_sessions';

    protected $fillable = [
        'user_id',
        'pomodoro_type',
        'pomodoro_status',
        'time_expected',
        'started_at',
        'finished_at',
        'abandoned_at',
    ];

    protected $casts = [
        'started_at' => 'timestamp',
        'finished_at' => 'timestamp',
        'abandoned_at' => 'timestamp',
        'pomodoro_type' => PomodoroTypeEnum::class,
        'pomodoro_status' => PomodoroStatusEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function checkStatus(PomodoroStatusEnum $status): bool
    {
        return $this->pomodoro_status == $status;
    }

    public function isRunning(): bool
    {
        return is_null($this->finished_at) && is_null($this->abandoned_at);
    }

    public function checkTypeAndTimeExpected(PomodoroTypeEnum $typeEnum): array
    {
        return match ($typeEnum) {
            PomodoroTypeEnum::Regular => [
                'time_expected' => 1500,
                'type' => PomodoroTypeEnum::Regular
            ],
            PomodoroTypeEnum::Custom => [
                'time_expected' => 900,
                'type' => PomodoroTypeEnum::Custom
            ],
            PomodoroTypeEnum::Break => [
                'time_expected' => 300,
                'type' => PomodoroTypeEnum::Break
            ],
        };
    }
}
