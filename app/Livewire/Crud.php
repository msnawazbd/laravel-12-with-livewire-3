<?php

namespace App\Livewire;

use App\Traits\HasSweetNotifications;
use Livewire\Component;
use Livewire\WithPagination;

class Crud extends Component
{
    use HasSweetNotifications, WithPagination;

    public $title, $content, $postAdd = false, $postEdit = false, $postId, $search;

    public function addPost()
    {
        $this->postAdd = true;
        $this->postEdit = false;
    }
    public function cancelAddPost()
    {
        $this->postAdd = false;
        $this->postEdit = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
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
        $this->postAdd = false;
        $this->postEdit = false;
    }

    public function editPost($id)
    {
        $post = \App\Models\Post::find($id);

        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;

        $this->postEdit = true;
        $this->postAdd = false;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $post = \App\Models\Post::find($this->postId);
        $post->title = $this->title;
        $post->content = $this->content;
        $post->save();

        $this->dispatchSuccessSweet(
            title: 'Success',
            message: 'Post updated successfully!',
            icon: 'success'
        );

        $this->resetForm();
    }

    public function delete($id)
    {
        $post = \App\Models\Post::find($id);
        if ($post) {
            $post->delete();
            $this->dispatchSuccessSweet(
                title: 'Success',
                message: 'Post deleted successfully!',
                icon: 'success'
            );
        } else {
            session()->flash('error', 'Post not found.');
        }
    }

    public function render()
    {
        return view('livewire.crud', [
            'posts' => \App\Models\Post::query()
                ->where("title", "LIKE", "%{$this->search}%")
                ->paginate(10),
        ]);
    }
}
