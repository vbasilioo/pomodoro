<?php

namespace Database\Seeders;

use App\Models\PomodoroSession;
use App\Models\User;
use Illuminate\Database\Seeder;

class PomodoroSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            PomodoroSession::create([
                'user_id' => $user->id,
                'pomodoro_type' => 'focus',
                'time_expected' => 60,
                'started_at' => now(),
                'finished_at' => now()->addMinutes(60),
                'abandoned_at' => null,
            ]);
        }
    }
}
