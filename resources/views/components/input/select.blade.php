@props([
    'name' => '',
    'options' => [
        '1' => "Pilihan 1",
        '2' => "Pilihan 2",
        '3' => "Pilihan 3",
    ],
    'selected' => ''
])

<select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $attributes->merge([
        'class' => 'w-full md:px-3 md:py-1.5 lg:px-4 lg:py-2 px-2 py-1 text-xs md:text-sm lg:text-base rounded-sm md:rounded-md lg:rounded-lg border bg-light text-black border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400 transition-all'
    ]) }}
>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" @selected($value == $selected)>{{ $label }}</option>
    @endforeach
</select>