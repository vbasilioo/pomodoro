<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class BackgroundChanger extends Component
{
    public $bgColor = 'bg-primaryBlue';

    public function changeBackgroundColor($color)
    {
        $this->bgColor = $color;

        Log::info("Background color changed to: " . $color);

        $this->dispatch('changeBackgroundColor', ['bgColor' => $color]);
    }

    public function render()
    {
        return view('livewire.background-changer');
    }
}
