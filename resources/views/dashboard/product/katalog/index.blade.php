@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Katalog Produk</h1>
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
                            <h2 class="text-xl font-semibold">Filter Katalog Produk</h2>
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

                            <div>
                                <x-label for="type">Tipe</x-label>
                                <x-input.select 
                                    name="type"
                                    :options="[
                                        '' => 'Pilih..',
                                        'Barang' => 'Barang',
                                        'Jasa' => 'Jasa'
                                    ]"
                                />
                            </div>

                            <div>
                                <x-label for="category">Kategori</x-label>
                                <x-input.select 
                                    name="category"
                                    :options="[
                                        '' => 'Pilih..',
                                        'Kopi' => 'Kopi',
                                        'Dimsum' => 'Dimsum'
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
                placeholder="Search katalog produk"
                class="w-full"
            />
        </div>
        <a href="{{ route('dashboard.product.katalog.create') }}" class="w-full md:w-max">
            <x-button.icon class="w-full md:w-max">
                <x-slot:icon>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-light size-6">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                </x-slot:icon>
                Tambah
            </x-button.icon>
        </a>
    </div>

    <div class="mt-4">
        <div
            x-data="{
                    editStock: false,
                    confirmEditStatus: false,
                    confirmDelete: false,
                    detailProduct: false,
                    productId: null,
                    productStock: 0,
                    productUnit: 'pcs',
                    productName: 'Product Name',
                    productImage: '{{ asset('assets/image-default.png') }}',
                    productType: 'Barang',
                    productCategory: 'Minuman',
                    productPrice: 'Rp 40.000',
                    productBarcode: 987418491,
                    productShow: 1,
                    editStockFormAction() {
                        const formEditStock = document.getElementById('form-edit-stock');
                        formEditStock.action = '/dashboard/product/katalog/update-stock/' + this.productId;
                    },
                    editStatusFormAction() {
                        const formEditStatus = document.getElementById('form-edit-status');
                        formEditStatus.action = '/dashboard/product/katalog/update-status/' + this.productId;
                    },
                    deleteFormAction() {
                        const formDelete = document.getElementById('form-delete');
                        formDelete.action = '/dashboard/product/katalog/' + this.productId;
                    },
                    init() {
                        this.$nextTick(() => {
                            JsBarcode('#productBarcodeCanvas', this.productBarcode, {
                                format: 'CODE128',
                                displayValue: true
                            });
                        });
                    },
                    downloadBarcode() {
                        const canvas = document.getElementById('productBarcodeCanvas');
                        const link = document.createElement('a');

                        link.href = canvas.toDataURL('image/png');
                        link.download = `barcode-${this.productBarcode}.png`;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }
                }"
            class="overflow-x-auto md:bg-light md:shadow-xl md:rounded-lg"
        >
            <div class="hidden md:block">
                <!-- Table Header -->
                <table class="w-full table-auto text-sm">
                    <thead class="bg-secondary text-light w-full">
                        <tr>
                            <th class="px-4 py-2 text-left">Image</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Harga</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody class="text-gray-700 w-full">
                        @for ($i = 0; $i<10; $i++)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">
                                    <img src="{{ asset('assets/image-default.png') }}" alt="Product Image" class="w-[150px] min-w-[75px] min-h-[50px] h-[100px] object-cover rounded-lg">
                                </td>
                                <td class="px-4 py-2">Kopi Bubuk Arabika 250g</td>
                                <td class="px-4 py-2">Kopi</td>
                                <td class="px-4 py-2">Rp 40.000</td>
                                <td class="px-4 py-2">
                                    <x-badge backgroundColor="bg-success">Aktif</x-badge>
                                </td>
                                <td class="px-4 py-2 w-max">
                                    <div class="flex gap-3 items-center">
                                        <button 
                                            @click="confirmEditStatus = true;
                                                productName = 'Kopi Bubuk';
                                                productId = 8;
                                                productShow = 1;
                                                editStatusFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/eye_color.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button
                                            @click="editStock = true;
                                                productName = 'Kopi Bubuk';
                                                productStock = 3;
                                                productUnit = 'Barang';
                                                productId = 8;
                                                editStockFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/stockout.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button 
                                            @click="detailProduct = true;
                                                productId = 21;
                                                productStock = 10;
                                                productUnit = 'pcs';
                                                productName = 'Susu JAHE';
                                                productImage = '{{ asset('assets/logo.svg') }}';
                                                productType = 'Jasa';
                                                productCategory = 'Makanan';
                                                productPrice = 'Rp 90.000';
                                                productBarcode = 84032432423;
                                                productShow = 1;"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button type="button" class="cursor-pointer h-full flex items-center">
                                            <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        <button 
                                            @click="confirmDelete = true;
                                                productName = 'Kopi Bubuk';
                                                productId = 8;
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
            </div>

            <div class="hidden md:flex justify-between items-center bg-secondary text-light px-4 py-2">
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

            {{-- mobile --}}
            <div class="p-4 block md:hidden rounded-lg border border-gray-300 shadow-lg">
                <div class="flex gap-4">
                    <img src="{{ asset('assets/image-default.png') }}" alt="Product Image" class="w-[150px] min-w-[75px] min-h-[50px] h-[100px] object-cover rounded-lg">
                    <div class="flex flex-col gap-2 w-full">
                        <div class="flex w-full justify-between gap-2 items-center">
                            <h1 class="text-sm md:text-base">Kopi Bubuk</h1>
                            <button 
                                @click="detailProduct = true;
                                    productId = 21;
                                    productStock = 10;
                                    productUnit = 'pcs';
                                    productName = 'Susu JAHE';
                                    productImage = '{{ asset('assets/logo.svg') }}';
                                    productType = 'Jasa';
                                    productCategory = 'Makanan';
                                    productPrice = 'Rp 90.000';
                                    productBarcode = 84032432423;
                                    productShow = 1;"
                                type="button" 
                                class="cursor-pointer h-full flex items-center"
                            >
                                <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                            </button>
                        </div>
                        <h2 class="text-base md:text-lg font-semibold">Rp 40.000</h2>
                        <div class="flex flex-wrap gap-2">
                            <x-badge backgroundColor="bg-success">Aktif</x-badge>
                            <x-badge>Kopi</x-badge>
                        </div>
                        <div class="flex gap-3 items-center">
                            <button 
                                @click="confirmEditStatus = true;
                                    productName = 'Kopi Bubuk';
                                    productId = 8;
                                    productShow = 1;
                                    editStatusFormAction();"
                                type="button" 
                                class="cursor-pointer h-full flex items-center"
                            >
                                <img src="{{ asset('assets/icons/eye_color.svg') }}" class="w-6 min-w-6" alt="">
                            </button>
                            <button
                                @click="editStock = true;
                                    productName = 'Kopi Bubuk';
                                    productStock = 3;
                                    productUnit = 'Barang';
                                    productId = 8;
                                    editStockFormAction();"
                                type="button" 
                                class="cursor-pointer h-full flex items-center"
                            >
                                <img src="{{ asset('assets/icons/stockout.svg') }}" class="w-6 min-w-6" alt="">
                            </button>
                            <button type="button" class="cursor-pointer h-full flex items-center">
                                <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                            </button>
                            <button 
                                @click="confirmDelete = true;
                                    productName = 'Kopi Bubuk';
                                    productId = 8;
                                    deleteFormAction();"
                                type="button" 
                                class="cursor-pointer h-full flex items-center"
                            >
                                <img src="{{ asset('assets/icons/trash.svg') }}" class="w-6 min-w-6" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex md:hidden justify-between items-center bg-transparent text-dark px-4 py-2">
                <p class="text-sm">
                    Showing 1 to 10 of 20 results
                </p>
                <div class="flex w-max">
                    <button class="bg-light border border-gray-500 px-4 py-2 rounded-l-lg"> &lt; </button>
                    <button class="bg-primary text-light border border-gray-500 px-4 py-2"> 1 </button>
                    <button class="bg-light border border-gray-500 px-4 py-2"> 2 </button>
                    <button class="bg-light border border-gray-500 px-4 py-2 rounded-r-lg"> &gt; </button>
                </div>
            </div>

            {{-- Modal Detail --}}
            <div 
                x-show="detailProduct" 
                x-transition.opacity 
                x-cloak 
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            >
                <div 
                    x-show="detailProduct" 
                    x-transition 
                    @click.away="detailProduct = false" 
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-120 md:h-max shadow-lg"
                >
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Detail Produk</h2>
                        <button 
                            @click="detailProduct = false" 
                            class="text-gray-800 hover:text-dark cursor-pointer"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col gap-4 mt-6">
                        <div class="flex gap-4">
                            <img :src="productImage" alt="Image" class="w-32 h-32 object-cover">
                            <div class="flex flex-col gap-1">
                                <div class="flex gap-2 flex-wrap">
                                    <h1 x-text="productName" class="text-lg font-semibold"></h1>
                                    <template x-if="productShow == 1">
                                        <x-badge backgroundColor="bg-success">Aktif</x-badge>
                                    </template>
                                    <template x-if="productShow == 0">
                                        <x-badge backgroundColor="bg-danger">Tidak Aktif</x-badge>
                                    </template>
                                </div>
                                <div class="flex gap-2 flex-wrap">
                                    <x-badge x-text="productType"></x-badge>
                                    <x-badge x-text="productCategory" backgroundColor="bg-secondary"></x-badge>
                                </div>
                                <div class="flex gap-2 items-center my-1">
                                    <img src="{{ asset('assets/icons/products_accent.svg') }}" class="w-6" alt="">
                                    <span x-text="productStock" class="text-accent text-sm md:text-base font-semibold"></span>
                                    <span x-text="productUnit" class="text-accent text-sm md:text-base font-semibold"></span>
                                </div>
                                <h2 class="text-xl font-bold" x-text="productPrice"></h2>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <canvas id="productBarcodeCanvas"></canvas>
                        </div>
                        <x-button.default @click="downloadBarcode">Download Barcode</x-button.default>
                    </div>
                </div>
            </div>
            {{-- Modal Edit Stock --}}
            <div 
                x-show="editStock" 
                x-transition.opacity 
                x-cloak 
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            >
                <div 
                    x-show="editStock" 
                    x-transition 
                    @click.away="editStock = false" 
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                >
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold">Edit Stock</h2>
                        <button 
                            @click="editStock = false" 
                            class="text-gray-800 hover:text-dark cursor-pointer"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form action="" method="POST" id="form-edit-stock" class="mt-6">
                        @csrf
                        @method("PUT")
                        
                        <p x-text="productName" class="font-semibold"></p>
                        <div class="flex gap-2 items-center mb-4">
                            <img src="{{ asset('assets/icons/products_accent.svg') }}" class="w-6" alt="">
                            <span x-text="productStock" class="text-accent text-sm md:text-base font-semibold"></span>
                            <span x-text="productUnit" class="text-accent text-sm md:text-base font-semibold"></span>
                        </div>

                        <x-label :isRequired="true" for="stock">Stock Saat Ini</x-label>
                        <x-input.default 
                            placeholder="Masukkan stock saat ini"
                            name="stock"
                            id="stock"
                            x-model="productStock"
                        />

                        <div class="mt-6 grid grid-cols-2 gap-2">
                            <x-button.default 
                                variant="danger"
                                @click="editStock = false"
                                type="button"
                                class="w-full"
                            >
                                Batal
                            </x-button.default>
                            <x-button.default 
                                @click="editStock = false"
                                type="submit"
                                class="w-full"
                            >
                                Terapkan
                            </x-button.default>
                        </div>
                    </form>
                </div>
            </div>
            {{-- Modal Edit Status --}}
            <div 
                x-show="confirmEditStatus" 
                x-transition.opacity 
                x-cloak 
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            >
                <div 
                    x-show="confirmEditStatus" 
                    x-transition 
                    @click.away="confirmEditStatus = false" 
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                >

                    <form action="" method="POST" id="form-edit-status" class="mt-6">
                        @csrf
                        @method("PUT")
                        
                        <template x-if="productShow == 0">
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-primary">menampilkan (publish) produk <span x-text="productName"></span></span> ini?</h1>
                        </template>
                        <template x-if="productShow == 1">
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-accent">menyembunyikan (hidden) produk <span x-text="productName"></span></span>  ini?</h1>
                        </template>

                        <div class="mt-6 grid grid-cols-2 gap-2">
                            <x-button.default 
                                variant="danger"
                                @click="confirmEditStatus = false"
                                type="button"
                                class="w-full"
                            >
                                Batal
                            </x-button.default>
                            <x-button.default 
                                @click="confirmEditStatus = false"
                                type="submit"
                                class="w-full"
                            >
                                Yakin
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
                        
                        <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menghapus (delete) produk <span x-text="productName"></span></span> ini?</h1>

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
@endsection

@section('scripts')
    <script src="{{ asset('libs/JsBarcode.all.min.js') }}"></script>
@endsection