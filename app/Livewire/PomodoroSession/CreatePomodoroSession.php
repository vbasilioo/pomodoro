<?php

namespace App\Livewire\PomodoroSession;

use App\Models\Pomodoro;
use Carbon\Carbon;
use Livewire\Component;


/* 
 * @property User user
 * @property enum pomodoro_type
 * @property date started_at
*/

class CreatePomodoroSession extends Component
{
    public $user;
    public $pomodoro_type = '';
    public $started_at = '';

    public function save()
    {
        /* @var User user */ 
        
        $this->user = auth()->user();

        Pomodoro::create([
            'user_id' => $this->user->id,
            'pomodoro_type' => $this->pomodoro_type,
            'started_at' => Carbon::now(),
        ]);
    }

    public function render()
    {
        return view('livewire.pomodoro-timer');
    }
}
