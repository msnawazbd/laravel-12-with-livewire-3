<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class User extends Component
{
    public $name, $email, $is_admin, $reason;
    public function store()
    {

    }
    public function render()
    {
        return view('livewire.user');
    }
}
