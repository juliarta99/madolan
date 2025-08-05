@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $base = 'inline-flex items-center justify-center font-medium focus:outline-none transition-all disabled:opacity-50 disabled:cursor-not-allowed transition-all cursor-pointer px-2 py-1 text-xs rounded-xs md:px-3 md:py-1.5 md:text-sm md:rounded-sm lg:px-6 lg:py-2 lg:text-base lg:rounded-md';

    $variantBase = match($variant) {
        'secondary' => 'border-2 border-secondary bg-secondary text-light hover:bg-primary hover:border-primary',
        'accent' => 'border-2 border-accent bg-accent text-light hover:bg-primary hover:border-primary',
        'dark' => 'border-2 border-dark bg-dark text-light hover:bg-primary hover:border-primary',
        'light' => 'border-2 border-light bg-light text-dark hover:bg-gray-50 hover:border-gray-50',
        default => "border-2 border-primary bg-primary text-light hover:bg-secondary hover:border-secondary",
    };

    $class = "$base $variantBase";
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</button>
