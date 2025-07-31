@props(['label', 'model', 'id', 'value'])
<div class="form-check">
    <input class="form-check-input" wire:model="{{ $model }}" type="checkbox" id="{{ $id }}" value="{{ $value }}">
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
