<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Livewire\Attributes\On;
use Livewire\Component;

class Address extends Component
{
    public $country_id, $city_id, $state_id, $details;
    public $countries = [];
    public $cities = [];
    public $states = [];
    public function mount()
    {
        $this->countries = Country::all();
    }

    #[On('change-country')]
    public function changeCountry()
    {
        $this->cities = City::query()->where('country_id', $this->country_id)->get();
        $this->city_id = null;
        $this->states = [];
    }

    #[On('change-city')]
    public function changeCity()
    {
        $this->states = State::query()->where('city_id', $this->city_id)->get();
        $this->state_id = null;
    }

    public function store()
    {
        $this->validate([
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'details' => 'required',
        ]);
        dd([
            'countries' => $this->country_id,
            'cities' => $this->city_id,
            'states' => $this->state_id,
            'details' => $this->details,
        ]);
    }
    public function render()
    {
        return view('livewire.address');
    }
}
