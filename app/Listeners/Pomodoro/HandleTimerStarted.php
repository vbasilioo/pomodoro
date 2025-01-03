<?php

namespace App\Listeners\Pomodoro;

use App\Events\Pomodoro\TimerStartedEvent;
use Filament\Forms\Components\Livewire;
use Illuminate\Support\Facades\Log;

class HandleTimerStarted
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TimerStartedEvent $event): void
    {
        Log::info('Timer Started', ['timeRemaining' => $event->timeRemaining]);

        // Livewire::dispatch('timerStarted', $event->timeRemaining);
    }
}
