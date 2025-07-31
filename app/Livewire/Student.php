<?php

namespace App\Livewire;

use App\Traits\HasToastNotifications;
use Livewire\Component;
use Livewire\WithFileUploads;

class Student extends Component
{
    use WithFileUploads, HasToastNotifications;

    public $name, $email, $photo, $address, $city;
    public $step = 1;

    public function nextStep()
    {
        switch ($this->step) {
            case 1:
                $this->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                ]);
                break;

            case 2:
                $this->validate([
                    'photo' => 'required|image|max:5120', // 5MB Max
                ]);
                break;

            case 3:
                $this->validate([
                    'address' => 'required|string|max:255',
                    'city' => 'required|string|max:255',
                ]);
                break;

            default:
                break;
        }
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function changeStep($step)
    {
        $this->step = $step;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'required|image|max:5120', // 5MB Max
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $photo = $this->photo->store('students', 'public');

        \App\Models\Student::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'filepath' => $photo,
            'address' => $this->address,
            'city' => $this->city,
        ]);

        $this->resetForm();
        $this->dispatchSuccessToast('Student added successfully!');
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'photo', 'address', 'city']);
        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.student');
    }
}
