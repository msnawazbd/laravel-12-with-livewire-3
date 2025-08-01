<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="postModalLabel">Edit Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form wire:submit="update">
        <div class="modal-body">

            <div class="form-group mb-4">
                <label for="title">Name</label>
                <input type="text" id="title" class="form-control" wire:model="title">
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="content">Content</label>
                <textarea id="content" class="form-control" wire:model="content"></textarea>
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="cancelAddPost">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
