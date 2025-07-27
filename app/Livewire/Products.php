<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products = [];

    public function loadProducts()
    {
        $this->products = Product::all();
    }

    public function destroy($id)
    {

    }
    public function render()
    {
        return view('livewire.products');
    }
}
