<?php

namespace App\Livewire;

use App\Models\Contestant;
use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        return view('livewire.event', [
            'contestants' => Contestant::all()
        ]);
    }
}