@props(['label', 'model', 'name'])

<div class="form-group mb-3">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ $name }}" class="form-control" wire:model="{{ $model }}"></textarea>
    @error($model)
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
