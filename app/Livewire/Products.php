<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products = [];

    public function loadProducts()
    {
        info('load');
        $this->products = Product::all();
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif" width="150px" alt="Loading...">
        </div>
        HTML;
    }

    public function productDelete($id)
    {
        $this->dispatch('confirm', id: $id);
    }

    #[On('delete')]
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('success', 'Product deleted successfully!');
    }

    public function render()
    {
        return view('livewire.products');
    }
}
