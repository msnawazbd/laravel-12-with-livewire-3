<div>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" wire:model="product.name">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" class="form-control" wire:model="product.price">
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" wire:model="product.description"></textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
</div>
