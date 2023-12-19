<?php

namespace App\Livewire;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email = '';
    public $password = '';

//  public $users, $email, $password, $name;
    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('success', "You are Login successful.");
                return redirect(route('home'));
        }else{
            session()->flash('error', 'Email and password are wrong.');
        }
    }

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.app');
    }
}
