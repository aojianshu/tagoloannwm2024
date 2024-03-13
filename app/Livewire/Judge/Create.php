<?php

namespace App\Livewire\Judge;

use App\Livewire\Forms\JudgeForm;
use Livewire\Component;

class Create extends Component
{
    public JudgeForm $form;

    public function render()
    {
        return view('livewire.judge.create');
    }

    public function createJudge()
    {
        $this->form->save();

        session()->flash('message', 'Judge successfully created');
        return $this->redirect('judges', navigate: true);
    }
}
