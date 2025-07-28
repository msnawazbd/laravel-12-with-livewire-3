<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Users extends Component
{
    public $users = [];


    public function boot()
    {
        info('boot');
    }

    public function mount()
    {
        info('mount');
        $this->users = \App\Models\User::query()->whereNot('id', Auth::id())->get();
    }

    public function render()
    {
        info('render');
        return view('livewire.users');
    }

    public function rendering()
    {
        info('rendering');
    }

    public function rendered()
    {
        info('rendered');
    }

    public function dehydrate()
    {
        info('dehydrate');
    }

    public function hydrate()
    {
        info('hydrate');
    }

    public function updating()
    {
        info('updating');
    }

    public function updated()
    {
        info('updated');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        session()->flash('success', 'User deleted successfully!');
    }

}
