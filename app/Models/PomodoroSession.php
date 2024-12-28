<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PomodoroSession extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'pomodoro_type',
        'time_expected',
        'started_at',
        'finished_at',
        'abanoned_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
