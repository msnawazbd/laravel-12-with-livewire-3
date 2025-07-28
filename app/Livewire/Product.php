<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Product extends Component
{
    public $name, $price, $description, $category, $status, $vendors = [], $published_date;
    public $categories = [];

    public function loadCategories()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        // sleep(3); // Simulate a delay for demonstration purposes
        $this->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
            'status' => 'required|string',
            'vendors' => 'required|array|min:1',
        ]);

        $product = \App\Models\Product::query()->create([
            'name' => $this->name,
            'category_id' => $this->category,
            'price' => $this->price,
            'description' => $this->description,
            'is_active' => $this->status,
            'vendors' => $this->vendors,
            'created_by' => auth()->id(),
        ]);

        if ($product->id) {
            session()->flash('success', 'Product created successfully!');
            $this->resetForm();
        } else {
            session()->flash('error', 'Failed to create product.');
        }
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
