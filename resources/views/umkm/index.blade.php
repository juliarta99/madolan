@extends('layouts.dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Selamat Datang, Sanjaya Putra</h1>
    <div x-data="{ openNotification: true  }" x-transition.opacity x-cloak x-show="openNotification" class="bg-warning p-4 rounded-md mb-4 flex gap-4 justify-between items-center">
        <p>
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

    <div class="grid md:grid-cols-4 gap-6">
        <div class="bg-light shadow-xl p-5 rounded-lg flex col-span-2 gap-4 items-center border border-b-6 border-b-success border-gray-50">
            <div class="p-3 rounded-xl bg-success">
                <img src="{{ asset('assets/icons/moneys.svg') }}" class="w-13" alt="">
            </div>
            <div class="w-full">
                <div class="flex gap-2 justify-between w-full mb-1">
                    <h2 class="text-lg font-semibold">Kas Saat Ini</h2>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('assets/icons/edit.svg') }}" class="w-4" alt="">
                            <p class="text-accent">Edit</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('assets/icons/history.svg') }}" class="w-4" alt="">
                            <p class="text-primary">Riwayat</p>
                        </div>
                    </div>
                </div>
                <p class="text-2xl font-bold">Rp 25.900.000</p>
                <p class="text-danger">-5%</p>
            </div>
        </div>
        <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-success">
                <img src="{{ asset('assets/icons/chart_up.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Pemasukan Hari Ini</h2>
            <div class="mt-2">
                <p class="text-xl font-bold text-center">Rp 850.000</p>
                <p class="text-sm text-success text-center">10%</p>
            </div>
        </div>
        <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-danger">
                <img src="{{ asset('assets/icons/chart_down.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Pengeluaran Hari Ini</h2>
            <div class="mt-2">
                <p class="text-xl font-bold text-center">Rp 200.000</p>
                <p class="text-sm text-success text-center">10%</p>
            </div>
        </div>
        <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-primary">
                <img src="{{ asset('assets/icons/money.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Laba Rugi Hari Ini</h2>
            <div class="mt-2">
                <p class="text-xl font-bold text-center">Rp 200.000</p>
                <p class="text-sm text-success text-center">10%</p>
            </div>
        </div>
        <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-accent">
                <img src="{{ asset('assets/icons/moneys.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Laba Rugi Bulan Ini</h2>
            <div class="mt-2">
                <p class="text-xl font-bold text-center">Rp 30.00.000</p>
                <p class="text-sm text-danger text-center">-10%</p>
            </div>
        </div>
        <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-primary">
                <img src="{{ asset('assets/icons/shopping.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Jumlah Barang</h2>
            <div class="mt-2">
                <p class="text-xl font-bold text-center">120</p>
            </div>
        </div>
        <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-accent">
                <img src="{{ asset('assets/icons/service.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Jumlah Jasa</h2>
            <div class="mt-2">
                <p class="text-xl font-bold text-center">9</p>
            </div>
        </div>
        <div class="bg-light col-span-2 shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-primary">
                <img src="{{ asset('assets/icons/rocket_box.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Produk Terlaris</h2>
            <p class="text-sm text-center">7 hari terakhir</p>
            <p class="text-xl font-bold text-center mt-2">Ice Coffe</p>
        </div>
        <div class="bg-light col-span-2 shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
            <div class="p-2 rounded-xl bg-accent">
                <img src="{{ asset('assets/icons/clock_dering.svg') }}" class="w-10" alt="">
            </div>
            <h2 class="font-semibold mt-1">Jam Tersibuk</h2>
            <p class="text-sm text-center">7 hari terakhir</p>
            <p class="text-xl font-bold text-center mt-2">14:00</p>
        </div>
    </div>

    <div class="mt-6 bg-accent rounded-xl px-7 py-4 text-light">
        <h1 class="text-xl font-semibold">Optimalkan Hari Sepi</h1>
        <p class="mt-2">Penjualan cenderung turun setiap <span class="font-bold">hari Kamis</span>. Coba dorong diskon terbatas atau campaign tematik untuk menarik pelanggan.</p>
    </div>

    <div class="w-full my-14">
        <h1 class="font-semibold text-lg text-center mb-3">Grafik Laba Rugi</h1>
        <canvas id="myChart"></canvas>
    </div>

    <div class="mt-6">
        <h1 class="font-semibold text-2xl">Akses Cepat ke <span class="text-primary">Fitur Unggulan</span></h1>
            <div class="grid grid-cols-6 gap-4 mt-4">
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/forum.svg') }}" class="w-13" alt="">
                    <p>Forum</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/user_reading.svg') }}" class="w-13" alt="">
                    <p>Pembelajaran</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/products.svg') }}" class="w-13" alt="">
                    <p>Produk</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/pos.svg') }}" class="w-13" alt="">
                    <p>Poin of Sales</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/order_edit.svg') }}" class="w-13" alt="">
                    <p>Pre Order</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/docs.svg') }}" class="w-13" alt="">
                    <p>Pembukuan</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-primary text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/doc.svg') }}" class="w-13" alt="">
                    <p>Laporan</p>
                </a>
                <a href="" class="flex flex-col gap-3 p-4 aspect-square bg-accent text-light w-full rounded-xl shadow-xl items-center justify-center">
                    <img src="{{ asset('assets/icons/people_money.svg') }}" class="w-13" alt="">
                    <p>Pendanaan</p>
                </a>
            </div>
    </div>
@endsection

@section('scripts')
    <script type="module">
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['10/10/2025', '11/10/2025', '12/10/2025', '13/10/2025', '14/10/2025', '15/10/2025', '16/10/2025'],
                datasets: [{
                    label: 'Laba Rugi',
                    data: [550000, 530000, 540000, 520000, 570000, 600000, 650000],
                    borderColor: 'rgba(38, 82, 255, 1)',
                    backgroundColor: 'rgba(38, 82, 255, 0.2)',
                    pointBackgroundColor: 'rgba(38, 82, 255, 1)',
                    pointBorderColor: 'rgba(38, 82, 255, 1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection