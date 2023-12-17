<?php

namespace App\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $comments= [
        'comment'=>'Lorem ipsum dolor sit amet, consectetur adip',
        'created at'=>'13th December 2023'
    ];
    public function render()
    {
        return view('livewire.comments');
    }
}
