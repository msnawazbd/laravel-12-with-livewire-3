<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;

class Posts extends Component
{
    public $posts = [];

    public function mount()
    {
        $this->posts = Post::query()->latest("id")->take(5)->get();
    }

    #[On('loadMorePosts')]
    public function loadMore()
    {
        $lastPostId = $this->posts->last()->id;
        $newPosts = Post::query()
            ->where('id', '<', $lastPostId)
            ->latest('id')
            ->take(5)
            ->get();

        if ($newPosts->isNotEmpty()) {
            $this->posts = $this->posts->merge($newPosts);
        }
    }

    public function render()
    {
        return view('livewire.posts');
    }
}
