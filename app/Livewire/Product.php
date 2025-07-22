<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $name, $price, $description, $category, $status, $vendors = [];

    public function store()
    {
        sleep(3); // Simulate a delay for demonstration purposes
        $this->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'status' => 'required|string',
            'vendors' => 'required|array|min:1',
        ]);
    }

    public function resetForm()
    {
        $this->name = '';
        $this->price = '';
        $this->description = '';
        $this->category = '';
        $this->status = '';
        $this->vendors = [];
    }
    public function render()
    {
        return view('livewire.product');
    }
}
