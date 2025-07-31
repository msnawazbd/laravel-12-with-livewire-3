<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chart extends Component
{
    public $chartData;

    public function mount()
    {
        $users = \App\Models\User::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $userData = [['Month', 'User Count']];

        foreach ($users as $user) {
            $userData[] = [$user->month, (int)$user->count];
        }

        $this->chartData = $userData;

        // dd($this->chartData);
    }

    public function render()
    {
        return view('livewire.chart');
    }
}
