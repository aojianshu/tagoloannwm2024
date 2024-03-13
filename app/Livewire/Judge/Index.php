<?php

namespace App\Livewire\Judge;

use App\Models\Judge;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.judge.index', [
            'judges' => Judge::all()
        ]);
    }
}
