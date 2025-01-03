<?php

namespace App\Events\Pomodoro;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TimeRemainingUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $timeRemaining;

    /**
     * Create a new event instance.
     */
    public function __construct($timeRemaining)
    {
        $this->timeRemaining = $timeRemaining;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-time-remaining-updated'),
        ];
    }
}
