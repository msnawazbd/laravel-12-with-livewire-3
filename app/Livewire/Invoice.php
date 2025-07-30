<?php

namespace App\Livewire;

use Livewire\Component;

class Invoice extends Component
{
    public $name;

    public $items = [
        [
            'item_name' => '',
            'item_price' => '',
            'quantity' => '',
        ],
    ];

    public function addItem()
    {
        $this->items[] = array_merge($this->items, [
            [
                'item_name' => '',
                'item_price' => 0.00,
                'quantity' => 1,
            ],
        ]);
    }

    public function resetForm()
    {
        $this->name = '';
        $this->items = [
            ['item_name' => '',
                'item_price' => '',
                'quantity' => ''
            ]
        ];
    }

    public function removeItem($index)
    {
        if (count($this->items) > 1) {
            unset($this->items[$index]);
            $this->items = array_values($this->items); // Re-index the array
        } else {
            session()->flash('error', 'At least one item is required.');
        }
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'items.*.item_name' => 'required|string|max:255',
            'items.*.item_price' => 'required|numeric|min:0',
            'items.*.quantity' => 'required|integer|min:1',
        ], [
            'items.*.item_name.required' => 'Item name is required.',
            'items.*.item_price.required' => 'Item price is required.',
            'items.*.quantity.required' => 'Quantity is required.',
        ]);

        $invoice = \App\Models\Invoice::query()->create([
            'name' => $this->name,
        ]);

        foreach ($this->items as $item) {
            $invoice->invoice_items()->create([
                'item_name' => $item['item_name'],
                'item_price' => $item['item_price'],
                'quantity' => $item['quantity'],
            ]);
        }

        $this->resetForm();

        session()->flash('success', 'Invoice create successfully!');
    }

    public function render()
    {
        return view('livewire.invoice');
    }
}
