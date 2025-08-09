@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" href="{{ asset('libs/ckeditor5/ckeditor5.css') }}" />
@endsection

@section('content')
    <x-header-with-back route="{{ route('dashboard.learning.pembelajaran') }}" titleInSpan="Pembelajaran" />

    <form action="" method="POST" class="!font-plus-jakarta-sans">
        @csrf
        
        <div class="mb-4">
            <x-label :isRequired="true" for="title">Judul</x-label>
            <x-input.default placeholder="Masukkan judul pembelajaran" name="title"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="category">Kategori</x-label>
            <x-input.select 
                name="category"
                :options="[
                    '' => 'Pilih..',
                    'Marketing' => 'Marketing',
                    'Sales' => 'Sales'
                    ]"
            />
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="description">Deskripsi Singkat</x-label>
            <x-input.default placeholder="Masukkan deskripsi singkat untuk pembelajaran ini" name="description"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="content">Isi Pembelajaran</x-label>
            <textarea name="content" id="content" cols="30" rows="10" class="textarea-with-ck-editor" placeholder="Masukkan isi pembelajaran anda"></textarea>
        </div>
        
        <div class="mb-4">
            <x-label :isRequired="true" for="cover">Cover</x-label>
            <x-input.file name="cover" />
        </div>

        <div x-data="keywordForm()" class="mb-4">
            <x-label :isRequired="true">Kata Kunci</x-label>
            <div class="space-y-4">
                <div class="">
                    <template x-for="(keyword, index) in keywords" :key="index">
                        <div class="relative flex gap-4">
                            <div class="mb-2 w-full">
                                <x-input.default
                                    type="text"
                                    x-bind:name="`keywords[${index}][name]`"
                                    placeholder="Masukkan kata kunci"
                                    class="w-full"
                                    x-model="keyword.name"
                                />
                            </div>
                            <button
                                type="button"
                                class="text-red-500 text-sm hover:underline bg-light flex items-center gap-2 p-2 cursor-pointer"
                                x-show="index !== 0"
                                @click="removeKeyword(index)"
                            >
                                <img src="{{ asset('assets/icons/trash.svg') }}" class="w-4 shrink-0" alt="">
                                <span>Hapus</span>
                            </button>
                        </div>
                    </template>
                    <span class="text-gray-500 text-sm">maks. 5 kata kunci</span>
                </div>
                <template x-if="keywords.length < 5">
                    <button type="button"
                        @click="addKeyword"
                        class="w-full bg-gray-50 border border-dashed border-gray-400 text-gray-700 py-2 rounded-md hover:bg-gray-200 transition flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </template>
            </div>
        </div>

        <div x-data="linksForm()" class="mb-4">
            <x-label>Link Pendukung</x-label>
            <div class="space-y-4">
                <div class="">
                    <template x-for="(link, index) in links" :key="index">
                        <div class="relative flex gap-4">
                            <div class="grid grid-cols-2 gap-4 w-full">
                                <div class="mb-2 w-full">
                                    <x-input.default
                                        type="text"
                                        x-bind:name="`links[${index}][name]`"
                                        placeholder="Masukkan nama atau label link"
                                        class="w-full"
                                        x-model="link.name"
                                    />
                                </div>
                                <div class="mb-2 w-full">
                                    <x-input.default
                                        type="text"
                                        x-bind:name="`links[${index}][link]`"
                                        placeholder="Masukkan link"
                                        class="w-full"
                                        x-model="link.link"
                                    />
                                </div>
                            </div>
                            <button
                                type="button"
                                class="text-red-500 text-sm hover:underline bg-light flex items-center gap-2 p-2 cursor-pointer"
                                x-show="index !== 0"
                                @click="removeLink(index)"
                            >
                                <img src="{{ asset('assets/icons/trash.svg') }}" class="w-4 shrink-0" alt="">
                                <span>Hapus</span>
                            </button>
                        </div>
                    </template>
                </div>

                <button type="button"
                    @click="addLink"
                    class="w-full bg-gray-50 border border-dashed border-gray-400 text-gray-700 py-2 rounded-md hover:bg-gray-200 transition flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="status">Status</x-label>
            <x-input.switch 
                name="status" 
                :checked="true"
            />
        </div>

        <div class="grid grid-cols-2 gap-2">
            <x-button.default 
                variant="danger"
                class="w-full"
            >
                Batal
            </x-button.default>
            <x-button.default 
                class="w-full"
            >
                Simpan
            </x-button.default>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('libs/ckeditor.js') }}"></script>

    <script>
        function keywordForm() {
            return {
                keywords: [
                    { name: '' }
                ],
                addKeyword() {
                    if (this.keywords.length < 5) {
                        this.keywords.push({ name: '' });
                    }
                },
                removeKeyword(index) {
                    if (index === 0) return;
                    this.keywords.splice(index, 1);
                }
            }
        }

        function linksForm() {
            return {
                links: [
                    { name: '', link: '' }
                ],
                addLink() {
                    this.links.push({ name: '', link: '' });
                },
                removeLink(index) {
                    if (index === 0) return;
                    this.links.splice(index, 1);
                }
            }
        }
    </script>
@endsection