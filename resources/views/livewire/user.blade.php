<div wire:init="loadCategories">
    <form wire:submit="store">
        <div class="form-group mb-4">
            <label for="category">Category</label>
            <select id="category" class="form-control select2-multiple" multiple="multiple" wire:model="category">
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

        <div class="form-group mb-4">
            <div class="form-check">
                <input class="form-check-input" wire:model.live="is_admin" type="checkbox" id="is_admin" value="is_admin">
                <label class="form-check-label" for="is_admin">
                    Is Admin ?
                </label>
            </div>
        </div>

        @if($is_admin)
        <div class="form-group mb-4" wire:transition.origin.right.duration.500ms>
            <label for="reason">Reason</label>
            <input type="text" id="reason" class="form-control" wire:model="reason">
            @error('reason')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        @endif

        <button class="btn btn-success" type="submit" wire:loading.attr="disabled" wire:dirty.attr.remove="disabled" disabled>Save</button>

        <div wire:dirty>
            Unsaved Data..
        </div>

    </form>
</div>

@script
<script>
    document.addEventListener("livewire:initialized", function () {
        console.log('select2')

        function loadJavaScript() {
            $('.select2-multiple').select2({
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
</script>
@endscript
