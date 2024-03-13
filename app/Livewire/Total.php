<?php

namespace App\Livewire;

use App\Models\Contestant;
use App\Models\Judge;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Total extends Component
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
        $portfolios = DB::table('portfolios')->selectRaw('contestant_id, avg(score) as score')->groupBy('contestant_id');
        $varieties = DB::table('varieties')->selectRaw('contestant_id, avg(score) as score')->groupBy('contestant_id');

        return view('livewire.total', [
            'contestants' => Contestant::selectRaw('contestants.id, contestants.number, contestants.name, avg(portfolios.score + varieties.score) as score')->leftJoinSub($varieties, 'varieties', function ($join) {
                $join->on('contestants.id', '=', 'varieties.contestant_id');
            })->leftJoinSub($portfolios, 'portfolios', function ($join) {
                $join->on('contestants.id', '=', 'portfolios.contestant_id');
            })->orderBy($this->sortField, $this->sortDirection)->groupBy('contestants.id')->get(),
        ]);
    }
}