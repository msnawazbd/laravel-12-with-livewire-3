<div wire:init="loadCategories">

    @session('success')
    <div class="alert alert-success">
        {{ $value }}
    </div>
    @endsession

    <form wire:submit="store">

        <x-select name="category" label="Category" placeholder="Select Category" model="category" :options="$categories" />
        <x-input name="name" label="Name" placeholder="ex: json doe" model="name" />
        <x-input type="number" name="price" label="Price" placeholder="00.00" model="price" />
        <x-date-input name="published_date" label="Published Date" format="dd-mm-yyyy" model="published_date"  />

        <div class="form-group my-3">
            <label for="status">Status</label>
            <x-radio name="status" model="status" id="active" value="1" label="Active" />
            <x-radio name="status" model="status" id="inactive" value="0" label="Inactive" />
            @error('status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="vendors">Vendors</label>
            <x-checkbox id="vendor_1" value="vendor_1" label="Vendor 1" model="vendors" />
            <x-checkbox id="vendor_2" value="vendor_2" label="Vendor 2" model="vendors" />
            <x-checkbox id="vendor_3" value="vendor_3" label="Vendor 3" model="vendors" />
            @error('vendors')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <x-textarea name="description" label="Description" model="description" />

        <button class="btn btn-danger" wire:click.prevent="resetForm">Reset</button>
        <button class="btn btn-success" type="submit" wire:loading.attr="disabled">Save</button>

    </form>
</div>
