<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $name, $price, $description;

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);
    }
    public function render()
    {
        return view('livewire.product');
    }
}
