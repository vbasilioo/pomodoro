<?php

namespace App\Livewire;
use Livewire\Component;

class BackgroundChanger extends Component
{

    public function changeBackgroundColor($color = 'bg-primaryBlue', $isPurchased = false)
    {
        if ($isPurchased) {
            $this->dispatch('changeBackgroundColor', ['bgColor' => $color]);
        }
    }

    public function render()
    {
        return view('livewire.background-changer');
    }
}
