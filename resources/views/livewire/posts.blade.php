<div>
    @foreach($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{ $post->title }} - {{ $post->id }}</h2>
            </div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
                <p><strong>Author:</strong> {{ $post->author->name }}</p>
                <p><strong>Published at:</strong> {{ $post->created_at->format('Y-m-d H:i') }}</p>
            </div>
            <div class="card-footer">
                <button wire:click="edit({{ $post->id }})" class="btn btn-primary">Edit</button>
                <button wire:click="delete({{ $post->id }})" class="btn btn-danger">Delete</button>
            </div>
        </div>
    @endforeach
</div>

@script
<script>
    window.onscroll = function() {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            console.log('hi');
            console.log(window.innerHeight + window.scrollY);
            console.log(document.body.offsetHeight);
            Livewire.dispatch('loadMorePosts');
        }
    };
</script>
@endscript
