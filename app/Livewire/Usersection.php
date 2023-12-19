<?php

namespace App\Livewire;
use App\Models\SupportTicket;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Usersection extends Component
{

    public $active;

    public function showPost($id){
        $this->active = $id;

      }

    public function render()
    {

        $name = Auth::user()->name;
        return view('livewire.usersection',['tickets' =>SupportTicket::all()], compact('name'))->layout('livewire.home');
    }
}
