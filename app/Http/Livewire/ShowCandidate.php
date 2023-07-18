<?php

namespace App\Http\Livewire;
use App\Models\Alternatif;

use Livewire\Component;

class ShowCandidate extends Component
{
    public $alternatif;
    public $team;

    public function mount($id){
        $this->alternatif = Alternatif::where('id', $id)->first();
        $this->team = Alternatif::join('team', 'alternatif.team_id', '=', 'team.id')->where('alternatif.id', $id)->get();
    }
    public function render()
    {
        return view('livewire.show-candidate');
    }
}
