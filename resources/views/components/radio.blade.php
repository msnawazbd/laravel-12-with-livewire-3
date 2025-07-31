@props(['name', 'label', 'model', 'id', 'value'])
<div class="form-check">
    <input class="form-check-input" type="radio" value="{{ $value }}" name="{{ $name }}" id="{{ $id }}" wire:model="{{ $model }}">
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
