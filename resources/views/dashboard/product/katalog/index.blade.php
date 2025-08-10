@extends('layouts.dashboard')

@section('content')
@php
    $role = 'admin'
@endphp
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Katalog Produk</h1>
    
    {{-- Low Stock Notification --}}
    @if ($role == 'umkm' && $lowStockItems > 0)
        <div x-data="{ openNotification: true }" x-transition.opacity x-cloak x-show="openNotification" class="bg-warning p-4 rounded-md mb-4 flex gap-4 justify-between items-center">
            <p class="text-sm md:text-base">
                Ada {{ $lowStockItems }} item yang stoknya menipis (≤ 5). Segera lakukan restok sebelum kehabisan.
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
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Filter and Search Section --}}
    <form method="GET" action="{{ route('dashboard.product.katalog') }}">
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
                                    <select name="sort_by" class="w-full border border-gray-300 rounded-md px-3 py-2">
                                        <option value="terbaru" {{ request('sort_by') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                        <option value="terlama" {{ request('sort_by') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="type">Tipe</x-label>
                                    <select name="type" class="w-full border border-gray-300 rounded-md px-3 py-2">
                                        <option value="">Semua Tipe</option>
                                        <option value="barang" {{ request('type') == 'barang' ? 'selected' : '' }}>Barang</option>
                                        <option value="jasa" {{ request('type') == 'jasa' ? 'selected' : '' }}>Jasa</option>
                                    </select>
                                </div>

                                <div>
                                    <x-label for="category">Kategori</x-label>
                                    <select name="category" class="w-full border border-gray-300 rounded-md px-3 py-2">
                                        <option value="">Semua Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <x-label for="status">Status</x-label>
                                    <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2">
                                        <option value="">Semua Status</option>
                                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="grid grid-cols-2 gap-2">
                                <x-button.default 
                                    variant="danger"
                                    type="button"
                                    @click="openFilter = false"
                                    class="w-full"
                                >
                                    Batal
                                </x-button.default>
                                <x-button.default 
                                    type="submit"
                                    @click="openFilter = false"
                                    class="w-full"
                                >
                                    Terapkan
                                </x-button.default>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Search Form --}}
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari nama produk atau barcode..." 
                    class="border border-gray-300 rounded-md px-3 py-2 w-full md:w-64"
                />
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">
                    Cari
                </button>
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
    </form>

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
                        if(this.productId) {
                            const formEditStock = document.getElementById('form-edit-stock');
                            formEditStock.action = '{{ url('dashboard/product/katalog/stock') }}/' + this.productId;
                        }
                    },
                    editStatusFormAction() {
                        if(this.productId) {
                            const formEditStatus = document.getElementById('form-edit-status');
                            formEditStatus.action = '{{ url('dashboard/product/katalog/status') }}/' + this.productId;
                        }
                    },
                    deleteFormAction() {
                        if(this.productId) {
                            const formDelete = document.getElementById('form-delete');
                            formDelete.action = '{{ url('dashboard/product/katalog') }}/' + this.productId;
                        }
                    },
                    init() {
                        this.$nextTick(() => {
                            if (typeof JsBarcode !== 'undefined' && this.productBarcode) {
                                JsBarcode('#productBarcodeCanvas', this.productBarcode, {
                                    format: 'CODE128',
                                    displayValue: true
                                });
                            }
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
                <!-- Desktop Table -->
                <table class="w-full table-auto text-sm">
                    <thead class="bg-secondary text-light w-full">
                        <tr>
                            <th class="px-4 py-2 text-left">Image</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Harga</th>
                            <th class="px-4 py-2 text-left">Stok</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <tbody class="text-gray-700 w-full">
                        @forelse($products as $product)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">
                                    <img 
                                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/image-default.png') }}" 
                                        alt="{{ $product->name }}" 
                                        class="w-[150px] min-w-[75px] min-h-[50px] h-[100px] object-cover rounded-lg"
                                    >
                                </td>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->category->name ?? '-' }}</td>
                                <td class="px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">
                                    @if($product->is_unlimited)
                                        <span class="text-green-600 font-semibold">Unlimited</span>
                                    @else
                                        {{ $product->stock }} {{ $product->unit }}
                                        @if($product->stock <= 5)
                                            <span class="text-red-500 text-xs">(Stok Rendah)</span>
                                        @endif
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    @if($product->status)
                                        <x-badge backgroundColor="bg-success">Aktif</x-badge>
                                    @else
                                        <x-badge backgroundColor="bg-danger">Tidak Aktif</x-badge>
                                    @endif
                                </td>
                                <td class="px-4 py-2 w-max">
                                    <div class="flex gap-3 items-center">
                                        {{-- Toggle Status --}}
                                        <button 
                                            @click="confirmEditStatus = true;
                                                productName = '{{ $product->name }}';
                                                productId = {{ $product->id }};
                                                productShow = {{ $product->status ? 1 : 0 }};
                                                editStatusFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                            title="{{ $product->status ? 'Sembunyikan' : 'Tampilkan' }}"
                                        >
                                            @if($product->status)
                                                <img src="{{ asset('assets/icons/eye_color.svg') }}" class="w-6 min-w-6" alt="">
                                            @else
                                                <svg width="24" height="24" class="size-6 fill-danger" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.544 2.95501C4.33074 2.75629 4.04867 2.64811 3.75722 2.65325C3.46577 2.65839 3.18769 2.77646 2.98157 2.98258C2.77545 3.1887 2.65738 3.46678 2.65224 3.75823C2.6471 4.04968 2.75528 4.33175 2.954 4.54501L4.199 5.79001C2.71125 7.00767 1.52964 8.55711 0.749004 10.314L0.359004 11.1915C0.245924 11.4463 0.1875 11.722 0.1875 12.0008C0.1875 12.2795 0.245924 12.5552 0.359004 12.81L0.749004 13.6875C1.44042 15.2419 2.44638 16.6361 3.70344 17.7823C4.96051 18.9285 6.44142 19.8019 8.05281 20.3473C9.6642 20.8927 11.3711 21.0983 13.0659 20.9512C14.7607 20.8041 16.4067 20.3074 17.9 19.4925L19.454 21.045C19.557 21.1555 19.6812 21.2442 19.8192 21.3057C19.9572 21.3672 20.1062 21.4002 20.2572 21.4029C20.4083 21.4056 20.5583 21.3778 20.6984 21.3212C20.8385 21.2646 20.9657 21.1804 21.0726 21.0736C21.1794 20.9667 21.2636 20.8395 21.3202 20.6994C21.3768 20.5593 21.4046 20.4093 21.4019 20.2582C21.3992 20.1072 21.3662 19.9582 21.3047 19.8202C21.2432 19.6822 21.1545 19.558 21.044 19.455L4.544 2.95501ZM16.226 17.817L14.285 15.8775C13.4255 16.3855 12.4214 16.5931 11.4309 16.4678C10.4403 16.3425 9.51961 15.8914 8.81362 15.1854C8.10763 14.4794 7.65648 13.5587 7.53118 12.5682C7.40588 11.5776 7.61355 10.5736 8.1215 9.71401L5.798 7.39051C4.50052 8.40532 3.47235 9.72349 2.804 11.229L2.4605 12L2.8055 12.7725C3.34776 13.9914 4.12692 15.0904 5.09769 16.0054C6.06846 16.9205 7.21146 17.6335 8.46024 18.1029C9.70901 18.5723 11.0386 18.7887 12.3718 18.7396C13.705 18.6906 15.0151 18.3769 16.226 17.817ZM9.824 11.4165C9.7219 11.7984 9.72206 12.2004 9.82447 12.5822C9.92688 12.964 10.1279 13.3121 10.4074 13.5916C10.6869 13.8711 11.0351 14.0721 11.4168 14.1745C11.7986 14.277 12.2006 14.2771 12.5825 14.175L9.824 11.4165ZM12.311 7.51051L16.487 11.6865C16.4115 10.6039 15.9473 9.58502 15.1799 8.81763C14.4125 8.05024 13.3936 7.58602 12.311 7.51051ZM21.191 12.7725C20.8338 13.5774 20.3723 14.3319 19.8185 15.0165L21.416 16.6155C22.1617 15.7306 22.7788 14.7449 23.249 13.6875L23.639 12.81C23.7523 12.555 23.8108 12.2791 23.8108 12C23.8108 11.721 23.7523 11.445 23.639 11.19L23.249 10.314C22.0239 7.56024 19.8315 5.35134 17.0869 4.10568C14.3424 2.86002 11.2363 2.6641 8.357 3.55501L10.214 5.41501C12.431 5.01583 14.7178 5.37191 16.7085 6.42626C18.6991 7.4806 20.2786 9.17227 21.194 11.2305L21.536 12.0015L21.191 12.7725Z"/>
                                                </svg>
                                            @endif
                                        </button>

                                        {{-- Edit Stock (only for non-unlimited products) --}}
                                        @if(!$product->is_unlimited)
                                            <button
                                                @click="editStock = true;
                                                    productName = '{{ $product->name }}';
                                                    productStock = {{ $product->stock }};
                                                    productUnit = '{{ $product->unit }}';
                                                    productId = {{ $product->id }};
                                                    editStockFormAction();"
                                                type="button" 
                                                class="cursor-pointer h-full flex items-center"
                                                title="Edit Stok"
                                            >
                                                <img src="{{ asset('assets/icons/stockout.svg') }}" class="w-6 min-w-6" alt="">
                                            </button>
                                        @endif

                                        {{-- Product Detail --}}
                                        <button 
                                            @click="
                                                detailProduct = true;
                                                productId = {{ $product->id }};
                                                productStock = {{ $product->stock }};
                                                productUnit = '{{ addslashes($product->unit) }}';
                                                productName = '{{ addslashes($product->name) }}';
                                                productImage = '{{ $product->image ? asset('storage/' . $product->image) : asset('assets/image-default.png') }}';
                                                productType = '{{ ucfirst($product->category->type ?? 'barang') }}';
                                                productCategory = '{{ $product->category->name ?? '-' }}';
                                                productPrice = 'Rp {{ number_format($product->price, 0, ',', '.') }}';
                                                productBarcode = '{{ $product->barcode }}';
                                                productShow = {{ $product->status ? 'true' : 'false' }};
                                                $nextTick(() => {
                                                    if (typeof JsBarcode !== 'undefined') {
                                                        JsBarcode('#productBarcodeCanvas', '{{ $product->barcode }}', {
                                                            format: 'CODE128',
                                                            displayValue: true,
                                                            width: 2,
                                                            height: 50
                                                        });
                                                    }
                                                });
                                            "
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                            title="Detail Produk"
                                        >
                                            <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>

                                        {{-- Edit Product --}}
                                        <a href="{{ route('dashboard.product.katalog.edit', $product->id) }}" class="cursor-pointer h-full flex items-center" title="Edit Produk">
                                            <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                        </a>

                                        {{-- Delete Product --}}
                                        <button 
                                            @click="confirmDelete = true;
                                                productName = '{{ $product->name }}';
                                                productId = {{ $product->id }};
                                                deleteFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                            title="Hapus Produk"
                                        >
                                            <img src="{{ asset('assets/icons/trash.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-8 text-gray-500">
                                    Tidak ada produk yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Mobile View --}}
            <div class="md:hidden space-y-4">
                @forelse($products as $product)
                    <div class="p-4 bg-white rounded-lg border border-gray-300 shadow-lg">
                        <div class="flex gap-4">
                            <img 
                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/image-default.png') }}" 
                                alt="{{ $product->name }}" 
                                class="w-[150px] min-w-[75px] min-h-[50px] h-[100px] object-cover rounded-lg"
                            >
                            <div class="flex flex-col gap-2 w-full">
                                <div class="flex w-full justify-between gap-2 items-center">
                                    <h1 class="text-sm md:text-base">{{ $product->name }}</h1>
                                    <button 
                                        @click="detailProduct = true;
                                            productId = {{ $product->id }};
                                            productStock = {{ $product->stock }};
                                            productUnit = '{{ $product->unit }}';
                                            productName = '{{ $product->name }}';
                                            productImage = '{{ $product->image ? asset('storage/' . $product->image) : asset('assets/image-default.png') }}';
                                            productType = '{{ ucfirst($product->category->type ?? 'barang') }}';
                                            productCategory = '{{ $product->category->name ?? '-' }}';
                                            productPrice = 'Rp {{ number_format($product->price, 0, ',', '.') }}';
                                            productBarcode = '{{ $product->barcode }}';
                                            productShow = {{ $product->status }};
                                            $nextTick(() => {
                                                if (typeof JsBarcode !== 'undefined') {
                                                    JsBarcode('#productBarcodeCanvas', '{{ $product->barcode }}', {
                                                        format: 'CODE128',
                                                        displayValue: true,
                                                        width: 2,
                                                        height: 50
                                                    });
                                                }
                                            });"
                                        type="button" 
                                        class="cursor-pointer h-full flex items-center"
                                    >
                                        <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                                    </button>
                                </div>
                                <h2 class="text-base md:text-lg font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                                <div class="flex flex-wrap gap-2">
                                    @if($product->status)
                                        <x-badge backgroundColor="bg-success">Aktif</x-badge>
                                    @else
                                        <x-badge backgroundColor="bg-danger">Tidak Aktif</x-badge>
                                    @endif
                                    <x-badge>{{ $product->category->name ?? '-' }}</x-badge>
                                    @if($product->is_unlimited)
                                        <x-badge backgroundColor="bg-info">Unlimited</x-badge>
                                    @elseif($product->stock <= 5)
                                        <x-badge backgroundColor="bg-warning">Stok Rendah</x-badge>
                                    @endif
                                </div>
                                <div class="flex gap-3 items-center">
                                    {{-- Actions for mobile --}}
                                    <button 
                                        @click="confirmEditStatus = true;
                                            productName = '{{ $product->name }}';
                                            productId = {{ $product->id }};
                                            productShow = {{ $product->status ? 1 : 0 }};
                                            editStatusFormAction();"
                                        type="button" 
                                        class="cursor-pointer h-full flex items-center"
                                    >
                                        @if($product->status == 1)
                                            <img src="{{ asset('assets/icons/eye_color.svg') }}" class="w-6 min-w-6" alt="">
                                        @else
                                            <svg width="24" height="24" class="size-6 fill-danger" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.544 2.95501C4.33074 2.75629 4.04867 2.64811 3.75722 2.65325C3.46577 2.65839 3.18769 2.77646 2.98157 2.98258C2.77545 3.1887 2.65738 3.46678 2.65224 3.75823C2.6471 4.04968 2.75528 4.33175 2.954 4.54501L4.199 5.79001C2.71125 7.00767 1.52964 8.55711 0.749004 10.314L0.359004 11.1915C0.245924 11.4463 0.1875 11.722 0.1875 12.0008C0.1875 12.2795 0.245924 12.5552 0.359004 12.81L0.749004 13.6875C1.44042 15.2419 2.44638 16.6361 3.70344 17.7823C4.96051 18.9285 6.44142 19.8019 8.05281 20.3473C9.6642 20.8927 11.3711 21.0983 13.0659 20.9512C14.7607 20.8041 16.4067 20.3074 17.9 19.4925L19.454 21.045C19.557 21.1555 19.6812 21.2442 19.8192 21.3057C19.9572 21.3672 20.1062 21.4002 20.2572 21.4029C20.4083 21.4056 20.5583 21.3778 20.6984 21.3212C20.8385 21.2646 20.9657 21.1804 21.0726 21.0736C21.1794 20.9667 21.2636 20.8395 21.3202 20.6994C21.3768 20.5593 21.4046 20.4093 21.4019 20.2582C21.3992 20.1072 21.3662 19.9582 21.3047 19.8202C21.2432 19.6822 21.1545 19.558 21.044 19.455L4.544 2.95501ZM16.226 17.817L14.285 15.8775C13.4255 16.3855 12.4214 16.5931 11.4309 16.4678C10.4403 16.3425 9.51961 15.8914 8.81362 15.1854C8.10763 14.4794 7.65648 13.5587 7.53118 12.5682C7.40588 11.5776 7.61355 10.5736 8.1215 9.71401L5.798 7.39051C4.50052 8.40532 3.47235 9.72349 2.804 11.229L2.4605 12L2.8055 12.7725C3.34776 13.9914 4.12692 15.0904 5.09769 16.0054C6.06846 16.9205 7.21146 17.6335 8.46024 18.1029C9.70901 18.5723 11.0386 18.7887 12.3718 18.7396C13.705 18.6906 15.0151 18.3769 16.226 17.817ZM9.824 11.4165C9.7219 11.7984 9.72206 12.2004 9.82447 12.5822C9.92688 12.964 10.1279 13.3121 10.4074 13.5916C10.6869 13.8711 11.0351 14.0721 11.4168 14.1745C11.7986 14.277 12.2006 14.2771 12.5825 14.175L9.824 11.4165ZM12.311 7.51051L16.487 11.6865C16.4115 10.6039 15.9473 9.58502 15.1799 8.81763C14.4125 8.05024 13.3936 7.58602 12.311 7.51051ZM21.191 12.7725C20.8338 13.5774 20.3723 14.3319 19.8185 15.0165L21.416 16.6155C22.1617 15.7306 22.7788 14.7449 23.249 13.6875L23.639 12.81C23.7523 12.555 23.8108 12.2791 23.8108 12C23.8108 11.721 23.7523 11.445 23.639 11.19L23.249 10.314C22.0239 7.56024 19.8315 5.35134 17.0869 4.10568C14.3424 2.86002 11.2363 2.6641 8.357 3.55501L10.214 5.41501C12.431 5.01583 14.7178 5.37191 16.7085 6.42626C18.6991 7.4806 20.2786 9.17227 21.194 11.2305L21.536 12.0015L21.191 12.7725Z"/>
                                                </svg>
                                        @endif
                                    </button>

                                    @if(!$product->is_unlimited)
                                        <button
                                            @click="editStock = true;
                                                productName = '{{ $product->name }}';
                                                productStock = {{ $product->stock }};
                                                productUnit = '{{ $product->unit }}';
                                                productId = {{ $product->id }};
                                                editStockFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/stockout.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                    @endif

                                    <a href="{{ route('dashboard.product.katalog.edit', $product->id) }}" class="cursor-pointer h-full flex items-center">
                                        <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                    </a>

                                    <button 
                                        @click="confirmDelete = true;
                                            productName = '{{ $product->name }}';
                                            productId = {{ $product->id }};
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
                @empty
                    <div class="text-center py-8 text-gray-500">
                        Tidak ada produk yang ditemukan.
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
                <div class="flex justify-between items-center bg-secondary text-light px-4 py-2 md:bg-transparent md:text-dark">
                    <p class="text-sm">
                        Menampilkan {{ $products->firstItem() }} sampai {{ $products->lastItem() }} dari {{ $products->total() }} hasil
                    </p>
                    <div class="flex rounded-lg overflow-hidden">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                            <span class="bg-gray-600 px-4 py-2 text-gray-400">&lt;</span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 text-white">&lt;</a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <span class="bg-primary px-4 py-2 text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 text-white">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 text-white">&gt;</a>
                        @else
                            <span class="bg-gray-600 px-4 py-2 text-gray-400">&gt;</span>
                        @endif
                    </div>
                </div>
            @endif

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
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-120 md:h-max shadow-lg max-h-screen overflow-y-auto"
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
                            <img :src="productImage" alt="Image" class="w-32 h-32 object-cover rounded-lg">
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
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
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
                            type="number"
                            min="0"
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
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
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
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-100 md:h-max shadow-lg"
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