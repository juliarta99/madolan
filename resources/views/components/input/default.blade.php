@props([
    'type' => 'text',
    'placeholder' => '',
    'name' => '',
    'value' => '',
    'disabled' => false,
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    placeholder="{{ $placeholder }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge([
        'class' => 'w-full md:px-3 md:py-1.5 lg:px-4 lg:py-2 py-2 py-1 text-xs md:text-sm lg:text-base rounded-sm md:rounded-md lg:rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400 transition-all'
    ]) }}
/>
