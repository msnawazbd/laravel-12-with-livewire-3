<div>
    <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#postModal" wire:click="addPost">Create Post</button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            @if($postEdit)
                @include('includes.modal-edit-post')
            @endif

            @if($postAdd)
                @include('includes.modal-create-post')
            @endif

        </div>
    </div>

    <!-- Search Input -->
    <div class="mt-3">
        <input type="text" name="search" class="form-control" placeholder="Search posts..."
               wire:model.live="search">
    </div>

    <!-- Posts Table -->
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
                        <button wire:click="editPost({{ $post->id }})" class="btn btn-primary btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#postModal">Edit</button>
                        <button wire:click="delete({{ $post->id }})"
                                wire:confirm="Are you sure to remove this post?"
                                class="btn btn-danger btn-sm">Delete
                        </button>
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


@script
<script>
    $wire.on("modal-close", () => {
       $(".btn-close").trigger("click");
    });
</script>
@endscript
