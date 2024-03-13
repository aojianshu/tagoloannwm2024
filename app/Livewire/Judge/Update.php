<?php

namespace App\Livewire\Judge;

use App\Livewire\Forms\JudgeForm;
use App\Models\Judge;
use Livewire\Component;

class Update extends Component
{
    public Judge $judge;

    public JudgeForm $form;

    public function mount(Judge $judge)
    {
        $this->form->setJudge($judge);
    }

    public function render()
    {
        return view('livewire.judge.update');
    }

    public function updateJudge()
    {
        $this->form->update();

        session()->flash('message', 'Judge successfully udpated');
        return $this->redirect('judges', navigate: true);
    }
}
