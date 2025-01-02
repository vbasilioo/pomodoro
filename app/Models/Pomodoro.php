<?php

namespace App\Models;

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
        'time_expected',
        'started_at',
        'finished_at',
        'abanoned_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
