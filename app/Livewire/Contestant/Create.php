<?php

namespace App\Livewire\Contestant;

use App\Models\Contestant;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required')]
    public $name;

    #[Validate('required|integer')]
    public $number;

    public function render()
    {
        return view('livewire.contestant.create');
    }

    public function createContestant()
    {
        Contestant::create($this->validate());

        session()->flash('message', 'Contestant successfully created');
        return $this->redirect('contestants', navigate: true);
    }
}
