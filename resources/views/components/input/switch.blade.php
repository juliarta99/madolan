@props([
    'name' => 'status',
    'checked' => true,
    'activeLabel' => 'Aktif',
    'inactiveLabel' => 'Tidak Aktif',
])

<div
    x-data="{ on: @js($checked) }"
    class="inline-flex items-center cursor-pointer select-none"
>
    <input type="hidden" name="{{ $name }}" :value="on ? 1 : 0">
    
    <div
        class="relative flex w-[200px] h-max rounded-md transition-all"
        :class="on ? 'bg-primary' : 'bg-danger'"
        @click="on = !on"
    >
        <div class="w-1/2 h-full flex items-center justify-center text-sm p-2 font-medium text-light transition-all"
             :class="on ? 'opacity-100' : 'opacity-50'">
            {{ $activeLabel }}
        </div>
        <div class="w-1/2 h-full flex items-center justify-center text-sm p-2 font-medium text-light transition-all"
             :class="!on ? 'opacity-100' : 'opacity-50'">
            {{ $inactiveLabel }}
        </div>

        <div class="absolute top-0 left-0 w-1/2 h-full bg-gray-300 shadow-md transition-all"
             :class="on ? 'translate-x-full rounded-r-md' : 'translate-x-0 rounded-l-md'">
        </div>
    </div>
</div>