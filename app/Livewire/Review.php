<?php

namespace App\Livewire;

use Livewire\Component;

class Review extends Component
{
    public $activeTab = 'details';

    public function changeTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.review');
    }
}
