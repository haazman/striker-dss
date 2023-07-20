<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Team;
use Livewire\WithPagination;
use App\Models\Alternatif;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddStriker extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $data,
        $team_name,
        $candidateName,
        $team_id,
        $stamina,
        $posture,
        $deleteTeamId = '',
        $deleteCandidateId = '',
        $finishing,
        $dribbling,
        $header,
        $attitude,
        $photo,
        $i = 0,
        $x = 0,
        $validateTeam,
        $upload_path = '',
        $candidateId,
        $editedTeam,
        $edit_mode_index = null, $altStamina = [], $altPosture = [], $altFinishing = [], $altDribbling = [], $altHeader = [], $altAttitude = [];
    public $file;
    public $filepath = '';
    public $success = 0;
    public $isImage = false;
    public $increment = 0;
    public $searchTeam;
    public $searchCandidate;
    public $teamsArray = [];

    public function countVikor()
    {

        $bobot = [0.5, 0.4, 0.2, 0.5, 0.2, 0.6];

        $alternatif = Alternatif::where('team_id', $this->team_id)->get()->toArray();
        
        if (count($alternatif) > 1) {
            foreach ($alternatif as $alternatifs) {
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

            $RSta = [];
            $RPos = [];
            $RFin = [];
            $RDri = [];
            $RHea = [];
            $RAtt = [];
            foreach ($alternatif as $index => $alternatifs) {
                array_push($RSta, (($maxSta - $this->altStamina[$index]) / ($maxSta - $minSta)) * $bobot[0]);
                array_push($RPos, (($maxPos - $this->altPosture[$index]) / ($maxPos - $minPos)) * $bobot[1]);
                array_push($RFin, (($maxFin - $this->altFinishing[$index]) / ($maxFin - $minFin)) * $bobot[2]);
                array_push($RDri, (($maxDri - $this->altDribbling[$index]) / ($maxDri - $minDri)) * $bobot[3]);
                array_push($RHea, (($maxHea - $this->altHeader[$index]) / ($maxHea - $minHea)) * $bobot[4]);
                array_push($RAtt, (($maxAtt - $this->altAttitude[$index]) / ($maxAtt - $minAtt)) * $bobot[5]);
            }
            $UM = [];
            $SM = [];
            foreach ($alternatif as $index => $alternatifs) {
                $UM[$index] = max($RSta[$index], $RFin[$index], $RDri[$index], $RHea[$index], $RAtt[$index]);
                $SM[$index] = $RSta[$index] + $RFin[$index] + $RDri[$index] + $RHea[$index] + $RAtt[$index];
            }

            $UMmin = min($UM);
            $UMmax = max($UM);
            $SMmin = min($SM);
            $SMmax = max($SM);

            $Qi = [
            ];

            foreach ($alternatif as $index => $alternatifs) {
                $Qi[$index] = [
                    "id" => $alternatifs["id"],
                    "vikor" => 0.5 * ($SM[$index] - $SMmax) / ($SMmax - $SMmin) + (1 - 0.5) * (($UM[$index] - $UMmax) / ($UMmax - $UMmin))
                ];
            }

            foreach ($alternatif as $index => $alternatifs) {
                foreach ($Qi as $Qis) {
                    if($Qis["id"] == $alternatifs["id"]){
                        $alternatifUpdate = Alternatif::find($alternatifs["id"]);

                $alternatifUpdate->update(
                    [
                        'indeks_vikor' => $Qi[$index]["vikor"]
                    ]
                );
                    }
                }
            }
        }
    }

    public function render()
    {
        if ($this->searchTeam !== null) {
            $this->teamsArray = Team::where('team_name', 'like', '%' . $this->searchTeam . '%')
                ->where('user_id', Auth::user()->id)
                ->get()
                ->toArray();
        } else {
            $this->teamsArray = Team::where('user_id', Auth::user()->id)
                ->get()
                ->toArray();
        }

        if ($this->searchCandidate !== null) {
            $alternatif = Alternatif::where('name', 'like', '%' . $this->searchCandidate . '%')
                ->where('team_id', $this->team_id)
                ->paginate(5);
        } else {
            $alternatif = Alternatif::where('team_id', $this->team_id)->paginate(5);
        }
        $alternatifSort = Alternatif::where('team_id', $this->team_id)->orderBy('indeks_vikor', 'asc')->paginate(5);
        $dataPaginate = $this->paginate($this->teamsArray);

        return view('livewire.add-striker', [
            'dataPaginate' => $dataPaginate,
            'teamsArray' => $this->teamsArray,
            'teamsAll' => Team::where('user_id', Auth::user()->id)->get(),
            'alternatif' => $alternatif,
            'alternatifSort' => $alternatifSort
        ]);
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function boot()
    {
        $teams = Team::where('user_id', Auth::user()->id)->paginate(5);
        $alternatif = Alternatif::paginate(5)->where('team_id', $this->team_id);
        $tmp = Storage::allFiles('public/files');
        Storage::delete($tmp);
    }

    public function deleteCandidateId($id)
    {
        $candidate = Alternatif::find($id);
        if ($candidate) {
            Storage::delete(public_path($candidate->image_path));
            $candidate->delete();
        }
        $alternatif = Alternatif::where('team_id', $this->team_id)->paginate(5);
        $this->countVikor();
        session()->flash('message', 'Deleted Successfully');
    }

    private function resetInputFields()
    {
        $this->team_name = '';
        $this->candidateName = '';
        $this->stamina = '';
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
        $teams = Team::paginate(5)->where('user_id', Auth::user()->id);

        session()->flash('message', 'Team Added Successfully.');

        $this->resetInputFields();
    }

    public function editMode($key)
    {
        if ($this->edit_mode_index === null) {
            $this->edit_mode_index = $key;
        } else {
            $this->edit_mode_index = null;
        }
    }

    public function updateTeam($key)
    {
        $team = $this->teamsArray[$key];
        $editedTeam = Team::find($team['id']);
        $editedTeam->update($team);
        $this->edit_mode_index = null;
    }

    public function deleteTeamId($id)
    {
        $team = Team::find($id);
        if ($team) {
            $team->delete();
        }
        $teams = Team::paginate(5)->where('user_id', Auth::user()->id);
        session()->flash('message', 'Deleted Successfully');
    }

    public function showTeam($id)
    {
        $this->emit('showTeam', $id);
    }

    public function insertCandidate()
    {
        $this->validate([
            'team_id' => 'required',
            'candidateName' => 'required',
            'stamina' => 'required',
            'posture' => 'required',
            'finishing' => 'required',
            'dribbling' => 'required',
            'header' => 'required',
            'attitude' => 'required',
        ]);

        if ($this->photo) {
            $this->validate([
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
        } else {
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
        }

        Alternatif::create($data);
        $this->countVikor();

        session()->flash('message', 'Candidate Added Successfully.');

        $this->resetInputFields();
        $this->success = 0;
        $this->photo = null;
        $tmp = Storage::allFiles('public/files');
        Storage::delete($tmp);
    }

    public function updated()
    {
        $alternatif = Alternatif::where('team_id', $this->team_id)->paginate(5);
        $alternatifSort = Alternatif::where('team_id', $this->team_id)->orderBy('indeks_vikor', 'asc')->paginate(5);
        $this->resetValidation();
        $this->resetErrorBag();
        $this->resetPage();
    }

    public function updatedEditedTeam()
    {
        $this->edit_mode_index = null;
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
}
