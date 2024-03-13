<?php

namespace App\Livewire\Variety;

use App\Models\Contestant;
use App\Models\Judge;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $sortDirection = 'asc';
    public $sortField = 'number';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc' : 'asc';
        $this->sortField = $field;
    }

    public function render()
    {
        $scores = DB::table('varieties')->selectRaw('contestant_id, avg(score) as score')->groupBy('contestant_id');

        return view('livewire.variety.index', [
            'judges' => Judge::all(),
            'contestants' => Contestant::select('contestants.id', 'contestants.number', 'contestants.name', 'scores.score')->leftJoinSub($scores, 'scores', function ($join) {
                $join->on('contestants.id', '=', 'scores.contestant_id');
            })->orderBy($this->sortField, $this->sortDirection)->get(),
        ]);
    }
}