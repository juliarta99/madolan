@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Kategori Produk</h1>
    <div x-data="{ openNotification: true  }" x-transition.opacity x-cloak x-show="openNotification" class="bg-warning p-4 rounded-md mb-4 flex gap-4 justify-between items-center">
        <p class="text-sm md:text-base">
            Stok Kopi Bubuk tersisa 4 pcs dan 3 item lainnya juga menipis. Segera lakukan restok sebelum kehabisan.
        </p>
        <button 
            @click="openNotification = false" 
            class="text-gray-800 hover:text-dark cursor-pointer"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div x-data="{
            formOpen: false,
            confirmDelete: false,
            editMode: false,
            modalTitle: 'Tambah Kategori Produk',
            categoryId: null,
            categoryName: 'Kopi',
            categoryType: 'Barang',
            editFormAction() {
                const form = document.getElementById('form');
                if (this.editMode && this.categoryId) {
                    form.action = '/dashboard/product/kategori/' + this.categoryId;
                    let methodInput = form.querySelector('input[name=_method]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        form.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';
                } else {
                    form.action = '/dashboard/product/kategori';
                    const methodInput = form.querySelector('input[name=_method]');
                    if (methodInput) {
                        methodInput.remove();
                    }
                }
            },
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = '/dashboard/product/kategori/' + this.categoryId;
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
                        <form 
                            {{-- tambahkan untuk bisa filter --}}
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
                                    class="text-gray-800 hover:text-dark cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
    
                            <div class="my-6 space-y-2">
                                <div class="">
                                    <x-label for="sort_by">Status</x-label>
                                    <x-input.select
                                        name="status"
                                        :options="[
                                            'belum lunas' => 'Belum Lunas',
                                            'lunas & belum diterima' => 'Lunas & Belum Diterima',
                                            'lunas' => 'Lunas',
                                        ]"
                                    />
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="">
                                        <x-label for="sort_by">Dari Tanggal</x-label>
                                        <x-input.default type="date"
                                            name="start-date"
                                        />
                                    </div>
                                    <div class="">
                                        <x-label for="sort_by">Sampai Tanggal</x-label>
                                        <x-input.default type="date"
                                            name="until-date"
                                        />
                                    </div>
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
                        </form>
                    </div>
                </div>
                <x-form.search 
                    name="search"
                    placeholder="Search kategori produk"
                    class="w-full"
                />
            </div>
            <x-button.icon
                @click="formOpen = true;
                    modalTitle='Tambah Kategori Produk';
                    editMode=false;
                    categoryId=null;
                    categoryName = '';
                    categoryType = '';
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
                            <th class="px-4 py-2 text-left w-[20%]">Pembeli</th>
                            <th class="px-4 py-2 text-left">Untuk Tanggal</th>
                            <th class="px-4 py-2 text-left">Subtotal</th>
                            <th class="px-4 py-2 text-left">Kasir</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody class="text-gray-700">
                        @for ($i = 0; $i<10; $i++)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2 max-w-[200px] overflow-x-hidden text-ellipsis whitespace-nowrap">Nurhayatijnjssxhsbxjhqsbxjbjsxjhxbwx</td>
                                <td class="px-4 py-2">05/07/2035</td>
                                <td class="px-4 py-2">Rp 120000</td>
                                <td class="px-4 py-2">Nyoman rai</td>
                                <td class="px-4 py-2 "><span class="bg-danger px-2 py-1 rounded-sm text-white">Bellum lunas</span></td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <button 
                                            @click="formOpen = true;
                                                modalTitle='Edit Kategori Produk'; 
                                                editMode=false;
                                                categoryId = 21;
                                                categoryName = 'Susu';
                                                categoryType = 'barang';"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path d="M9.91797 16.4167H12.0846V9.91666H9.91797V16.4167ZM11.0013 7.74999C11.3082 7.74999 11.5657 7.64599 11.7737 7.43799C11.9817 7.22999 12.0854 6.97288 12.0846 6.66666C12.0839 6.36043 11.9799 6.10332 11.7726 5.89532C11.5654 5.68732 11.3082 5.58332 11.0013 5.58332C10.6944 5.58332 10.4372 5.68732 10.23 5.89532C10.0227 6.10332 9.91869 6.36043 9.91797 6.66666C9.91725 6.97288 10.0212 7.23035 10.23 7.43907C10.4387 7.6478 10.6958 7.75143 11.0013 7.74999ZM11.0013 21.8333C9.50269 21.8333 8.09436 21.5488 6.7763 20.9797C5.45825 20.4105 4.31172 19.6389 3.33672 18.6646C2.36172 17.6903 1.59003 16.5438 1.02164 15.225C0.453248 13.9062 0.168692 12.4979 0.16797 11C0.167248 9.5021 0.451804 8.09377 1.02164 6.77499C1.59147 5.45621 2.36316 4.30968 3.33672 3.33541C4.31028 2.36113 5.4568 1.58943 6.7763 1.02032C8.0958 0.451212 9.50414 0.166656 11.0013 0.166656C12.4985 0.166656 13.9068 0.451212 15.2263 1.02032C16.5458 1.58943 17.6923 2.36113 18.6659 3.33541C19.6394 4.30968 20.4115 5.45621 20.9821 6.77499C21.5526 8.09377 21.8368 9.5021 21.8346 11C21.8325 12.4979 21.5479 13.9062 20.981 15.225C20.414 16.5438 19.6423 17.6903 18.6659 18.6646C17.6894 19.6389 16.5429 20.4109 15.2263 20.9807C13.9097 21.5506 12.5014 21.8348 11.0013 21.8333ZM11.0013 19.6667C13.4207 19.6667 15.4701 18.8271 17.1492 17.1479C18.8284 15.4687 19.668 13.4194 19.668 11C19.668 8.58055 18.8284 6.53124 17.1492 4.85207C15.4701 3.17291 13.4207 2.33332 11.0013 2.33332C8.58186 2.33332 6.53255 3.17291 4.85339 4.85207C3.17422 6.53124 2.33464 8.58055 2.33464 11C2.33464 13.4194 3.17422 15.4687 4.85339 17.1479C6.53255 18.8271 8.58186 19.6667 11.0013 19.6667Z" fill="#2F80ED"/>
                                            </svg>
                                        </button>
                                        <button 
                                            @click="confirmDelete = true;
                                                categoryId = 21;
                                                categoryName = 'Susu';
                                                deleteFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                            <path d="M14 5V2H6V5H4V0H16V5H14ZM16 9.5C16.2833 9.5 16.521 9.404 16.713 9.212C16.905 9.02 17.0007 8.78267 17 8.5C16.9993 8.21733 16.9033 7.98 16.712 7.788C16.5207 7.596 16.2833 7.5 16 7.5C15.7167 7.5 15.4793 7.596 15.288 7.788C15.0967 7.98 15.0007 8.21733 15 8.5C14.9993 8.78267 15.0953 9.02033 15.288 9.213C15.4807 9.40567 15.718 9.50133 16 9.5ZM14 16V12H6V16H14ZM16 18H4V14H0V8C0 7.15 0.291667 6.43767 0.875 5.863C1.45833 5.28833 2.16667 5.00067 3 5H17C17.85 5 18.5627 5.28767 19.138 5.863C19.7133 6.43833 20.0007 7.15067 20 8V14H16V18ZM18 12V8C18 7.71667 17.904 7.47933 17.712 7.288C17.52 7.09667 17.2827 7.00067 17 7H3C2.71667 7 2.47933 7.096 2.288 7.288C2.09667 7.48 2.00067 7.71733 2 8V12H4V10H16V12H18Z" fill="#27AE60"/>
                                            </svg>
                                    
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
                                <x-label :isRequired="true">Tipe</x-label>
                                <div class="items-center flex gap-4">
                                    <div class="items-center flex gap-2">
                                        <input type="radio" class="cursor-pointer" name="type" id="type-barang" value="barang" x-model="categoryType">
                                        <x-label class="!mb-0 cursor-pointer !font-normal" for="type-barang">Barang</x-label>
                                    </div>
                                    <div class="items-center flex gap-2">
                                        <input type="radio" class="cursor-pointer" name="type" id="type-jasa" value="jasa" x-model="categoryType">
                                        <x-label class="!mb-0 cursor-pointer !font-normal" for="type-jasa">Jasa</x-label>
                                    </div>
                                </div>
                            </div>
    
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