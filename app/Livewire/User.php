<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
    public $name, $email;

    public function store()
    {

    }
    public function render()
    {
        return view('livewire.user');
    }
}
