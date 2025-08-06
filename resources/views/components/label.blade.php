@props([
    'isRequired' => false
])

<label {{ $attributes->merge(['class' => 'block text-sm md:text-base font-semibold mb-1']) }}>
    {{ $slot }}
    @if ($isRequired)
        <span class="text-danger">*</span>
    @endif
</label>