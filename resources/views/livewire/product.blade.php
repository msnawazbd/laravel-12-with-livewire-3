<div wire:init="loadCategories">

    @session('success')
    <div class="alert alert-success">
        {{ $value }}
    </div>
    @endsession

    <form wire:submit="store">
        <div class="form-group mb-4">
            <label for="category">Category</label>
            <select id="category" class="form-control select2-single" wire:model="category">
                <option value="" selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
            @error('category')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" wire:model="name">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" class="form-control" wire:model="price">
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="text" id="published_date" class="form-control" wire:model="published_date">
            @error('published_date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="status">Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="radioDefault" id="active" wire:model="status">
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="radioDefault" id="inactive" wire:model="status">
                <label class="form-check-label" for="inactive">
                    Inactive
                </label>
            </div>
            @error('status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="vendors">Vendors</label>
            <div class="form-check">
                <input class="form-check-input" wire:model="vendors" type="checkbox" id="vendor_1" value="vendor_1">
                <label class="form-check-label" for="vendor_1">
                    Vendor 1
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" wire:model="vendors" type="checkbox" id="vendor_2" value="vendor_2">
                <label class="form-check-label" for="vendor_2">
                    Vendor 2
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" wire:model="vendors" type="checkbox" id="vendor_3" value="vendor_3">
                <label class="form-check-label" for="vendor_3">
                    Vendor 3
                </label>
            </div>
            @error('vendors')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" wire:model="description"></textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-danger" wire:click.prevent="resetForm">Reset</button>
        <button class="btn btn-success" type="submit" wire:loading.attr="disabled">Save</button>

        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on left">
            Tooltip on left
        </button>

        <div wire:loading>
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Loading_2.gif" alt="Loading..." width="30px">Product Saving..
        </div>

    </form>
</div>

@script

<script>
    {{-- Select 2 --}}
    document.addEventListener("livewire:initialized", function () {
        console.log('select2')

        function loadJavaScript() {
            $('.select2-single').select2({
                placeholder: "Select Category",
                allowClear: true
            }).on('change', function () {
                $wire.set("category", $(this).val());
            });
        }

        loadJavaScript();

        Livewire.hook("morphed", () => {
            loadJavaScript();
        });
    });

    {{-- Datepicker --}}
    $('#published_date').datepicker({
        format: 'dd-mm-yyyy'
    }).on("changeDate", function (e) {
        @this.
        set('published_date', e.format(0, 'dd-mm-yyyy'));
    });

</script>

@endscript
