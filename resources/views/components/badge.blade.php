@props([
    'backgroundColor' => 'bg-primary',
    'textColor' => 'text-light',
    'size' => 'sm'
])

@php
    $sizeBase = match($size) {
        'xs' => ' px-2 py-.5 text-xs ',
        'md' => ' px-3 py-1 text-base ',
        default => ' px-3 py-1 text-sm ',
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-full text-center $textColor $sizeBase $backgroundColor"]) }}>
    {{ $slot }}
</div>