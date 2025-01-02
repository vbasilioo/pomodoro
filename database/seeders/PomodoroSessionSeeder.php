<?php

namespace Database\Seeders;

use App\Models\Pomodoro;
use App\Models\User\User;
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
            Pomodoro::create([
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
