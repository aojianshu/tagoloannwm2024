<?php

namespace App\Livewire\Variety;

use App\Models\Contestant;
use App\Models\Variety;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Score extends Component
{
    public Contestant $contestant;

    public $loading = false;

    #[Validate('required|numeric|between:75,100')]
    public $score;

    public function render()
    {
        return view('livewire.variety.score');
    }

    public function submitScore()
    {
        $validatedData = $this->validate();

        Variety::updateorCreate(
            ['judge_id' => Auth::user()->judge->id, 'contestant_id' => $this->contestant->id],
            ['score' => $validatedData['score']],
        );

        session()->flash('message', 'Score contestant' . $this->contestant->number . ' - ' . $this->contestant->name .
            ' in Variety Show category successfully');
        // return redirect()->to('event');
        $this->loading = true;
        return $this->redirect('event', navigate: true);
    }
}