<?php

namespace App\Livewire;

use App\Enums\PomodoroStatusEnum;
use App\Enums\PomodoroTypeEnum;
use App\Events\PomodoroCompleted;
use App\Models\Pomodoro;
use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class PomodoroTimer extends Component
{
    protected $listeners = ['completePomodoro'];

    public bool $isRunning;

    public Pomodoro $pomodoro;

    public function completePomodoro()
    {
        PomodoroCompleted::dispatch('Pomodoro completed!');
    }

    public function render(): View
    {
        $this->isRunning = false;
        // TODO: work on guest flow later.
        if (auth()->user()) {
            $pomodoro = auth()->user()->pomodoro()->latest()->first();

            if ($pomodoro) {
                $this->pomodoro = $pomodoro;
                $this->dispatch('pomodoroStatus', ['status' => $pomodoro->pomodoro_status]);
            }

            return view('livewire.pomodoro-timer');
        }

        return view('livewire.pomodoro-timer-guest');
    }

    public function startPomodoro(): void
    {
        $pomodoro = auth()->user()->pomodoro()->create([
            'pomodoro_status' => PomodoroStatusEnum::Running,
            'pomodoro_type' => PomodoroTypeEnum::Regular,
            'time_expected' => 25 * 60,
            'started_at' => now(),
        ]);

        $this->dispatch('pomodoroStatus', ['status' => PomodoroStatusEnum::Running->value]);
        $this->isRunning = true;
        $this->pomodoro = $pomodoro;
    }

    public function pausePomodoro(): void
    {

        $remainingTime = $this->pomodoro->time_expected - (int)Carbon::now()->diffInSeconds();

        $this->pomodoro->update([
            'pomodoro_status' => PomodoroStatusEnum::Paused,
            'time_expected' => $remainingTime
        ]);

        $this->dispatch('pomodoroStatus', ['status' => PomodoroStatusEnum::Paused->value]);

        $this->isRunning = false;
    }

    public function resumePomodoro(): void
    {
        $this->pomodoro->update([
            'pomodoro_status' => PomodoroStatusEnum::Running,
        ]);

        $this->isRunning = true;
    }

    public function abandonPomodoro(): void
    {
        $this->pomodoro->update([
            'pomodoro_status' => PomodoroStatusEnum::Abandoned,
            'abandoned_at' => now(),
        ]);

        $this->dispatch('pomodoroStatus', ['status' => PomodoroStatusEnum::Abandoned->value]);

        $this->isRunning = false;
    }
}
