<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $password;
    public function createUser(){
        $validated=$this->validate([
            'name' =>'required|min:2|max:255',
            'email' =>'required|unique:users',
            'password' =>'required|min:5'
        ]);
        User::Create([
            "name" =>$this->name,
            "email" =>$this->email,
            "password"=>$this->password
        ]);
        $this->reset(['name','email','password']);
        
    }
    public function handleClick()
    {
        dump('clicked');
    }
    public function render()
    {
        $users=User::paginate(5);
        return view('livewire.clicker',[
            'users'=>$users
        ]);
    }
}
