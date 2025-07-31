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
            <label for="fileInput">Images</label>
            <div class="border p-4 text-center bg-light" style="cursor: pointer; border: dashed;"
            ondragover="Event.preventDefault()"
                 ondrop="handleDrop(Event)"
            >
                <p>Drag & drop file or click to browse</p>
                <input type="file" multiple id="fileInput" class="d-none" wire:model="images">
                <div class="mt-3">
                    @if(!empty($imagePreviews))
                        @foreach($imagePreviews as $value)
                            <img src="{{ $value }}" style="width: 100px;" class="img-thumbnail">
                        @endforeach
                    @endif
                </div>
            </div>
            @error('images.*')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-success" type="submit">Save</button>
    </form>
</div>

@script
<script>
    function handleDrop(event) {
        event.preventDefault();
        console.log(event.dataTransfer);
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            document.querySelector("#fileInput").files = files;
            @this.set('images', files);
        }
    }
    document.querySelector(".border").addEventListener("click", function(){
        document.querySelector("#fileInput").click();
    })
</script>
@endscript
