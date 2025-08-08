@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Laporan Penjualan</h1>
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
                    selected="penjualan"
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
            <h1 class="font-semibold text-lg text-center mb-5">Chart Penjualan (Jumlah Produk)</h1>
            <canvas id="chartCountProducts"></canvas>
        </div>
        <div class="w-full">
            <h1 class="font-semibold text-lg text-center mb-5">Chart Penjualan (Total Pendapatan)</h1>
            <canvas id="chartOmzetProducts"></canvas>
        </div>
    </div>

    <div x-data="penjualanDummy()" x-init="init()" class="space-y-4">
        <div>
            <h1 class="font-bold mb-2">Laporan Hutang Piutang</h1>
            <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-primary"><path d="M224 64C206.3 64 192 78.3 192 96L192 128L160 128C124.7 128 96 156.7 96 192L96 240L544 240L544 192C544 156.7 515.3 128 480 128L448 128L448 96C448 78.3 433.7 64 416 64C398.3 64 384 78.3 384 96L384 128L256 128L256 96C256 78.3 241.7 64 224 64zM96 288L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 288L96 288z"/></svg>
                <div class="text-primary text-sm">
                    <span x-text="start"></span>
                    <span>-</span>
                    <span x-text="end"></span>
                </div>
            </span>
        </div>

        <div
            class="overflow-x-auto bg-light shadow-xl rounded-lg"
        >
            <table class="w-full table-auto text-sm">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th class="px-4 py-2 text-left">Nama Produk</th>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <th class="px-4 py-2 text-left">Jumlah Terjual</th>
                        <th class="px-4 py-2 text-left">Total Pendapatan</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                        <template x-for="item in transaksi" :key="item.id">
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="px-4 py-2 text-left" x-text="item.name"></td>
                            <td class="px-4 py-2 text-left" x-text="formatRupiah(item.price)"></td>
                            <td class="px-4 py-2 text-left" x-text="item.count"></td>
                            <td class="px-4 py-2 text-left" x-text="formatRupiah(item.total)"></td>
                        </tr>
                    </template>
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
        </div>

        <!-- Total -->
        <div class="grid md:grid-cols-2 gap-6 mt-4">
            <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                <div class="flex items-center gap-2">
                    <svg viewBox="0 0 24 24" class="size-12 fill-primary" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.75 0.0234375L24 4.14844V13.3477L22.5 12.5977V5.82422L16.5 8.82422V11.8477L15 12.5977V8.82422L9 5.82422V8.48438L7.5 7.73438V4.14844L15.75 0.0234375ZM15.75 7.52344L17.8242 6.48047L12.3984 3.375L9.92578 4.61719L15.75 7.52344ZM19.4414 5.68359L21.5742 4.61719L15.75 1.69922L14.0039 2.57812L19.4414 5.68359ZM13.5 13.3477L12 14.0977V14.0859L7.5 16.3359V21.668L12 19.4062V21.0938L6.75 23.7188L0 20.332V12.4102L6.75 9.03516L13.5 12.4102V13.3477ZM6 21.668V16.3359L1.5 14.0859V19.4062L6 21.668ZM6.75 15.0352L11.0742 12.8789L6.75 10.7109L2.42578 12.8789L6.75 15.0352ZM13.5 15.0234L18.75 12.3984L24 15.0234V21.1992L18.75 23.8242L13.5 21.1992V15.0234ZM18 21.7734V18.1992L15 16.6992V20.2734L18 21.7734ZM22.5 20.2734V16.6992L19.5 18.1992V21.7734L22.5 20.2734ZM18.75 16.8984L21.5742 15.4805L18.75 14.0742L15.9258 15.4805L18.75 16.8984Z"/>
                    </svg>
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold text-primary">Total Produk Terjual</h3>
                        <p class="text-xl font-bold" x-text="formatRupiah(count_products)"></p>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                <div class="flex items-center gap-2">
                    <svg viewBox="0 0 45 45" fill="none" class="fill-success size-12" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.91667 6H6.25V39H39.25V35.3333H9.91667V6Z"/>
                        <path d="M24.5839 23.5743L16.7134 15.7038L14.1211 18.2962L24.5839 28.759L30.0839 23.259L37.9544 31.1295L40.5468 28.5372L30.0839 18.0743L24.5839 23.5743Z"/>
                    </svg>
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold text-success">Total Pendapatan dari Penjualan</h3>
                        <p class="text-xl font-bold" x-text="formatRupiah(omzet_products)"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initChart() {
            const ctxCounts = document.getElementById('chartCountProducts').getContext('2d');
            const ctxOmzet = document.getElementById('chartOmzetProducts').getContext('2d');

            new Chart(ctxCounts, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Kopi',
                        'Susu',
                        'Mie Goreng',
                    ],
                    datasets: [{
                        label: 'Chart Penjualan (Jumlah Produk)',
                        data: [25, 35, 40],
                        backgroundColor: [
                            '#F65D5D',
                            '#3B82F6',
                            '#FACC15',
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


            new Chart(ctxOmzet, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Kopi',
                        'Susu',
                        'Mie Goreng',
                    ],
                    datasets: [{
                        label: 'Chart Penjualan (Total Pendapatan)',
                        data: [25, 35, 40],
                        backgroundColor: [
                            '#F65D5D',
                            '#3B82F6',
                            '#FACC15',
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

        function penjualanDummy() {
            return {
                start: '2025-08-10',
                end: '2025-08-25',
                transaksi: [],
                count_products: 0,
                omzet_products: 0,

                init() {
                    this.fetchData()
                },

                fetchData() {
                    this.transaksi = Array.from({ length: 10 }).map((_, i) => ({
                        id: i + 1,
                        name: 'Kopi Susu',
                        price: 40000,
                        count: 8,
                        total: 80000,
                    }))

                    this.count_products = 12150000
                    this.omzet_products = 8303293
                },

                formatRupiah(angka) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(angka)
                }
            }
        }
    </script>
@endsection