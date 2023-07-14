<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Team;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;

class AddStriker extends Component
{
    public $data, $team_name, $candidateName, $team_id, $stamina, $posture,
    $finishing, $dribbling, $header, $attitude, $i = 0, $x = 0;
    public $alternatif, $teams;
    public $increment = 0;

    public function render()
    {
        return view('livewire.add-striker', [
            'teams' =>  Team::where('user_id', Auth::user()->id)->get(),
        ]);

        $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
    }

    
    public function boot(){
        $this->teams = Team::where('user_id', Auth::user()->id)->get();
       $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
    }

    private function resetInputFields(){
        $this->team_name = '';
        $this->candidateName ='';
        $this->stamina="";
        $this->posture='';
        $this->finishing='';
        $this->dribbling='';
        $this->header='';
        $this->attitude='';
    }

    public function insertTeam(){
        $v = $this->validate([
            'team_name' => 'required',
        ]);
   
    
    $data = [
        'team_name' => $this->team_name,
        'user_id' => Auth::user()->id,
    ];

    Team::create($data);
    $this->teams = Team::where('user_id', Auth::user()->id)->get();

    session()->flash('message', 'Team Added Successfully.');
 
        $this->resetInputFields();
}

public function insertCandidate(){
    $v = $this->validate([
        'candidateName' => 'required',
        'stamina' => 'required',
        'posture' => 'required',
        'finishing' => 'required',
        'dribbling' => 'required',
        'header' => 'required',
        'attitude' => 'required',
    ]);


$data = [
    'name' => $this->candidateName,
    'stamina' => $this->stamina,
    'posture' => $this->posture,
    'finishing' => $this->finishing,
    'dribbling' => $this->dribbling,
    'header' => $this->header,
    'attitude' => $this->attitude,
    'team_id' => value($this->team_id),
];

Alternatif::create($data);

$this->alternatif = Alternatif::where('team_id', $this->team_id)->get();

session()->flash('message', 'Candidate Added Successfully.');

    $this->resetInputFields();
}


public function updated(){
    $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
}
}
