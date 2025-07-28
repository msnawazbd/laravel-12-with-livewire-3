<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class User extends Component
{
    public $name, $email, $is_admin, $reason, $category = [];
    public $categories = [];
    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'is_admin' => 'boolean',
            'reason' => 'nullable|string|max:255',
            'category' => 'array'
        ]);
        dd([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
            'reason' => $this->reason,
            'category' => $this->category
        ]);
    }

    public function loadCategories()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.user');
    }
}
