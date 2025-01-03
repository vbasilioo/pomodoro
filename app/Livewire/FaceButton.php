<?php

namespace App\Livewire;

use Livewire\Component;

class FaceButton extends Component
{
    public $isPurchased = false;

    public function mount($isPurchased)
    {
        $this->isPurchased = $isPurchased;
    }

    public function render()
    {
        return view('livewire.face-button', ['isPurchased' => $this->isPurchased]);
    }
}