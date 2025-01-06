<?php

namespace App\Livewire;

use App\Events\PomodoroCompleted;
use Livewire\Component;

class PomodoroTimer extends Component
{
    protected $listeners = ['completePomodoro'];

    public function completePomodoro()
    {
        PomodoroCompleted::dispatch('Pomodoro completed!');
    }

    public function render()
    {
        return view('livewire.pomodoro-timer');
    }
}
