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
                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
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
        <div class="h-full w-full px-3 py-2 lg:px-4 lg:py-2 text-sm lg:text-base rounded-l-md rounded-r-none border border-r-0 bg-light text-black border-gray-300" x-text="fileName"></div>
        <div class="h-full p-1 rounded-r-md border border-l-0 bg-light border-gray-300">
            <div class="text-sm lg:text-base cursor-pointer px-4 py-1 bg-primary text-white rounded-md hover:bg-primary/90 transition">
                Choose
            </div>
        </div>
    </label>
    
    {{-- Note --}}
    <p class="text-xs text-gray-500 mt-1">{{ $note }}</p>
</div>
