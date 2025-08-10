@extends('layouts.dashboard')

@section('content')
    <x-header-with-back route="{{ route('dashboard.product.katalog') }}" titleInSpan="Produk" />

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.product.katalog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Product Type --}}
        <div class="mb-4">
            <x-label :isRequired="true">Tipe</x-label>
            <div class="items-center flex gap-4">
                <div class="items-center flex gap-2">
                    <input 
                        type="radio" 
                        class="cursor-pointer" 
                        name="type" 
                        id="type-barang" 
                        value="barang"
                        {{ old('type') == 'barang' ? 'checked' : '' }}
                    >
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="type-barang">Barang</x-label>
                </div>
                <div class="items-center flex gap-2">
                    <input 
                        type="radio" 
                        class="cursor-pointer" 
                        name="type" 
                        id="type-jasa" 
                        value="jasa"
                        {{ old('type') == 'jasa' ? 'checked' : '' }}
                    >
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="type-jasa">Jasa</x-label>
                </div>
            </div>
            @error('type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
       
        {{-- Category --}}
        <div class="mb-4">
            <x-label :isRequired="true" for="category">Kategori</x-label>
            <select 
                name="category" 
                id="category"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
            >
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ old('category') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
       
        {{-- Product Name --}}
        <div class="mb-4">
            <x-label :isRequired="true" for="name">Nama Produk</x-label>
            <x-input.default 
                placeholder="Masukkan nama produk" 
                name="name"
                id="name"
                value="{{ old('name') }}"
            />
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Barcode --}}
        <div class="mb-4">
            <x-label :isRequired="true" for="no_barcode">No Barcode</x-label>
            <x-input.default 
                placeholder="Masukkan no barcode produk" 
                name="no_barcode"
                id="no_barcode"
                value="{{ old('no_barcode') }}"
            />
            @error('no_barcode')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Price --}}
        <div class="mb-4">
            <x-label :isRequired="true" for="price">Harga</x-label>
            <x-input.default 
                type="number" 
                min="0" 
                step="0.01"
                placeholder="Masukkan harga produk" 
                name="price"
                id="price"
                value="{{ old('price') }}"
            />
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Unit --}}
        <div class="mb-4">
            <x-label :isRequired="true" for="unit">Unit</x-label>
            <x-input.default 
                type="text" 
                placeholder="Masukkan unit produk (contoh: pcs, kg, liter)" 
                name="unit"
                id="unit"
                value="{{ old('unit') }}"
            />
            @error('unit')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Stock --}}
        <div class="mb-4" x-data="{ isUnlimited: {{ old('is_stock_unlimited') ? 'true' : 'false' }} }">
            <x-label for="stock" :isRequired="true">Stock</x-label>
            <x-input.default
                type="number"
                min="0"
                placeholder="Masukkan jumlah stock"
                name="stock"
                id="stock"
                value="{{ old('stock') }}"
                x-bind:disabled="isUnlimited"
                x-bind:value="isUnlimited ? '' : '{{ old('stock') }}'"
            />
            <div class="flex gap-2 items-center mt-2">
                <input
                    type="checkbox"
                    name="is_stock_unlimited"
                    id="is_stock_unlimited"
                    value="1"
                    x-model="isUnlimited"
                    {{ old('is_stock_unlimited') ? 'checked' : '' }}
                >
                <x-label for="is_stock_unlimited" class="!mb-0 mt-1 !font-normal">Stok Unlimited</x-label>
            </div>
            @error('stock')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
       
        {{-- Product Image --}}
        <div class="mb-4">
            <x-label :isRequired="true" for="image">Foto Produk</x-label>
            <x-input.file name="image" />
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
       
        {{-- Status --}}
        <div class="mb-4">
            <x-label for="status" :isRequired="true">Status</x-label>
            <x-input.switch />
        </div>

        {{-- Action Buttons --}}
        <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('dashboard.product.katalog') }}" class="w-full">
                <x-button.default
                    variant="danger"
                    class="w-full"
                    type="button"
                >
                    Batal
                </x-button.default>
            </a>
            <x-button.default
                class="w-full"
                type="submit"
            >
                Simpan
            </x-button.default>
        </div>
    </form>
@endsection