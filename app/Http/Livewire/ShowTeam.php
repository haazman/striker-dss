<?php

namespace App\Http\Livewire;
use App\Models\Team;

use Livewire\Component;

class ShowTeam extends Component
{
    public $alternatif;
    public $team;
    public $team_id;

    public function mount($id){
        $this->team = Team::where('id', $id)->first();
        $this->alternatif = Team::join('alternatif', 'alternatif.team_id', '=', 'team.id')->where('team.id', $id)->get();
    }

    public function render(Team $team)
    {
        return view('livewire.show-team');
    }
}
