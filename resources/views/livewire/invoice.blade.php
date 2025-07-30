<div>
    <form wire:submit="store">

        <div class="row">
            <div class="col-md-12">
                @session('success')
                <div class="alert alert-success">
                    {{ $value }}
                </div>
                @endsession
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-4">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" wire:model="name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        @foreach($items as $index => $item)
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        @if($loop->first)
                            <label for="item_name">Item Name</label>
                        @endif
                        <input type="text" id="item_name" class="form-control" placeholder="ex: item name" wire:model="items.{{ $index }}.item_name">
                        @error("items.{$index}.item_name")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        @if($loop->first)
                            <label for="item_price">Price</label>
                        @endif
                        <input type="number" id="item_price" class="form-control" placeholder="00.00" wire:model="items.{{ $index }}.item_price">
                        @error("items.{$index}.item_price")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-4">
                        @if($loop->first)
                            <label for="quantity">Quantity</label>
                        @endif
                        <input type="number" id="quantity" class="form-control" placeholder="00" wire:model="items.{{ $index }}.quantity">
                        @error("items.{$index}.quantity")
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    @if($loop->first)
                        <div class="form-group">
                            <label for="add_item">&nbsp;</label>
                            <button type="button" class="btn btn-primary form-control" wire:click="addItem">Add</button>
                        </div>
                    @else
                        <div class="form-group">
                            <button type="button" class="btn btn-danger form-control" wire:click="removeItem({{ $index }})">X</button>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <button class="btn btn-success" type="submit">Save</button>

    </form>
</div>

@script
<script>
    // ADDED IN APP.BLADE.PHP
    /*document.addEventListener("toast.success", function (event) {
        toastr.success(event.detail.message);
    });*/
</script>
@endscript
