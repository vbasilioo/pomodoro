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
    protected $listeners = ['completePomodoro', 'updateTime'];

    public bool $isRunning;

    public ?Pomodoro $pomodoro = null;

    public PomodoroTypeEnum $type;

    public int $timeExpected;

    public function completePomodoro()
    {
        PomodoroCompleted::dispatch('Pomodoro completed!');
    }

    public function updateTimeRemaining($timeRemaining): void
    {
        if ($this->pomodoro && $this->pomodoro->checkStatus(PomodoroStatusEnum::Running)) {
            $this->pomodoro->update(['time_expected' => $timeRemaining]);
            $this->dispatch('pomodoroStatus', [
                'status' => $this->pomodoro->pomodoro_status,
                'time_remaining' => $timeRemaining,
            ]);
        }
    }

    public function render(): View
    {
        if (auth()->user()) {
            $pomodoro = auth()->user()->pomodoro()->latest()->first();

            if ($pomodoro) {
                $this->pomodoro = $pomodoro;

                if ($pomodoro->checkStatus(PomodoroStatusEnum::Running)) {
                    $elapsedTime = Carbon::now()->diffInSeconds(Carbon::parse($pomodoro->started_at));

                    $this->pomodoro->time_expected = max(0, $pomodoro->time_expected - $elapsedTime);

                    if ($this->pomodoro->time_expected === 0) {
                        $this->completePomodoro();
                    }
                }

                $this->dispatch('pomodoroStatus', [
                    'status' => $pomodoro->pomodoro_status,
                    'time_remaining' => $this->pomodoro->time_expected,
                ]);
            }
        }

        return view('livewire.pomodoro-timer', [
            'timeRemaining' => $this->pomodoro->time_expected ?? 0,
        ]);
    }

    public function startPomodoro(): void
    {
        $pomodoro = auth()->user()->pomodoro()->create([
            'pomodoro_status' => PomodoroStatusEnum::Running,
            'pomodoro_type' => $this->type ?? PomodoroTypeEnum::Regular,
            'time_expected' => $this->timeExpected ?? 1500,
            'started_at' => now(),
        ]);

        $this->dispatch('pomodoroStatus', [
            'status' => PomodoroStatusEnum::Running->value,
            'time_remaining' => $this->timeExpected ?? 1500,
        ]);

        $this->isRunning = true;
        $this->pomodoro = $pomodoro;
    }

    public function pausePomodoro(): void
    {
        $elapsedTime = Carbon::parse($this->pomodoro->started_at)->diffInSeconds();
        $remainingTime = max(0, $this->pomodoro->time_expected - $elapsedTime);

        $this->pomodoro->update([
            'pomodoro_status' => PomodoroStatusEnum::Paused,
            'time_expected' => $remainingTime,
        ]);

        $this->dispatch('pomodoroStatus', [
            'status' => PomodoroStatusEnum::Paused->value,
            'time_remaining' => $remainingTime,
        ]);

        $this->isRunning = false;
    }

    public function resumePomodoro(): void
    {
        $this->pomodoro->update([
            'pomodoro_status' => PomodoroStatusEnum::Running,
            'started_at' => now(),
        ]);

        $this->dispatch('pomodoroStatus', [
            'status' => PomodoroStatusEnum::Running->value,
            'time_remaining' => $this->pomodoro->time_expected,
        ]);

        $this->isRunning = true;
    }

    public function abandonPomodoro(): void
    {
        if ($this->pomodoro) {
            $this->pomodoro->update([
                'pomodoro_status' => PomodoroStatusEnum::Abandoned,
                'abandoned_at' => now(),
            ]);
        }

        $this->dispatch('pomodoroStatus', [
            'status' => PomodoroStatusEnum::Abandoned->value,
            'time_remaining' => 0,
        ]);

        $this->isRunning = false;
        $this->pomodoro = null;
    }

    public function setType($type): void
    {
        $this->type = PomodoroTypeEnum::from($type);
        $this->timeExpected = $this->checkTypeAndTimeExpected($this->type)['time_expected'];

        $this->dispatch('updateTimeRemaining', ['timeRemaining' => $this->timeExpected]);
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
