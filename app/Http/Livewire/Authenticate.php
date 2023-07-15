<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;



class Authenticate extends Component
{
    public $users, $email, $password, $name;
    public $register = false;
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
        $v = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        $this->password = Hash::make($this->password); 
 
        $data = [ 'name' => $this->name, 
                  'email' => $this->email,
                  'password' => $this->password
                ];
 
        User::create($data);
 
        session()->flash('message', 'You have been successfully registered.');
 
        $this->resetInputFields();
 
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('signin');
    }
}
