<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\Attributes\On;

class Calendar extends Component
{
    public $events;

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = Event::query()->select("id", "title", "start", "end")
            ->get()->toArray();
    }

    #[On('eventAdded')]
    public function addEvent($title, $start, $end)
    {
        Event::query()->create([
            'title' => $title,
            'start' => $start,
            'end' => $end,
        ]);

        $this->loadEvents();

        $this->dispatch("eventLoaded", events: $this->events);
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
