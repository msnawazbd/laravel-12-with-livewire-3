@props(['name', 'label', 'model', 'type' => 'text', 'format' => 'dd-mm-yyyy'])

<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" class="form-control" wire:model="{{ $model }}" placeholder="{{ $format }}" autocomplete="off">
    @error($model)
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

@script

<script>

    $('#{{ $name }}').datepicker({
        format: "{{ $format }}"
    }).on("changeDate", function (e) {
        @this.
        set('{{ $name }}', e.format(0, "{{ $format }}"));
    });

</script>

@endscript
