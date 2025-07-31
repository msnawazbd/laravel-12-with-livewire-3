@props(['name', 'label', 'placeholder', 'model', 'type' => 'text'])

<div class="form-group mb-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" class="form-control" wire:model="{{ $model }}" placeholder="{{ $placeholder }}">
    @error($model)
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
