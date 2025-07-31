<?php

namespace App\Livewire;

use App\Traits\HasSweetNotifications;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    use HasSweetNotifications, WithFileUploads;
    public $title, $content, $images = [], $imagePreviews = [];

    public function updatedImages()
    {
        $this->imagePreviews = [];

        foreach ($this->images as $image) {
            $this->imagePreviews [] = $image->temporaryUrl();
        }
    }

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

            foreach ($this->images as $image) {
                $path = $image->store("posts", "public");

                $post->post_images()->create([
                    'path' => $path
                ]);
            }

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
        $this->images = [];
        $this->imagePreviews = [];
    }

    public function render()
    {
        return view('livewire.post');
    }
}
