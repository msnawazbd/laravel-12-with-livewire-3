<div>
    <form wire:submit="store">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" wire:model="name" wire:dirty.class="is-invalid" wire:dirty.class.remove="is-valid">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" wire:model="email" wire:dirty.class="is-invalid" wire:dirty.class.remove="is-valid">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-success" type="submit" wire:loading.attr="disabled" wire:dirty.attr.remove="disabled" disabled>Save</button>

        <div wire:dirty>
            Unsaved Data..
        </div>

    </form>
</div>
