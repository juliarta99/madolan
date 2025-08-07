@extends('layouts.dashboard')

@section('content')
    <x-header-with-back route="{{ route('dashboard.product.katalog') }}" titleInSpan="Produk" />

    <form action="" method="POST">
        @csrf

        <div class="mb-4">
            <x-label :isRequired="true">Tipe</x-label>
            <div class="items-center flex gap-4">
                <div class="items-center flex gap-2">
                    <input type="radio" class="cursor-pointer" name="type" id="type-barang" value="barang">
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="type-barang">Barang</x-label>
                </div>
                <div class="items-center flex gap-2">
                    <input type="radio" class="cursor-pointer" name="type" id="type-jasa" value="jasa">
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="type-jasa">Jasa</x-label>
                </div>
            </div>
        </div>
        
        <div class="mb-4">
            <x-label :isRequired="true" for="category">Kategori</x-label>
            <x-input.select 
                name="category"
                :options="[
                    '' => 'Pilih..',
                    'Kopi' => 'Kopi',
                    'Dimsum' => 'Dimsum'
                    ]"
            />
        </div>
        
        <div class="mb-4">
            <x-label :isRequired="true" for="name">Nama</x-label>
            <x-input.default placeholder="Masukkan nama produk" name="name"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="no_barcode">No Barcode</x-label>
            <x-input.default placeholder="Masukkan no barcode produk" name="no_barcode"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="no_barcode">Harga</x-label>
            <x-input.default type="number" min="0" placeholder="Masukkan no barcode produk" name="no_barcode"></x-input.default>
        </div>

        <div class="mb-4" x-data="{ isUnlimited: false }">
            <x-label :isRequired="true" for="stock">Stock</x-label>
            <x-input.default 
                type="number" 
                min="1" 
                placeholder="Masukkan no barcode produk" 
                name="stock"
                x-bind:disabled="isUnlimited"
                x-bind:value="isUnlimited ? '' : undefined"
            ></x-input.default>

            <div class="flex gap-2 items-center mt-2">
                <input 
                    type="checkbox" 
                    name="is_stock_unlimited" 
                    id="is_stock_unlimited"
                    x-model="isUnlimited"
                >
                <x-label for="is_stock_unlimited" class="!mb-0 mt-1 !font-normal">Stok Unlimited</x-label>
            </div>
        </div>
        
        <div class="mb-4">
            <x-label :isRequired="true" for="image">Foto Produk</x-label>
            <x-input.file name="image" />
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