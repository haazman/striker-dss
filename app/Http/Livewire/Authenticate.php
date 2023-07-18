<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

use Livewire\Component;



class Authenticate extends Component
{
    use WithFileUploads;
    public $users, $email, $password, $name, $photo, $filepath;
    public $register = false;
    public $success = 0;
    protected $listeners = ['log-out' => 'logout'];
    
    public function render()
    {
        return view('livewire.auth');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
         
        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                redirect('/');
        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }
 
    public function registration()
    {
        $this->register = !$this->register;
    }
 
    public function registerStore()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $this->password = Hash::make($this->password); 

        if($this->photo){
            $this->validate([
                'photo' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
            
            $filepath = $this->photo->store('users', 'public');

            $data = [ 'name' => $this->name, 
            'email' => $this->email,
            'password' => $this->password,
            'image_path' => $filepath,
          ];
        }else{
            $data = [ 'name' => $this->name, 
            'email' => $this->email,
            'password' => $this->password
          ];
        }

        User::create($data);
 
        session()->flash('message', 'You have been successfully registered.');
 
        $this->resetInputFields();
 
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

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('signin');
    }
}
