@extends('layouts.dashboard')

@section('content')
    <x-header-with-back route="{{ route('dashboard.access') }}" titleInSpan="Pegawai" />

    <form action="" method="POST">
        @csrf
        
        <div class="mb-4">
            <x-label :isRequired="true" for="name">Nama</x-label>
            <x-input.default placeholder="Masukkan nama pegawai" name="name"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="username">Username</x-label>
            <x-input.default placeholder="Masukkan username pegawai" name="username"></x-input.default>
        </div>
        
        <div class="mb-4">
            <x-label :isRequired="true">Akses</x-label>
            <div class="items-center flex gap-4">
                <div class="items-center flex gap-2">
                    <input type="radio" class="cursor-pointer" name="access" id="access-kasir" value="kasir">
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="access-kasir">Kasir</x-label>
                </div>
                <div class="items-center flex gap-2">
                    <input type="radio" class="cursor-pointer" name="access" id="access-akuntan" value="akuntan">
                    <x-label class="!mb-0 cursor-pointer !font-normal" for="access-akuntan">Akuntan</x-label>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="password">Password</x-label>
            <x-input.default type="password" placeholder="Masukkan password" name="password"></x-input.default>
        </div>

        <div class="mb-4">
            <x-label :isRequired="true" for="password_confirmation">Konfirmasi Password</x-label>
            <x-input.default type="password" placeholder="Masukkan ulang password" name="password_confirmation"></x-input.default>
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