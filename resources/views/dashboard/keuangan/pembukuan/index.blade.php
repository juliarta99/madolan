@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Pembukuan</h1>
    <div x-data="{ openNotification: true  }" x-transition.opacity x-cloak x-show="openNotification" class="bg-warning p-4 rounded-md mb-4 flex gap-4 justify-between items-center">
        <div class="space-y-2">
            <p class="text-sm md:text-base">
                Catat pengeluaran dan pemasukan sekarang, dan nikmati laporan keuangan otomatis kapan saja dibutuhkan.
            </p>
            <a href="{{ route('dashboard.keuangan.laporan') }}">
                <x-button.default>
                    Lihat Laporan
                </x-button.default>
            </a>
        </div>
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
            confirmDelete: false,
            transactionId: null,
            transactionCode: 'TR2023914823',
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = '/dashboard/keuangan/pembukuan/' + this.categoryId;
            },
        }">

        <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex gap-2 items-center w-full">
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
                                <h2 class="text-xl font-semibold">Filter Pembukuan</h2>
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
                                            'pemasukan' => 'Pemasukan',
                                            'pengeluaran' => 'Pengeluaran',
                                            'hutang' => 'Hutang',
                                            'piutang' => 'Piutang',
                                        ]"
                                    />
                                </div>
                                <div>
                                    <x-label for="category">Kategori</x-label>
                                    <x-input.select 
                                        name="category"
                                        :options="[
                                            'penjulan' => 'Penjualan',
                                            'hutang-bank' => 'Hutang Bank',
                                            'operasional' => 'Operasional',
                                        ]"
                                    />
                                </div>
                                <div>
                                    <x-label>Rentang Tanggal</x-label>
                                    <x-input.daterange />
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
                    placeholder="Search pembukuan"
                    class="w-full"
                />
            </div>
            <a href="{{ route('dashboard.keuangan.pembukuan.create') }}" class="w-full md:w-max">
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
                class="overflow-x-auto bg-light shadow-xl rounded-lg"
            >
                <!-- Table Header -->
                <table class="w-full table-auto text-sm">
                    <thead class="bg-secondary text-light">
                        <tr>
                            <th class="px-4 py-2 text-left">Waktu</th>
                            <th class="px-4 py-2 text-left">Tipe</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Description</th>
                            <th class="px-4 py-2 text-left">Harga/Biaya</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody class="text-gray-700">
                        @for ($i = 0; $i<10; $i++)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">10/08/2025 15:00:12</td>
                                <td class="px-4 py-2">Pemasukan</td>
                                <td class="px-4 py-2">Penjualan</td>
                                <td class="px-4 py-2">Transaksi penjualan barang 8x</td>
                                <td class="px-4 py-2">Rp 80.000</td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <a href="">
                                            <button
                                                type="button" 
                                                class="cursor-pointer h-full flex items-center"
                                            >
                                                <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                                            </button>
                                        </a>
                                        <a href="">
                                            <button
                                                type="button" 
                                                class="cursor-pointer h-full flex items-center"
                                            >
                                                <img src="{{ asset('assets/icons/edit-simple.svg') }}" class="w-6 min-w-6" alt="">
                                            </button>
                                        </a>
                                        <button 
                                            @click="confirmDelete = true;
                                                transactionId = 21;
                                                transactionCode = '#PP0821094823';
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
                            
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menghapus (delete) transaksi <span x-text="transactionCode"></span></span> ini?</h1>
    
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