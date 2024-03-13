<?php

namespace App\Livewire\Contestant;

use App\Models\Contestant;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Update extends Component
{
    public Contestant $contestant;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $number;

    public function mount(Contestant $contestant)
    {
        $this->name = $contestant->name;
        $this->number = $contestant->number;
    }

    public function render()
    {
        return view('livewire.contestant.update');
    }

    public function updateContestant()
    {
        $input = $this->validate();
        $contestant = $this->contestant;

        $contestant->name = $input['name'];
        $contestant->number = $input['number'];

        $contestant->save();

        session()->flash('message', 'Contestant successfully updated');
        return $this->redirect('contestants', navigate: true);
    }
}
