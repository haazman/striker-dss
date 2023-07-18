<?php

namespace App\Http\Livewire;
use App\Models\Alternatif;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditCandidate extends Component
{
    use WithFileUploads;
    public Alternatif $alternatif;
    public $team, $success = 0, $filepath, $first = 1, $photoPath;

    protected $rules = [
        'filepath' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        'alternatif.name' => 'required',
        'alternatif.stamina' => 'required',
        'alternatif.posture' => 'required',
        'alternatif.finishing' => 'required',
        'alternatif.dribbling' => 'required',
        'alternatif.header' => 'required',
        'alternatif.attitude' => 'required',
    ];
    
    public function mount($id){
        $this->alternatif = Alternatif::where('id', $id)->first();
        $this->team = Alternatif::join('team', 'alternatif.team_id', '=', 'team.id')->where('alternatif.id', $id)->get();
    }

    public function updateCandidate(){
        
        $this->validate();

        if($this->filepath){
        $saveImage = $this->filepath->store('candidate', 'public');
        $this->alternatif->image_path = $saveImage;
        }
        $this->alternatif->save();

        session()->flash('message', 'Edited Sunccessfully');

        
    }

    public function updatedFilepath() {  
    // Reset value
    $this->success = 0;
    $this->first = 0;

    // Validate
    $this->validate([
         'filepath' => 'nullable|mimes:png,jpg,jpeg|max:2048', // 2MB Max
    ]);

    // Upload file
    $filename = $this->filepath->store('files', 'public');

    // Success
    $this->success = 1;

    // File path
    $this->photoPath = Storage::url($filename);
}

    public function render()
    {
        return view('livewire.edit-candidate');
    }
}
