@extends('layouts.dashboard')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] fixed -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
    <div class="h-70 w-70 bg-primary blur-[150px] fixed -z-10 bottom-0 left-0 -translate-x-1/2 translate-y-1/2"></div>
    <div class="relative z-0">
        <h1 class="text-3xl font-bold mb-4">Selamat Datang, Sanjaya Putra</h1>
        <div x-data="{ openNotification: true  }" x-transition.opacity x-cloak x-show="openNotification" class="bg-warning p-4 rounded-md mb-4 flex gap-4 justify-between items-center">
            <p>
                Terdapat <span class="font-bold">10 user</span> dan <span class="font-bold">34 forum</span> menunggu persetujuan. Yuk, cek dan tindak lanjuti sekarang!
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
            <div class="bg-light shadow-xl p-5 rounded-lg flex col-span-2 gap-4 items-center border border-b-6 border-gray-50 !border-b-warning">
                <div class="p-3 rounded-xl bg-warning">
                    <svg class="size-12 fill-light" viewBox="0 0 53 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_269_7163)">
                            <path d="M35.3359 31.4167H38.6484V37.6442L44.0368 40.7579L42.3805 43.6287L35.3359 39.5654V31.4167ZM37.5443 27C34.6158 27 31.8073 28.1633 29.7366 30.234C27.6659 32.3047 26.5026 35.1132 26.5026 38.0417C26.5026 40.9701 27.6659 43.7786 29.7366 45.8493C31.8073 47.92 34.6158 49.0833 37.5443 49.0833C40.4727 49.0833 43.2812 47.92 45.3519 45.8493C47.4226 43.7786 48.5859 40.9701 48.5859 38.0417C48.5859 35.1132 47.4226 32.3047 45.3519 30.234C43.2812 28.1633 40.4727 27 37.5443 27ZM37.5443 22.5833C41.6441 22.5833 45.576 24.212 48.475 27.111C51.374 30.01 53.0026 33.9419 53.0026 38.0417C53.0026 42.1415 51.374 46.0734 48.475 48.9724C45.576 51.8714 41.6441 53.5 37.5443 53.5C31.383 53.5 26.0609 49.8783 23.5655 44.6667H2.21094V38.0417C2.21094 32.1675 13.9814 29.2083 19.8776 29.2083C21.2026 29.2083 22.8368 29.3629 24.5593 29.65C25.9597 27.4798 27.8822 25.6957 30.1508 24.4611C32.4194 23.2265 34.9615 22.5809 37.5443 22.5833ZM22.0859 38.0417C22.0859 36.4958 22.3068 34.9942 22.7264 33.625C21.7989 33.4704 20.8272 33.4042 19.8776 33.4042C13.3189 33.4042 6.40677 36.6283 6.40677 38.0417V40.4708H22.2847C22.1546 39.6676 22.0882 38.8554 22.0859 38.0417ZM19.8776 9.33333C22.2203 9.33333 24.4671 10.264 26.1237 11.9206C27.7803 13.5771 28.7109 15.8239 28.7109 18.1667C28.7109 20.5094 27.7803 22.7562 26.1237 24.4128C24.4671 26.0693 22.2203 27 19.8776 27C17.5349 27 15.2881 26.0693 13.6315 24.4128C11.9749 22.7562 11.0443 20.5094 11.0443 18.1667C11.0443 15.8239 11.9749 13.5771 13.6315 11.9206C15.2881 10.264 17.5349 9.33333 19.8776 9.33333ZM19.8776 13.5292C18.6477 13.5292 17.4681 14.0178 16.5984 14.8875C15.7287 15.7572 15.2401 16.9367 15.2401 18.1667C15.2401 19.3966 15.7287 20.5762 16.5984 21.4459C17.4681 22.3156 18.6477 22.8042 19.8776 22.8042C21.1075 22.8042 22.2871 22.3156 23.1568 21.4459C24.0265 20.5762 24.5151 19.3966 24.5151 18.1667C24.5151 16.9367 24.0265 15.7572 23.1568 14.8875C22.2871 14.0178 21.1075 13.5292 19.8776 13.5292Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_269_7163">
                                <rect width="53" height="53" fill="white" transform="translate(0 0.5)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="w-full">
                    <h2 class="text-lg font-semibold">Total User Pending</h2>
                    <p class="text-2xl font-bold mt-2">83</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/shop.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">User UMKM</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">210</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/user_graduate.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">User Mentor</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">100</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-warning">
                    <img src="{{ asset('assets/icons/message_clock.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Forum Pending</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">30</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/users.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total User</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">130</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/forum.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Forum</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">249</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/user_reading.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Pembelajaran</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">47</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/moneys.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Transaksi</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">40139</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/money_hand.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Pendanaan</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">39</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <img src="{{ asset('assets/icons/products.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Product</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">391</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <img src="{{ asset('assets/icons/employee.svg') }}" class="w-10" alt="">
                </div>
                <h2 class="font-semibold mt-1">Total Pegawai</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">309</p>
                </div>
            </div>
        </div>
    
        <div x-data="chartLabaRugi()" x-init="initChart()" class="my-10">
            <h1 class="font-semibold text-lg text-center mb-5">Chart Laba Rugi</h1>
            <canvas id="lineLabaRugi" height="150"></canvas>
        </div>

        <div x-data="chartVs()" x-init="init()" class="my-10">
            <h1 class="font-semibold text-lg text-center mb-5">Jumlah Pembelajaran vs Forum</h1>
            <canvas id="lineVs" height="150"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function chartLabaRugi() {
            return {
                labels: [
                    '10/10/2025', '11/10/2025', '12/10/2025',
                    '13/10/2025', '14/10/2025', '15/10/2025', '16/10/2025'
                ],
                labaRugiData: [
                    470000, 540000, 510000, 520000,
                    580000, 530000, 650000
                ],

                initChart() {
                    const ctx = document.getElementById('lineLabaRugi').getContext('2d');

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                label: 'Laba Rugi',
                                data: this.labaRugiData,
                                fill: false,
                                borderColor: '#2563eb',
                                backgroundColor: '#2563eb',
                                pointBackgroundColor: '#2563eb',
                                tension: 0.3,
                                pointRadius: 6,
                                pointHoverRadius: 7
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        font: {
                                            size: 14
                                        }
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const value = context.raw.toLocaleString('id-ID');
                                            return `Rp ${value}`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    ticks: {
                                        callback: function(value) {
                                            return value.toLocaleString('id-ID');
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
        }

        function chartVs() {
            return {
                init() {
                    const ctx = document.getElementById('lineVs').getContext('2d');

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [
                                '10/10/2025',
                                '17/10/2025',
                                '21/10/2025',
                                '28/10/2025',
                                '4/11/2025',
                                '11/11/2025',
                                '19/11/2025',
                            ],
                            datasets: [
                                {
                                    label: 'Pembelajaran',
                                    data: [2.7, 9.5, 7.4, 6.5, 5.6, 4.7, 7.8],
                                    borderColor: '#FDC830',
                                    backgroundColor: '#FDC830',
                                    tension: 0.4,
                                    fill: false,
                                    pointRadius: 6,
                                    pointBackgroundColor: '#FDC830',
                                },
                                {
                                    label: 'Forum',
                                    data: [2.5, 4, 3.4, 3.7, 4.8, 3.7, 6],
                                    borderColor: '#0D47FF',
                                    backgroundColor: '#0D47FF',
                                    tension: 0.4,
                                    fill: false,
                                    pointRadius: 6,
                                    pointBackgroundColor: '#0D47FF',
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        boxWidth: 20,
                                        padding: 20,
                                    }
                                },
                                title: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    suggestedMax: 10,
                                    ticks: {
                                        stepSize: 2
                                    }
                                }
                            }
                        }
                    });
                }
            }
        }
    </script>
@endsection