<div>
    @if($postEdit)
    @include('includes.edit-post')
    @endif

    @if($postAdd)
        @include('includes.create-post')
    @else
        <button class="btn btn-primary mt-3" wire:click="addPost">Create Post</button>
    @endif

        <div class="mt-3">
            <input type="text" name="search" class="form-control" placeholder="Search posts..."
                   wire:model.live="search">
        </div>

    <table class="table table-striped table-bordered mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                    <td style="width: 10%">
                        <button wire:click="editPost({{ $post->id }})" class="btn btn-primary btn-sm mr-2">Edit</button>
                        <button wire:click="delete({{ $post->id }})"
                                wire:confirm="Are you sure to remove this post?"
                                class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">No posts found.</td>
            </tr>
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5">
                {{ $posts->links() }}
            </td>
        </tr>
        </tfoot>
    </table>
</div>
