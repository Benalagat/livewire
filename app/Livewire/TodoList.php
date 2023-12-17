<?php

namespace App\Livewire;

use Livewire\Component;

class TodoList extends Component
{
    public $name;
    public function create(){
        dd('testing');
    }
    public function render()
    {
        return view('livewire.todo-list');
    }
}
