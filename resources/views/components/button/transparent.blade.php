@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $base = 'inline-flex items-center justify-center font-medium focus:outline-none transition-all disabled:opacity-50 disabled:cursor-not-allowed transition-all cursor-pointer px-2 py-1 text-xs rounded-xs md:px-3 md:py-1.5 md:text-sm md:rounded-sm lg:px-6 lg:py-2 lg:text-base lg:rounded-md';

    $variantBase = match($variant) {
        'secondary' => "border-2 border-secondary text-secondary hover:bg-secondary hover:text-light",
        'accent' => "border-2 border-accent text-accent hover:bg-accent hover:text-light",
        'dark' => "border-2 border-dark text-dark hover:bg-dark hover:text-light",
        'light' => "border-2 border-light text-light hover:bg-light hover:text-dark",
        'success' => 'border-2 border-success text-success hover:bg-success hover:text-light',
        'danger' => 'border-2 border-danger text-danger hover:bg-danger hover:text-light',
        'warning' => 'border-2 border-warning  text-warning hover:bg-warning hover:text-light',
        default => "border-2 border-primary text-primary hover:bg-primary hover:text-light",
    };

    $class = "$base $variantBase";
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</button>
