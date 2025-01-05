<?php

namespace App\Livewire;

use App\Events\PomodoroCompleted;
use Livewire\Attributes\On;
use Livewire\Component;

class PomodoroTimer extends Component {

    public function completePomodoro(){
        $this->dispatch(new PomodoroCompleted('Parabéns! Você completou o período Pomodoro!'));
    }

    public function render() {
        return view('livewire.pomodoro-timer');
    }
}
