<?php

namespace App\Livewire\Contestant;

use App\Models\Contestant;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.contestant.index', [
            'contestants' => Contestant::all()
        ]);
    }
}
