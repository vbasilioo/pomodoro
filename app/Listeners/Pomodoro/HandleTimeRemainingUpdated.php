<?php

namespace App\Listeners\Pomodoro;

use App\Events\Pomodoro\TimeRemainingUpdatedEvent;
use Filament\Forms\Components\Livewire;
use Illuminate\Support\Facades\Log;

class HandleTimeRemainingUpdated
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
    public function handle(TimeRemainingUpdatedEvent $event): void
    {
        Log::info('Time Remaining Updated', ['timeRemaining' => $event->timeRemaining]);

        // Livewire::dispatch('updateTimeRemaining', $event->timeRemaining);
    }
}
