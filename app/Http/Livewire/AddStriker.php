<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Team;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddStriker extends Component
{
    use WithFileUploads;
    public $data, $team_name, $candidateName, $team_id, $stamina, $posture, $deleteTeamId = '', $deleteCandidateId = '',
    $finishing, $dribbling, $header, $attitude, $photo, $i = 0, $x = 0, $validateTeam, $upload_path = "";
    public $file;
    public $original_filename = "";
    public $filepath = "";
    public $success = 0;
    public $isImage = false;
    public $alternatif, $teams;
    public $increment = 0;

    public function render()
    {
        return view('livewire.add-striker', [
            'teams' =>  Team::where('user_id', Auth::user()->id)->get(),
        ]);

    }

    
    public function boot(){
        $this->teams = Team::where('user_id', Auth::user()->id)->get();
       $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
       $tmp = Storage::allFiles('public/files');
        Storage::delete($tmp);
    }

    public function deleteTeamId($id){
        $team = Team::find($id);
        if($team){
            $team->delete();
        }
        $this->teams = Team::where('user_id', Auth::user()->id)->get();
        session()->flash("message", "Deleted Successfully");
    }
    public function deleteCandidateId($id){
        $candidate = Alternatif::find($id);
        if($candidate){
            $candidate->delete();
        }
        $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
        session()->flash("message", "Deleted Successfully");
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

public function insertCandidate(Request $request){
    $v = $this->validate([
        'candidateName' => 'required',
        'stamina' => 'required',
        'posture' => 'required',
        'finishing' => 'required',
        'dribbling' => 'required',
        'header' => 'required',
        'attitude' => 'required',
        'photo' => 'mimes:png,jpg,jpeg|max:2048',
    ]);

   
    $filepath = $this->photo->store('candidate', 'public');


$data = [
    'name' => $this->candidateName,
    'stamina' => $this->stamina,
    'posture' => $this->posture,
    'finishing' => $this->finishing,
    'dribbling' => $this->dribbling,
    'header' => $this->header,
    'attitude' => $this->attitude,
    'team_id' => value($this->team_id),
    'image_path' => $filepath,
];

Alternatif::create($data);

$this->alternatif = Alternatif::where('team_id', $this->team_id)->get();

session()->flash('message', 'Candidate Added Successfully.');

$this->resetInputFields();
$this->success = 0;
$tmp = Storage::allFiles('public/files');
        Storage::delete($tmp);
}


public function updated(){
    $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
    $this->resetValidation();
    $this->resetErrorBag();
}


public function updatedPhoto() {

    // Reset value
    $this->success = 0;

    // Validate
    $this->validate([
         'photo' => 'required|mimes:png,jpg,jpeg|max:2048', // 2MB Max
    ]);

    // Upload file
    $filename = $this->photo->store('files', 'public');

    // Success
    $this->success = 1;

    // File path
    $this->filepath = Storage::url($filename);

}

public function delete(){
    $team = Team::find($this->deleteTeamId);
    $candidate = Alternatif::find($this->deleteCandidateId);

    if($team){
        $team->delete();
    }
    if($candidate){
        $candidate->delete();
    }
    $this->teams = Team::where('user_id', Auth::user()->id)->get();
    $this->alternatif = Alternatif::where('team_id', Auth::user()->id)->get();
    session()->flash("message", "Deleted Successfully");
}
}