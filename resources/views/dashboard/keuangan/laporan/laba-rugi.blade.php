@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Laporan Laba Rugi</h1>
    <div class="flex gap-4 justify-between items-center">
        <div class="flex gap-2">
            <x-input.daterange />
            <div>
                <x-label for="types">Jenis Laporan</x-label>
                <x-input.select 
                    name="types"
                    :options="[
                        'laba-rugi' => 'Laba Rugi',
                        'arus-kas' => 'Arus Kas',
                        'hutang-piutang' => 'Hutang Piutang',
                        'penjualan' => 'Penjualan',
                    ]"
                    selected="laba-rugi"
                />
            </div>
        </div>
        <div>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                </svg>
                <span class="font-semibold">Export</span>
            </div>
            <div class="flex gap-2 mt-1">
                <x-button.icon variant="danger">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="fill-light size-6">
                            <path d="M96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l80 0 0-112c0-35.3 28.7-64 64-64l176 0 0-165.5c0-17-6.7-33.3-18.7-45.3L290.7 18.7C278.7 6.7 262.5 0 245.5 0L96 0zM357.5 176L264 176c-13.3 0-24-10.7-24-24L240 58.5 357.5 176zM240 380c-11 0-20 9-20 20l0 128c0 11 9 20 20 20s20-9 20-20l0-28 12 0c33.1 0 60-26.9 60-60s-26.9-60-60-60l-32 0zm32 80l-12 0 0-40 12 0c11 0 20 9 20 20s-9 20-20 20zm96-80c-11 0-20 9-20 20l0 128c0 11 9 20 20 20l32 0c28.7 0 52-23.3 52-52l0-64c0-28.7-23.3-52-52-52l-32 0zm20 128l0-88 12 0c6.6 0 12 5.4 12 12l0 64c0 6.6-5.4 12-12 12l-12 0zm88-108l0 128c0 11 9 20 20 20s20-9 20-20l0-44 28 0c11 0 20-9 20-20s-9-20-20-20l-28 0 0-24 28 0c11 0 20-9 20-20s-9-20-20-20l-48 0c-11 0-20 9-20 20z"/>
                        </svg>
                    </x-slot:icon>
                    PDF
                </x-button.icon>
                <x-button.icon variant="success">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="fill-light size-6">
                            <path d="M128 128C128 92.7 156.7 64 192 64L341.5 64C358.5 64 374.8 70.7 386.8 82.7L493.3 189.3C505.3 201.3 512 217.6 512 234.6L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 128zM336 122.5L336 216C336 229.3 346.7 240 360 240L453.5 240L336 122.5zM292 330.7C284.6 319.7 269.7 316.7 258.7 324C247.7 331.3 244.7 346.3 252 357.3L291.2 416L252 474.7C244.6 485.7 247.6 500.6 258.7 508C269.8 515.4 284.6 512.4 292 501.3L320 459.3L348 501.3C355.4 512.3 370.3 515.3 381.3 508C392.3 500.7 395.3 485.7 388 474.7L348.8 416L388 357.3C395.4 346.3 392.4 331.4 381.3 324C370.2 316.6 355.4 319.6 348 330.7L320 372.7L292 330.7z"/>
                        </svg>
                    </x-slot:icon>
                    Excel
                </x-button.icon>
            </div>
        </div>
    </div>

    <div x-data x-init="initChart()" class="grid grid-cols-2 gap-12 my-10">
        <div class="w-full">
            <h1 class="font-semibold text-lg text-center mb-5">Chart Pemasukan</h1>
            <canvas id="chartPemasukan"></canvas>
        </div>
        <div class="w-full">
            <h1 class="font-semibold text-lg text-center mb-5">ChartPengeluaran</h1>
            <canvas id="chartPengeluaran"></canvas>
        </div>
    </div>

    <div x-data="laporanLabaRugi()" x-init="init()" class="space-y-4">
        <div>
            <h1 class="font-bold mb-2">Laporan Laba Rugi</h1>
            <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-primary"><path d="M224 64C206.3 64 192 78.3 192 96L192 128L160 128C124.7 128 96 156.7 96 192L96 240L544 240L544 192C544 156.7 515.3 128 480 128L448 128L448 96C448 78.3 433.7 64 416 64C398.3 64 384 78.3 384 96L384 128L256 128L256 96C256 78.3 241.7 64 224 64zM96 288L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 288L96 288z"/></svg>
                <span x-text="periode" class="text-primary text-sm"></span>
            </span>
        </div>

        <div class="grid md:grid-cols-2 gap-10">
            <div>
                <h2 class="text-green-600 font-semibold text-lg flex items-center gap-2 mb-4">
                    <svg viewBox="0 0 45 45" fill="none" class="size-6" xmlns="http://www.w3.org/2000/svg">
                        <path d="M38.7507 11.5L29.0468 21.2038C28.703 21.5475 28.2368 21.7406 27.7507 21.7406C27.2645 21.7406 26.7983 21.5475 26.4545 21.2038L23.5468 18.2962C23.203 17.9525 22.7368 17.7594 22.2507 17.7594C21.7645 17.7594 21.2983 17.9525 20.9545 18.2962L13.084 26.1667" class="stroke-success" stroke-width="3.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.75 6V33.1333C5.75 35.1867 5.75 36.2133 6.14967 36.998C6.5012 37.6879 7.0621 38.2488 7.752 38.6003C8.53667 39 9.56333 39 11.6167 39H38.75" class="stroke-success" stroke-width="3.66667" stroke-linecap="round"/>
                    </svg>
                    Pemasukan
                </h2>
                <template x-for="item in pemasukan" :key="item.name">
                    <div class="flex items-center gap-3 mb-2 text-sm">
                        <svg width="24" height="24" viewBox="0 0 24 24" class="fill-success" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                            <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                        </svg>
                        <div class="flex flex-col gap-1 font-semibold">
                            <h5 x-text="item.name"></h5>
                            <p x-text="formatRupiah(item.value)"></p>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Pengeluaran -->
            <div>
                <h2 class="text-red-600 font-semibold text-lg flex items-center gap-2 mb-4">
                    <svg viewBox="0 0 45 45" fill="none" class="fill-danger size-6" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.91667 6H6.25V39H39.25V35.3333H9.91667V6Z"/>
                        <path d="M24.5839 23.5743L16.7134 15.7038L14.1211 18.2962L24.5839 28.759L30.0839 23.259L37.9544 31.1295L40.5468 28.5372L30.0839 18.0743L24.5839 23.5743Z"/>
                    </svg>
                    Pengeluaran/Beban
                </h2>
                <template x-for="item in pengeluaran" :key="item.name">
                    <div class="flex items-center gap-3 mb-2 text-sm">
                        <svg width="24" height="24" viewBox="0 0 24 24" class="fill-danger" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                            <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                        </svg>
                        <div class="flex flex-col gap-1 font-semibold">
                            <h5 x-text="item.name"></h5>
                            <p x-text="formatRupiah(item.value)"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mt-4">
            <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                <div class="flex items-center gap-2">
                    <svg viewBox="0 0 45 45" fill="none" class="size-12" xmlns="http://www.w3.org/2000/svg">
                        <path d="M38.7507 11.5L29.0468 21.2038C28.703 21.5475 28.2368 21.7406 27.7507 21.7406C27.2645 21.7406 26.7983 21.5475 26.4545 21.2038L23.5468 18.2962C23.203 17.9525 22.7368 17.7594 22.2507 17.7594C21.7645 17.7594 21.2983 17.9525 20.9545 18.2962L13.084 26.1667" class="stroke-success" stroke-width="3.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.75 6V33.1333C5.75 35.1867 5.75 36.2133 6.14967 36.998C6.5012 37.6879 7.0621 38.2488 7.752 38.6003C8.53667 39 9.56333 39 11.6167 39H38.75" class="stroke-success" stroke-width="3.66667" stroke-linecap="round"/>
                    </svg>
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold text-success">Total Pemasukan</h3>
                        <p class="text-xl font-bold" x-text="formatRupiah(totalPemasukan)"></p>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                <div class="flex items-center gap-2">
                    <svg viewBox="0 0 45 45" fill="none" class="fill-danger size-12" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.91667 6H6.25V39H39.25V35.3333H9.91667V6Z"/>
                        <path d="M24.5839 23.5743L16.7134 15.7038L14.1211 18.2962L24.5839 28.759L30.0839 23.259L37.9544 31.1295L40.5468 28.5372L30.0839 18.0743L24.5839 23.5743Z"/>
                    </svg>
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold text-danger">Pengeluaran/Beban</h3>
                        <p class="text-xl font-bold" x-text="formatRupiah(totalPengeluaran)"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-8 rounded-xl shadow-xl border border-gray-50 mt-2 mb-10">
            <div class="flex items-center gap-2">
                <svg width="45" height="45" viewBox="0 0 24 24" class="fill-success" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                    <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                </svg>
                <div class="flex flex-col gap-1">
                    <h3 class="font-semibold text-lg text-success">Laba Rugi</h3>
                    <p class="text-xl font-bold" x-text="formatRupiah(labaRugi)"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initChart() {
            const ctxPemasukan = document.getElementById('chartPemasukan').getContext('2d');
            const ctxPengeluaran = document.getElementById('chartPengeluaran').getContext('2d');

            new Chart(ctxPemasukan, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Modal Masuk',
                        'Penjualan',
                        'Penjualan Aset',
                        'Pendapatan Promo',
                        'Lain-lain',
                        'Pendapatan Non-Operasional'
                    ],
                    datasets: [{
                        label: 'Chart Pemasukan',
                        data: [25, 30, 10, 15, 5, 15],
                        backgroundColor: [
                            '#F65D5D',
                            '#3B82F6',
                            '#FACC15',
                            '#22C55E', 
                            '#312E81',
                            '#FB923C'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });


            new Chart(ctxPengeluaran, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Pembelian Bahan',
                        'Gaji',
                        'Sewa & Utilitas',
                        'Operasional Harian',
                        'Inventaris',
                        'Lain-lain'
                    ],
                    datasets: [{
                        label: 'Chart Pengeluaran',
                        data: [25, 30, 10, 15, 5, 15],
                        backgroundColor: [
                            '#F65D5D',
                            '#3B82F6', 
                            '#FACC15',
                            '#22C55E', 
                            '#312E81',
                            '#FB923C'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    cutout: '60%',
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function laporanLabaRugi() {
            return {
                periode: '10/08/2025 - 25/08/2025',
                pemasukan: [
                    { name: 'Penjualan', value: 6350000 },
                    { name: 'Pendapatan Non-Operasional', value: 350000 },
                    { name: 'Modal Masuk', value: 2500000 },
                    { name: 'Pendapatan Promo', value: 200000 },
                    { name: 'Penjualan Aset', value: 500000 },
                    { name: 'Lain-lain', value: 250000 }
                ],
                pengeluaran: [
                    { name: 'Pembelian Bahan', value: 3040000 },
                    { name: 'Operasional Harian', value: 500000 },
                    { name: 'Gaji', value: 3500000 },
                    { name: 'Sewa & Utilitas', value: 200000 },
                    { name: 'Inventaris', value: 100000 },
                    { name: 'Lain-lain', value: 150000 }
                ],
                totalPemasukan: 0,
                totalPengeluaran: 0,
                labaRugi: 0,

                init() {
                    this.totalPemasukan = this.pemasukan.reduce((sum, i) => sum + i.value, 0);
                    this.totalPengeluaran = this.pengeluaran.reduce((sum, i) => sum + i.value, 0);
                    this.labaRugi = this.totalPemasukan - this.totalPengeluaran;
                },

                formatRupiah(val) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(val);
                }
            }
        }
    </script>
@endsection