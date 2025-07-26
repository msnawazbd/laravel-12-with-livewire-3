<div>
    <form wire:submit.prevent="store">

        @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
        @endsession

        @if($photo)
            Photo Preview:
            <img src="{{ $photo->temporaryUrl() }}" alt="" width="200" class="mb-4">
        @endif

        <div class="form-group mb-3">
            <label for="photo">Photo</label>
            <input type="file" id="photo" class="form-control" wire:model="photo">
            @error('photo')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

    <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th colspan="3" class="text-center">
                <input type="text" class="form-control w-50 mx-auto" placeholder="Search photos..." wire:model="search"
                wire:keyup="set('search', $event.target.value)">
            </th>
        </tr>
            <tr>
                <th>Title</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->title }}</td>
                    <td>
                        <img src="{{ $photo->url }}" alt="" width="80" class="rounded mx-auto d-block img-fluid img-thumbnail">
                    </td>
                    <td>
                        <button class="btn btn-success" wire:click="download('{{ $photo->filepath }}')">Download</button>
                        <button
                            wire:click="destroy('{{ $photo->id }}')"
                            wire:confirm="Are you sure want to delete this photo?"
                            class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">{{ $photos->links() }}</td>
        </tr>
        </tfoot>
    </table>
</div>
