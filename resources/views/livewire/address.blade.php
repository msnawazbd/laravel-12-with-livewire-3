<div>
    <form wire:submit="store">

        <div class="form-group mb-4">
            <label for="country_id">Country</label>
            <select id="country_id" class="form-control select2-country" wire:model="country_id">
                <option></option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
            @error('country_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="city_id">City</label>
            <select id="city_id" class="form-control select2-city" wire:model="city_id">
                <option></option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                @endforeach
            </select>
            @error('city_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="state_id">State</label>
            <select id="state_id" class="form-control select2-state" wire:model="state_id">
                <option></option>
                @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                @endforeach
            </select>
            @error('state_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <button class="btn btn-success" type="submit">Save</button>

    </form>
</div>

@script
<script>
    document.addEventListener("livewire:initialized", function () {
        console.log('select2')

        function loadJavaScript() {
            $('.select2-country').select2({
                placeholder: "Select Country",
                allowClear: true
            }).on('change', function () {
                $wire.set("country_id", $(this).val());
                $wire.dispatch('change-country');
            });

            $('.select2-city').select2({
                placeholder: "Select City",
                allowClear: true
            }).on('change', function () {
                $wire.set("city_id", $(this).val());
                $wire.dispatch('change-city');
            });

            $('.select2-state').select2({
                placeholder: "Select State",
                allowClear: true
            }).on('change', function () {
                $wire.set("state_id", $(this).val());
            });
        }

        loadJavaScript();

        Livewire.hook("morphed", () => {
            loadJavaScript();
        });
    });
</script>
@endscript
