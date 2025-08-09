@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Tipe Pendanaan</h1>

    <div 
        x-data="{
            formOpen: false,
            confirmDelete: false,
            editMode: false,
            modalTitle: 'Tambah Tipe Pendanaan',
            typeId: null,
            typeName: '',
            editFormAction() {
                const form = document.getElementById('form');
                if (this.editMode && this.typeId) {
                    form.action = '{{ url('admin/dashboard/pendanaan/type') }}/' + this.typeId;
                    let methodInput = form.querySelector('input[name=_method]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        form.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';
                } else {
                    form.action = '{{ route('admin.dashboard.pendanaan.type.store') }}';
                    const methodInput = form.querySelector('input[name=_method]');
                    if (methodInput) methodInput.remove();
                }
            },
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = '{{ url('admin/dashboard/pendanaan/type') }}/' + this.typeId;
            },
        }"
    >

        <!-- Search & Add Button -->
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex gap-2 items-center w-full">
                <x-form.search 
                    name="search"
                    placeholder="Search tipe pendanaan"
                    class="w-full"
                    :value="request('search')"
                />
            </div>
            <x-button.icon
                @click="formOpen = true;
                    modalTitle='Tambah Tipe Pendanaan';
                    editMode=false;
                    typeId=null;
                    typeName='';
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
    
        <!-- Table -->
        <div class="mt-4">
            <div class="overflow-x-auto bg-light shadow-xl rounded-lg">
                <table class="w-full table-auto text-sm">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th class="px-4 py-2 text-left w-[50px]">No</th>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Total Informasi Pendanaan</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($fundingTypes as $index => $type)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">{{ $fundingTypes->firstItem() + $index }}</td>
                                <td class="px-4 py-2">{{ $type->name }}</td>
                                <td class="px-4 py-2">{{ $type->fundings_count ?? 0 }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <button 
                                            @click="formOpen = true;
                                                modalTitle='Edit Tipe Pendanaan'; 
                                                editMode=true;
                                                typeId={{ $type->id }};
                                                typeName='{{ $type->name }}';
                                                editFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button 
                                            @click="confirmDelete = true;
                                                typeId={{ $type->id }};
                                                typeName='{{ $type->name }}';
                                                deleteFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/trash.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                    Tidak ada data
                                    @if (request('search'))
                                        dengan keyword {{ request('search') }}
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="flex justify-between items-center bg-secondary text-light px-4 py-2">
                    <p class="text-sm">
                        Menampilkan {{ $fundingTypes->firstItem() }} sampai {{ $fundingTypes->lastItem() }} dari {{ $fundingTypes->total() }} data
                    </p>
                    {{ $fundingTypes->links() }}
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
                        class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
                    >
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold" x-text="modalTitle"></h2>
                            <button @click="formOpen = false" class="text-gray-800 hover:text-dark cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <form action="" method="POST" id="form" class="mt-6">
                            @csrf
                            <div class="mb-4">
                                <x-label :isRequired="true" for="name">Nama</x-label>
                                <x-input.default placeholder="Masukkan nama tipe" x-model="typeName" name="name"></x-input.default>
                            </div>
                            <div class="mt-6 grid grid-cols-2 gap-2">
                                <x-button.default variant="danger" @click="formOpen = false" type="button" class="w-full">
                                    Batal
                                </x-button.default>
                                <x-button.default type="submit" class="w-full">
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
                        class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
                    >
                        <form action="" method="POST" id="form-delete" class="mt-6">
                            @csrf
                            @method("DELETE")
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">
                                Apakah anda yakin <span class="text-danger">menghapus tipe <span x-text="typeName"></span></span> ini?
                            </h1>
                            <div class="mt-6 grid grid-cols-2 gap-2">
                                <x-button.default variant="danger" @click="confirmDelete = false" type="button" class="w-full">
                                    Batal
                                </x-button.default>
                                <x-button.default type="submit" class="w-full">
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