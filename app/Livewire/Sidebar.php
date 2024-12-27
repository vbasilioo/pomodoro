<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $isOpen = false;

    public function toggleSideBar()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function changeBackgroundColor($color)
    {
        $this->dispatch('changeBackgroundColor', $color);
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
