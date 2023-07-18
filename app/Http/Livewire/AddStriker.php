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
        $edit_mode_index = null;
    public $file;
    public $filepath = '';
    public $success = 0;
    public $isImage = false;
    public $increment = 0;
    public $searchTeam;
    public $searchCandidate;
    public $teamsArray = [];

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
        $dataPaginate = $this->paginate($this->teamsArray);

        return view('livewire.add-striker', [
            'dataPaginate' => $dataPaginate,
            'teamsArray' => $this->teamsArray,
            'teamsAll' => Team::where('user_id', Auth::user()->id)->get(),
            'alternatif' => $alternatif,
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
