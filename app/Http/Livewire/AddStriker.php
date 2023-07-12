<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class AddStriker extends Component
{
    public $data, $team_name;
    public $increment = 0;
    public function render()
    {
        return view('livewire.add-striker');
    }

    private function resetInputFields(){
        $this->team_name = '';
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

    session()->flash('message', 'Team Added Successfully.');
 
        $this->resetInputFields();
}
}
