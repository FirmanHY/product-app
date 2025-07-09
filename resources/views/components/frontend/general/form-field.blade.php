@props([
    'label',
    'name',
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
    'required' => true,
])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }} @if ($required)
            <span>*</span>
        @endif
    </label>
    <input type="{{ $type }}" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        @if ($required) required @endif class="form-control"
        aria-describedby="{{ $name }}-error">
    @error($name)
        <span class="text-danger"
            id="{{ $name }}-error">{{ $message }}</span>
    @enderror
</div>
