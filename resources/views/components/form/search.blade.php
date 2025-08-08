@props([
    'placeholder' => 'Search transaksi',
    'styleInput' => '',
    'styleButton' => '',
    'styleIcon' => '',
])

<form {{ $attributes->merge(['class' => 'flex justify-start items-center']) }}>
    <x-input.default 
        type="text" 
        placeholder="{{ $placeholder }}" 
        class="rounded-tl-md rounded-bl-md !rounded-tr-none !rounded-br-none w-full max-w-full {{ $styleInput }}"
        {{ $attributes->only(['wire:model', 'wire:model.lazy', 'name', 'value', 'id']) }}
    />

    <button 
        type="submit" 
        class="rounded-tr-md rounded-br-md hover:bg-secondary transition-all duration-200 bg-primary px-3 py-1.5 lg:px-4 lg:py-2 border border-primary cursor-pointer {{ $styleButton }}"
        {{ $attributes->only(['wire:click', 'wire:submit.prevent']) }}
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 lg:size-6 fill-light {{ $styleIcon }}">
            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
        </svg>
    </button>
</form>