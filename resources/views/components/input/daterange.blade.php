@props([
    'startName' => 'start_date',
    'endName' => 'end_date',
    'startModel' => null,
    'endModel' => null,
    'required' => false,
    'bold' => false,
    'maxDate' => \Carbon\Carbon::now()->format('Y-m-d'),
])

<div class="flex flex-col md:flex-row gap-2">
    <div class="flex flex-col w-full">
        <x-label for="{{ $startName }}" class="@if (!$bold) !font-normal @endif">Dari Tanggal</x-label>
        <input 
            type="date" 
            name="{{ $startName }}"
            id="{{ $startName }}"
            max="{{ $maxDate }}"
            @if($startModel)
                wire:model="{{ $startModel }}"
            @else
                value="{{ old($startName, request($startName)) }}"
            @endif
            :required="{{ $required ? 'true' : 'false' }}"
            class="w-full px-3 py-1.5 lg:px-4 lg:py-2 text-sm lg:text-base rounded-sm md:rounded-md lg:rounded-lg border bg-light text-black border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400 transition-all disabled:bg-gray-300"
        >
    </div>

    <div class="flex flex-col w-full">
        <x-label for="{{ $endName }}" class="@if (!$bold) !font-normal @endif">Sampai Tanggal</x-label>
        <input 
            type="date" 
            name="{{ $endName }}"
            id="{{ $endName }}"
            max="{{ $maxDate }}"
            @if($endModel)
                wire:model="{{ $endModel }}"
            @else
                value="{{ old($endName, request($endName)) }}"
            @endif
            :required="{{ $required ? 'true' : 'false' }}"
            class="w-full px-3 py-1.5 lg:px-4 lg:py-2 text-sm lg:text-base rounded-sm md:rounded-md lg:rounded-lg border bg-light text-black border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400 transition-all disabled:bg-gray-300"
        >
    </div>
</div>