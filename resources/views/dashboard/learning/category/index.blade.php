@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Kategori Belajar</h1>
    <div x-data="{
            formOpen: false,
            confirmDelete: false,
            editMode: false,
            modalTitle: 'Tambah Kategori Belajar',
            categoryId: null,
            categoryName: null,
            editFormAction() {
                const form = document.getElementById('form');
                if (this.editMode && this.categoryId) {
                    form.action = '/admin/dashboard/learning/kategori/' + this.categoryId;
                    let methodInput = form.querySelector('input[name=_method]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        form.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';
                } else {
                    form.action = '/admin/dashboard/learning/kategori';
                    const methodInput = form.querySelector('input[name=_method]');
                    if (methodInput) {
                        methodInput.remove();
                    }
                }
            },
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = '/admin/dashboard/learning/kategori/' + this.categoryId;
            },
        }">

        <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex gap-2 items-center">
                <div x-data="{ openFilter: false }">
                    <x-button.icon variant="accent" @click="openFilter = true">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6 fill-light">
                                <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clip-rule="evenodd" />
                            </svg>
                        </x-slot:icon>
                        Filter
                    </x-button.icon>
    
                    <!-- Modal -->
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
                            class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                        >
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold">Filter Kategori Produk</h2>
                                <button 
                                    @click="openFilter = false" 
                                    class="text-gray-800 hover:text-dark cursor-pointer"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
    
                            <div class="my-6 space-y-2">
                                <div>
                                    <x-label for="sort_by">Sorting Dari</x-label>
                                    <x-input.select 
                                        name="sort_by"
                                        :options="[
                                            'terbaru' => 'Terbaru',
                                            'terlama' => 'Terlama',
                                        ]"
                                    />
                                </div>
                            </div>
    
                            <!-- Modal Footer -->
                            <div class="grid grid-cols-2 gap-2">
                                <x-button.default 
                                    variant="danger"
                                    @click="openFilter = false"
                                    class="w-full"
                                >
                                    Batal
                                </x-button.default>
                                <x-button.default 
                                    @click="openFilter = false"
                                    class="w-full"
                                >
                                    Terapkan
                                </x-button.default>
                            </div>
                        </div>
                    </div>
                </div>
                <x-form.search 
                    name="search"
                    placeholder="Search kategori belajar"
                    class="w-full"
                />
            </div>
            <x-button.icon
                @click="formOpen = true;
                    modalTitle='Tambah Kategori Belajar';
                    editMode=false;
                    categoryId=null;
                    category=null;
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
            <div
                class="overflow-x-auto bg-light shadow-xl rounded-lg"
            >
                <!-- Table Header -->
                <table class="w-full table-auto text-sm">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th class="px-4 py-2 text-left w-[50px]">No</th>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Banyak Forum</th>
                            <th class="px-4 py-2 text-left">Banyak Pembelajaran</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody class="text-gray-700">
                        @for ($i = 0; $i<10; $i++)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">{{ $i+1 }}</td>
                                <td class="px-4 py-2">Manajemen Bisnis</td>
                                <td class="px-4 py-2">32</td>
                                <td class="px-4 py-2">12</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <button 
                                            @click="formOpen = true;
                                                modalTitle='Edit Kategori Belajar'; 
                                                editMode=true;
                                                categoryId = 21;
                                                categoryName = 'Manajemen Bisnis';"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button 
                                            @click="confirmDelete = true;
                                                categoryId = 21;
                                                categoryName = 'Manajemen Bisnis';
                                                deleteFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/trash.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
    
                <div class="flex justify-between items-center bg-secondary text-light px-4 py-2">
                    <p class="text-sm">
                        Showing 1 to 10 of 20 results
                    </p>
                    <div class="flex rounded-lg overflow-hidden">
                        <button class="bg-gray-800 px-4 py-2"> &lt; </button>
                        <button class="bg-primary px-4 py-2"> 1 </button>
                        <button class="bg-gray-800 px-4 py-2"> 2 </button>
                        <button class="bg-gray-800 px-4 py-2"> &gt; </button>
                    </div>
                </div>
    
                {{-- Modal Form --}}
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
                        class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                    >
                        <!-- Modal Header -->
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
                            @method("PUT")
    
                            <div class="mb-4">
                                <x-label :isRequired="true" for="name">Nama</x-label>
                                <x-input.default placeholder="Masukkan nama kategori" x-model="categoryName" name="name"></x-input.default>
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
                                    @click="formOpen = false"
                                    type="submit"
                                    class="w-full"
                                >
                                    Simpan
                                </x-button.default>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Modal Delete --}}
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
                        class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                    >
    
                        <form action="" method="POST" id="form-delete" class="mt-6">
                            @csrf
                            @method("DELETE")
                            
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menghapus (delete) kategori <span x-text="categoryName"></span></span> ini?</h1>
    
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
                                    @click="confirmDelete = false"
                                    type="submit"
                                    class="w-full"
                                >
                                    Yakin
                                </x-button.default>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection