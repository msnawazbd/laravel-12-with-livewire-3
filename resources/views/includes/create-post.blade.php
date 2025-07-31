<div class="card">
    <div class="card-header">
        Create Post
    </div>
    <div class="card-body">
        <form wire:submit="store">
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

            <button class="btn btn-success" type="submit">Save</button>
            <button class="btn btn-danger" type="button" wire:click="cancelAddPost">Cancel</button>
        </form>
    </div>
</div>
