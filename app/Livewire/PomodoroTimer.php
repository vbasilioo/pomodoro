<?php

namespace App\Livewire;

use App\Events\Pomodoro\TimeRemainingUpdatedEvent;
use App\Events\Pomodoro\TimerStartedEvent;
use Livewire\Component;

class PomodoroTimer extends Component {
    public int $timeRemaining = 1500;
    public bool $timerRunning = false;
    public bool $isBreak = false;

    public function startTimer(): void {
        $this->timerRunning = true;
        event(new TimerStartedEvent($this->timeRemaining));
    }

    public function pauseTimer(): void {
        $this->timerRunning = false;
    }

    public function setFocus(): void {
        $this->timeRemaining = 25 * 60;
        $this->isBreak = false;
        event(new TimeRemainingUpdatedEvent($this->timeRemaining));
    }

    public function setBreak(): void {
        $this->timeRemaining = 5 * 60;
        $this->isBreak = true;
        event(new TimeRemainingUpdatedEvent($this->timeRemaining));
    }

    public function setLongBreak(): void {
        $this->timeRemaining = 15 * 60;
        $this->isBreak = true;
        event(new TimeRemainingUpdatedEvent($this->timeRemaining));
    }

    public function render() {
        return view('livewire.pomodoro-timer');
    }
}
