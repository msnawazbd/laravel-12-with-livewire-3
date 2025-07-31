@props(['options', 'name', 'label', 'placeholder', 'model'])
<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <select id="{{ $name }}" class="form-control select2-single" wire:model="{{ $model }}">
        <option value="" selected>{{ $placeholder }}</option>
        @foreach($options as $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach

    </select>
    @error($model)
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>


@script

<script>
    {{-- Select 2 --}}
    document.addEventListener("livewire:initialized", function () {
        console.log('select2')

        function loadJavaScript() {
            $('.select2-single').select2({
                placeholder: "{{ $placeholder }}",
                allowClear: true
            }).on('change', function () {
                $wire.set("{{ $model }}", $(this).val());
            });
        }

        loadJavaScript();

        Livewire.hook("morphed", () => {
            loadJavaScript();
        });
    });
</script>

@endscript
