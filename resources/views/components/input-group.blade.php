@props([
    'fieldLabel' => null,
    'fieldName' => null,
    'fieldType' => null,
])
<div>
    <x-label for="{{ $fieldName }}">{{ __($fieldLabel) }}</x-label>

    <div class="mt-1">
        <x-input
            wire:model.debounce.500ms="{{ $fieldName }}"
            id="{{ $fieldName }}"
            type="{{ $fieldType }}"
            autocomplete="{{ $fieldName }}"
            placeholder="Enter Username"
         />

        {{-- @error('{{ $fieldName }}') --}}
        <span class="text-red-500">asd</span>
        {{-- @enderror --}}
    </div>
</div>
