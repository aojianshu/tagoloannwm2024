<?php

namespace App\Livewire\Portfolio;

use App\Models\Contestant;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Score extends Component
{
    public Contestant $contestant;

    #[Validate('required|numeric|between:75,100')]
    public $score;

    public function render()
    {
        return view('livewire.portfolio.score');
    }

    public function submitScore()
    {
        $validatedData = $this->validate();

        Portfolio::updateorCreate(
            ['judge_id' => Auth::user()->judge->id, 'contestant_id' => $this->contestant->id],
            ['score' => $validatedData['score']]
        );

        session()->flash('message', 'Scored contestant ' . $this->contestant->number . ' - ' . $this->contestant->name . ' in Portfolio Making Contest successfully.');
        return redirect()->to('event');
    }
}