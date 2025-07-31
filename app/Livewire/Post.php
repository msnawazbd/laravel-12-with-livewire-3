<?php

namespace App\Livewire;

use App\Traits\HasSweetNotifications;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    use HasSweetNotifications, WithFileUploads;
    public $title, $content, $images = [];

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images.*' => 'required',
        ]);

        $post = \App\Models\Post::query()->create([
            'title' => $this->title,
            'content' => $this->content,
            'author_id' => auth()->id(),
        ]);

        if ($post->id) {
            $this->dispatchSuccessSweet(
                title: 'Success',
                message: 'Post created successfully!',
                icon: 'success'
            );

            $this->resetForm();
        } else {
            session()->flash('error', 'Failed to create post.');
        }
    }

    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.post');
    }
}
