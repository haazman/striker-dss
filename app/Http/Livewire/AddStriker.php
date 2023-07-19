<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Team;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class AddStriker extends Component
{
    use WithFileUploads;
    public $data, $team_name, $candidateName, $team_id, $stamina, $posture, $deleteTeamId = '', $deleteCandidateId = '',
        $finishing, $dribbling, $header, $attitude, $photo, $i = 0, $x = 0, $validateTeam, $upload_path = "",$altStamina = [], $altPosture = [], $altFinishing = [], $altDribbling = [], $altHeader = [], $altAttitude = [];
    public $file;
    public $original_filename = "";
    public $filepath = "";
    public $success = 0;
    public $isImage = false;
    public $alternatif, $teams;
    public $increment = 0;

    public function countVikor(){

        $bobot = [0.5,0.4,0.2,0.5,0.2,0.6];

        $alternatif = Alternatif::where('team_id', $this->team_id)->get()->toArray();
        foreach($alternatif as $alternatifs){
            array_push($this->altStamina, $alternatifs["stamina"]);
            array_push($this->altPosture, $alternatifs["posture"]);
            array_push($this->altFinishing, $alternatifs["finishing"]);
            array_push($this->altDribbling, $alternatifs["dribbling"]);
            array_push($this->altHeader, $alternatifs["header"]);
            array_push($this->altAttitude, $alternatifs["attitude"]);
        }
        $maxSta = max($this->altStamina);
        $maxPos = max($this->altStamina);
        $maxFin = max($this->altStamina);
        $maxDri = max($this->altStamina);
        $maxHea = max($this->altStamina);
        $maxAtt = max($this->altStamina);

        $minSta = min($this->altStamina);
        $minPos = min($this->altStamina);
        $minFin = min($this->altStamina);
        $minDri = min($this->altStamina);
        $minHea = min($this->altStamina);
        $minAtt = min($this->altStamina);

        $RSta= [];
        $RPos= [];
        $RFin= [];
        $RDri= [];
        $RHea= [];
        $RAtt= [];
        foreach($alternatif as $index=>$alternatifs){
            array_push($RSta, (($maxSta - $this->altStamina[$index])/($maxSta-$minSta)) * $bobot[$index]);
            array_push($RPos, (($maxPos - $this->altPosture[$index])/($maxPos-$minPos)) * $bobot[$index]);
            array_push($RFin, (($maxFin - $this->altFinishing[$index])/($maxFin-$minFin)) * $bobot[$index]);
            array_push($RDri, (($maxDri - $this->altDribbling[$index])/($maxDri-$minDri)) * $bobot[$index]);
            array_push($RHea, (($maxHea - $this->altHeader[$index])/($maxHea-$minHea)) * $bobot[$index]);
            array_push($RAtt, (($maxAtt - $this->altAttitude[$index])/($maxAtt-$minAtt)) * $bobot[$index]);
        }
        $UM = [];
        $SM = [];
        foreach($alternatif as $index=>$alternatifs){
            $UM[$index] = max($RSta[$index],$RFin[$index],$RDri[$index],$RHea[$index],$RAtt[$index]);
            $SM[$index] = $RSta[$index]+$RFin[$index]+$RDri[$index]+$RHea[$index]+$RAtt[$index];
        }

        $UMmin = min($UM);
        $UMmax = max($UM);
        $SMmin = min($SM);
        $SMmax = max($SM);

        $Qi = [];

        foreach($alternatif as $index=>$alternatifs){
            $Qi[$index] = 0.5*abs(($SM[$index]-$SMmax)/($SMmax-$SMmin))+(1-0.5)*abs(($UM[$index]-$UMmax)/($UMmax-$UMmin));
        }

        foreach($alternatif as $index=>$alternatifs){
            $alternatifUpdate = Alternatif::find($alternatifs["id"]);

            $alternatifUpdate->update(
                [
                    'indeks_vikor'=>$Qi[$index]
                ]
            );

        }
        
    }


    public function render()
    {
        return view('livewire.add-striker', [
            'teams' =>  Team::where('user_id', Auth::user()->id)->get(),
        ]);
    }


    public function boot()
    {
        $this->teams = Team::where('user_id', Auth::user()->id)->get();
        $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
        $tmp = Storage::allFiles('public/files');
        Storage::delete($tmp);
    }

    public function deleteTeamId($id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->delete();
        }
        $this->teams = Team::where('user_id', Auth::user()->id)->get();
        session()->flash("message", "Deleted Successfully");
    }
    public function deleteCandidateId($id)
    {
        $candidate = Alternatif::find($id);
        if ($candidate) {
            $candidate->delete();
        }
        $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
        session()->flash("message", "Deleted Successfully");
    }

    private function resetInputFields()
    {
        $this->team_name = '';
        $this->candidateName = '';
        $this->stamina = "";
        $this->posture = '';
        $this->finishing = '';
        $this->dribbling = '';
        $this->header = '';
        $this->attitude = '';
    }

    public function insertTeam()
    {
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

    public function insertCandidate(Request $request)
    {
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
        $this->countVikor();
        session()->flash('message', 'Candidate Added Successfully.');

        $this->resetInputFields();
        $this->success = 0;
        $tmp = Storage::allFiles('public/files');
        Storage::delete($tmp);
    }


    public function updated()
    {
        $this->alternatif = Alternatif::where('team_id', $this->team_id)->get();
        $this->countVikor();
        $this->resetValidation();
        $this->resetErrorBag();
    }


    public function updatedPhoto()
    {

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

    public function delete()
    {
        $team = Team::find($this->deleteTeamId);
        $candidate = Alternatif::find($this->deleteCandidateId);

        if ($team) {
            $team->delete();
        }
        if ($candidate) {
            $candidate->delete();
        }
        $this->teams = Team::where('user_id', Auth::user()->id)->get();
        $this->alternatif = Alternatif::where('team_id', Auth::user()->id)->get();
        session()->flash("message", "Deleted Successfully");
    }
}
