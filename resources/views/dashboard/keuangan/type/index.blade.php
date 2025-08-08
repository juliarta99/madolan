@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Tipe Keuangan</h1>
    <div x-data="{
            formOpen: false,
            confirmDelete: false,
            editMode: false,
            modalTitle: 'Tambah Tipe Keuangan',
            typeId: null,
            typeName: 'Pemasukan',
            editFormAction() {
                const form = document.getElementById('form');
                if (this.editMode && this.typeId) {
                    form.action = '/admin/dashboard/keuangan/type/' + this.typeId;
                    let methodInput = form.querySelector('input[name=_method]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        form.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';
                } else {
                    form.action = '/admin/dashboard/keuangan/type';
                    const methodInput = form.querySelector('input[name=_method]');
                    if (methodInput) {
                        methodInput.remove();
                    }
                }
            },
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = 'admin/dashboard/keuangan/type/' + this.typeId;
            },
        }">

        <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex gap-2 items-center w-full">
                <x-form.search 
                    name="search"
                    placeholder="Search tipe keuangan"
                    class="w-full"
                />
            </div>
            <x-button.icon
                @click="formOpen = true;
                    modalTitle='Tambah Tipe Keuangan';
                    editMode=false;
                    typeId=null;
                    typeName = '';
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
                            <th class="px-4 py-2 text-left">Total Kategori</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody class="text-gray-700">
                        @for ($i = 0; $i<10; $i++)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">{{ $i+1 }}</td>
                                <td class="px-4 py-2">Pemasukan</td>
                                <td class="px-4 py-2">3</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <button 
                                            @click="formOpen = true;
                                                modalTitle='Edit Tipe Keuangan'; 
                                                editMode=false;
                                                typeId = 21;
                                                typeName = 'Pembukuan';"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button 
                                            @click="confirmDelete = true;
                                                typeId = 21;
                                                typeName = 'Pembukuan';
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
                                <x-input.default placeholder="Masukkan nama tipe" x-model="typeName" name="name"></x-input.default>
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
                            
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menghapus (delete) tipe <span x-text="typeName"></span></span> ini?</h1>
    
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