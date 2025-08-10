@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Kategori Belajar</h1>
    <div x-data="{
            formOpen: {{ $errors->any() ? 'true' : 'false' }},
            confirmDelete: false,
            editMode: {{ old('_method') === 'PUT' ? 'true' : 'false' }},
            modalTitle: '{{ old('_method') === 'PUT' ? 'Edit Kategori Belajar' : 'Tambah Kategori Belajar' }}',
            categoryId: {{ session('edit_category_id') ?? 'null' }},
            categoryName: '{{ old('name', '') }}',
            errors: {},
            editFormAction() {
                const form = document.getElementById('form');
                if (this.editMode && this.categoryId) {
                    form.action = '{{ route('admin.dashboard.learning.category') }}/' + this.categoryId;
                    let methodInput = form.querySelector('input[name=_method]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        form.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';
                } else {
                    form.action = '{{ route('admin.dashboard.learning.category.store') }}';
                    const methodInput = form.querySelector('input[name=_method]');
                    if (methodInput) {
                        methodInput.remove();
                    }
                }
            },
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = '{{ route('admin.dashboard.learning.category') }}/' + this.categoryId;
            },
            resetForm() {
                this.categoryName = '';
                this.errors = {};
            },
            init() {
                @if($errors->any())
                    this.editFormAction();
                @endif
            }
        }">

        <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex gap-2 items-center w-full md:w-auto">
                <div x-data="{ openFilter: false }">
                    <x-button.icon variant="accent" @click="openFilter = true">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6 fill-light">
                                <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clip-rule="evenodd" />
                            </svg>
                        </x-slot:icon>
                        Filter
                    </x-button.icon>
    
                    <!-- Filter Modal -->
                    <div 
                        x-show="openFilter" 
                        x-transition.opacity 
                        x-cloak 
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
                    >
                        <div 
                            x-show="openFilter" 
                            x-transition 
                            @click.away="openFilter = false" 
                            class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
                        >
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold">Filter Kategori Belajar</h2>
                                <button 
                                    @click="openFilter = false" 
                                    class="text-gray-800 hover:text-dark cursor-pointer"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
    
                            <form method="GET" action="{{ route('admin.dashboard.learning.category') }}">
                                <div class="my-6 space-y-2">
                                    <div>
                                        <x-label for="sort_by">Sorting Dari</x-label>
                                        <x-input.select 
                                            name="sort_by"
                                            :options="[
                                                'terbaru' => 'Terbaru',
                                                'terlama' => 'Terlama',
                                            ]"
                                            :value="request('sort_by')"
                                        />
                                    </div>
                                </div>
    
                                <input type="hidden" name="search" value="{{ request('search') }}">
    
                                <div class="grid grid-cols-2 gap-2">
                                    <x-button.default 
                                        variant="danger"
                                        @click="openFilter = false"
                                        type="button"
                                        class="w-full"
                                    >
                                        Batal
                                    </x-button.default>
                                    <x-button.default 
                                        type="submit"
                                        class="w-full"
                                    >
                                        Terapkan
                                    </x-button.default>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <form method="GET" action="{{ route('admin.dashboard.learning.category') }}" class="flex w-full">
                    <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    <x-form.search 
                        name="search"
                        placeholder="Search kategori belajar"
                        class="w-full"
                        value="{{ request('search') }}"
                    />
                </form>
            </div>

            <x-button.icon
                @click="formOpen = true;
                    modalTitle='Tambah Kategori Belajar';
                    editMode=false;
                    categoryId=null;
                    resetForm();
                    editFormAction()"
                class="w-full md:w-max"
            >
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-light size-6">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                </x-slot:icon>
                Tambah
            </x-button.icon>
        </div>
    
        <div class="mt-4">
            <div class="overflow-x-auto bg-light shadow-xl rounded-lg">
                <table class="w-full table-auto text-sm">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th class="px-4 py-2 text-left w-[50px]">No</th>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Banyak Forum</th>
                            <th class="px-4 py-2 text-left">Banyak Learning Resource</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <tbody class="text-gray-700">
                        @forelse ($categories as $index => $category)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">{{ $categories->firstItem() + $index }}</td>
                                <td class="px-4 py-2">{{ $category->name }}</td>
                                <td class="px-4 py-2">{{ $category->forums_count ?? 0 }}</td>
                                <td class="px-4 py-2">{{ $category->learning_resources_count ?? 0 }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <button 
                                            @click="formOpen = true;
                                                modalTitle='Edit Kategori Belajar'; 
                                                editMode=true;
                                                categoryId = {{ $category->id }};
                                                categoryName = '{{ $category->name }}';
                                                resetForm();
                                                editFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center hover:opacity-70 transition"
                                            title="Edit"
                                        >
                                            <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="Edit">
                                        </button>
                                        <button 
                                            @click="confirmDelete = true;
                                                categoryId = {{ $category->id }};
                                                categoryName = '{{ $category->name }}';
                                                deleteFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center hover:opacity-70 transition"
                                            title="Hapus"
                                        >
                                            <img src="{{ asset('assets/icons/trash.svg') }}" class="w-6 min-w-6" alt="Hapus">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                    @if(request('search'))
                                        Tidak ada kategori yang ditemukan untuk pencarian "{{ request('search') }}"
                                    @else
                                        Belum ada kategori belajar
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
    
                @if($categories->hasPages())
                    <div class="flex justify-between items-center bg-secondary text-light px-4 py-2">
                        <p class="text-sm">
                            Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} results
                        </p>
                        <div class="flex rounded-lg overflow-hidden">
                            @if($categories->onFirstPage())
                                <span class="bg-gray-600 px-4 py-2 cursor-not-allowed opacity-50">&lt;</span>
                            @else
                                <a href="{{ $categories->previousPageUrl() }}" class="bg-gray-800 px-4 py-2 hover:bg-gray-700">&lt;</a>
                            @endif

                            @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                @if($page == $categories->currentPage())
                                    <span class="bg-primary px-4 py-2">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="bg-gray-800 px-4 py-2 hover:bg-gray-700">{{ $page }}</a>
                                @endif
                            @endforeach

                            @if($categories->hasMorePages())
                                <a href="{{ $categories->nextPageUrl() }}" class="bg-gray-800 px-4 py-2 hover:bg-gray-700">&gt;</a>
                            @else
                                <span class="bg-gray-600 px-4 py-2 cursor-not-allowed opacity-50">&gt;</span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Form Modal --}}
        <div 
            x-show="formOpen" 
            x-transition.opacity 
            x-cloak 
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        >
            <div 
                x-show="formOpen" 
                x-transition 
                @click.away="formOpen = false" 
                class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
            >
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold" x-text="modalTitle"></h2>
                    <button 
                        @click="formOpen = false" 
                        class="text-gray-800 hover:text-dark cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="" method="POST" id="form" class="mt-6">
                    @csrf

                    <div class="mb-4">
                        <x-label :isRequired="true" for="name">Nama Kategori</x-label>
                        <x-input.default 
                            placeholder="Masukkan nama kategori" 
                            x-model="categoryName" 
                            name="name"
                            class="{{ $errors->has('name') ? 'border-danger focus:border-danger' : '' }}"
                        />
                        @error('name')
                            <p class="text-danger text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-2">
                        <x-button.default 
                            variant="danger"
                            @click="formOpen = false"
                            type="button"
                            class="w-full"
                        >
                            Batal
                        </x-button.default>
                        <x-button.default 
                            type="submit"
                            class="w-full"
                        >
                            <span x-text="editMode ? 'Update' : 'Simpan'"></span>
                        </x-button.default>
                    </div>
                </form>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div 
            x-show="confirmDelete" 
            x-transition.opacity 
            x-cloak 
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        >
            <div 
                x-show="confirmDelete" 
                x-transition 
                @click.away="confirmDelete = false" 
                class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
            >
                <form action="" method="POST" id="form-delete" class="mt-6">
                    @csrf
                    @method("DELETE")
                    
                    <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">
                        Apakah anda yakin 
                        <span class="text-danger">menghapus kategori 
                            <span x-text="categoryName" class="font-bold"></span>
                        </span> ini?
                    </h1>
                    
                    <p class="text-sm text-gray-600 text-center mt-2">
                        Tindakan ini tidak dapat dibatalkan.
                    </p>

                    <div class="mt-6 grid grid-cols-2 gap-2">
                        <x-button.default 
                            variant="danger"
                            @click="confirmDelete = false"
                            type="button"
                            class="w-full"
                        >
                            Batal
                        </x-button.default>
                        <x-button.default 
                            type="submit"
                            class="w-full"
                        >
                            Ya, Hapus
                        </x-button.default>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Remove the separate script since we handle it in x-data initialization --}}
@endsection