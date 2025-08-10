@props([
    'route' => '#',
    'titleBeforeSpan' => 'Tambah',
    'titleInSpan' => ''
])

<div class="flex gap-4 items-center mb-4">
    <a href="{{ $route }}" class="h-max">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 md:size-7 lg:size-8">
            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
        </svg>
    </a>
    <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-semibold">{{ $titleBeforeSpan }} <span class="text-primary">{{ $titleInSpan }}</span></h1>
</div>