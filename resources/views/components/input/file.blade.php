@props([
    'name' => 'file',
    'preview' => null,
    'isPreview' => true,
    'accept' => 'image/jpeg,image/png,image/jpg',
    'note' => 'jpg, .jpeg, .png | maks. 500KB',
])

<div x-data="{
        fileName: 'No file chosen',
        previewUrl: '{{ $preview ? asset($preview) : '' }}',
        handleFileChange(event) {
            const file = event.target.files[0];
            this.fileName = file ? file.name : '';
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.previewUrl = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                this.previewUrl = '';
            }
        }
    }"
    class="space-y-1"
>
    @if ($isPreview)
        <div class="w-28 h-28 rounded-md border border-gray-300 bg-gray-100 flex items-center justify-center overflow-hidden">
            <template x-if="previewUrl">
                <img :src="previewUrl" class="object-cover w-full h-full" alt="Preview">
            </template>
            <template x-if="!previewUrl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06l-3.22-3.22V16.5a.75.75 0 0 1-1.5 0V4.81L8.03 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 15.75a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                </svg>
            </template>
        </div>
    @endif
    <input
        type="file"
        name="{{ $name }}"
        id="{{ $name }}"
        accept="{{ $accept }}"
        @change="handleFileChange"
        class="hidden"
    >

    <label for="{{ $name }}" class="flex items-center cursor-pointer">
        <div class="h-full w-full md:px-3 md:py-1.5 lg:px-4 lg:py-2 px-2 py-1 text-xs md:text-sm lg:text-base rounded-l-md rounded-r-none border border-r-0 bg-light text-black border-gray-300" x-text="fileName"></div>
        <div class="h-full p-1 rounded-r-md border border-l-0 bg-light border-gray-300">
            <div class="cursor-pointer px-4 py-1 bg-primary text-white rounded-md hover:bg-primary/90 transition">
                Choose
            </div>
        </div>
    </label>

    {{-- Note --}}
    <p class="text-xs text-gray-500 mt-1">{{ $note }}</p>
</div>
