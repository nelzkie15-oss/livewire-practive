<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Register extends Component
{

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    #[Validate('same:password')]
    public $password_confirmation = '';


    public function register(){
        $validated = $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)

        ]);
        session()->flash('message', 'User added successfully');
        return $this->redirect('/');

    }


    public function render()
    {
        return view('livewire.register')->layout('components.layouts.app');
    }
}
