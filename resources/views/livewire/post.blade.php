<div>

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

        <div class="form-group mb-4">
            <label for="images">Images</label>
            <input type="file" multiple id="images" class="form-control" wire:model="images">
            @error('images.*')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            @if(!empty($imagePreviews))
                @foreach($imagePreviews as $value)
                    <img src="{{ $value }}" style="width: 200px;" class="img-thumbnail">
                @endforeach
            @endif
        </div>

        <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>
