@extends('layouts.dashboard')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] fixed -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
    <div class="h-70 w-70 bg-primary blur-[150px] fixed -z-10 bottom-0 left-0 -translate-x-1/2 translate-y-1/2"></div>
    <div class="relative z-0">
        <h1 class="text-2xl lg:text-3xl font-bold mb-4">Selamat Datang, Sanjaya Putra</h1>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-light shadow-xl p-5 rounded-lg flex col-span-2 gap-4 items-center border border-b-6 border-gray-50 !border-b-primary">
                <div class="p-3 rounded-xl bg-primary">
                    <svg class="size-12 fill-light" viewBox="0 0 53 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8472 5.16401C12.0584 5.39809 11.1132 5.82871 10.4375 6.48901C9.76395 7.15151 9.32449 8.07901 9.08378 9.83021C8.83645 11.6344 8.83203 14.0238 8.83203 17.449V36.3744C9.70648 35.7773 10.6767 35.3344 11.7007 35.0648C12.8667 34.7579 14.227 34.7579 16.2211 34.7601H44.1654V17.4512C44.1654 14.0238 44.1609 11.6344 43.9136 9.83021C43.6729 8.07901 43.2334 7.15151 42.5599 6.48901C41.8842 5.82871 40.939 5.39809 39.1502 5.16401C37.3085 4.92109 34.8705 4.91667 31.3725 4.91667H21.6249C18.1269 4.91667 15.6889 4.92109 13.8472 5.16401ZM14.9248 15.064C14.9248 14.0746 15.7419 13.273 16.7511 13.273H36.2463C36.7254 13.2689 37.1866 13.4548 37.529 13.7901C37.8713 14.1254 38.0667 14.5826 38.0726 15.0618C38.0673 15.5413 37.8721 15.9991 37.5297 16.3348C37.1874 16.6706 36.7258 16.8568 36.2463 16.8527H16.7511C16.272 16.8568 15.8107 16.6709 15.4684 16.3356C15.1261 16.0004 14.9306 15.5431 14.9248 15.064ZM16.7511 21.6293C16.272 21.6252 15.8107 21.8112 15.4684 22.1464C15.1261 22.4817 14.9306 22.939 14.9248 23.4181C14.9248 24.4074 15.7419 25.209 16.7511 25.209H28.9345C29.414 25.2138 29.8758 25.0281 30.2186 24.6927C30.5614 24.3574 30.7572 23.8998 30.763 23.4203C30.7577 22.9404 30.5622 22.4822 30.2194 22.1464C29.8765 21.8106 29.4144 21.6246 28.9345 21.6293H16.7511Z" fill="white"/>
                        <path d="M16.5017 38.3398H44.1655C44.1589 40.8352 44.1191 42.699 43.916 44.1698C43.6753 45.921 43.2358 46.8485 42.5623 47.511C41.8865 48.1713 40.9413 48.6019 39.1526 48.836C37.3109 49.0789 34.8729 49.0833 31.3749 49.0833H21.6251C18.1271 49.0833 15.6891 49.0789 13.8473 48.8382C12.0586 48.6019 11.1134 48.1713 10.4376 47.511C9.7641 46.8485 9.32465 45.921 9.08394 44.1698C8.9934 43.5073 8.93377 42.7631 8.89844 41.9173C9.20112 41.0901 9.70041 40.3489 10.3533 39.7576C11.0061 39.1663 11.793 38.7426 12.646 38.5231C13.2864 38.3552 14.1189 38.3398 16.5017 38.3398Z" fill="white"/>
                    </svg>
                </div>
                <div class="w-full">
                    <h2 class="text-lg font-semibold">Total Pembelajaran</h2>
                    <p class="text-2xl font-bold mt-2">20</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <svg class="size-12 stroke-light" viewBox="0 0 46 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.25 28.125C26.3566 28.125 28.875 25.6066 28.875 22.5C28.875 19.3934 26.3566 16.875 23.25 16.875C20.1434 16.875 17.625 19.3934 17.625 22.5C17.625 25.6066 20.1434 28.125 23.25 28.125Z" stroke="white" stroke-width="3"/>
                        <path d="M38.6009 20.5013C39.3284 21.3863 39.6922 21.8269 39.6922 22.5C39.6922 23.1731 39.3284 23.6137 38.6009 24.4987C35.9384 27.7312 30.0659 33.75 23.2484 33.75C16.4309 33.75 10.5584 27.7312 7.89594 24.4987C7.16844 23.6137 6.80469 23.1731 6.80469 22.5C6.80469 21.8269 7.16844 21.3863 7.89594 20.5013C10.5584 17.2688 16.4309 11.25 23.2484 11.25C30.0659 11.25 35.9384 17.2688 38.6009 20.5013Z" stroke="white" stroke-width="3"/>
                    </svg>
                </div>
                <h2 class="font-semibold mt-1">Total View Pembelajaran</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">850.000</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-danger">
                    <svg class="size-12 stroke-light" viewBox="0 0 46 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.3125 7.5C8.61719 7.5 4 12.1172 4 17.8125C4 28.125 16.1875 37.5 22.75 39.6806C29.3125 37.5 41.5 28.125 41.5 17.8125C41.5 12.1172 36.8828 7.5 31.1875 7.5C27.7 7.5 24.6156 9.23156 22.75 11.8819C21.7989 10.5276 20.5356 9.42226 19.0669 8.65953C17.5982 7.89679 15.9674 7.49907 14.3125 7.5Z" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="font-semibold mt-1">Total Like</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">200.000</p>
                </div>
            </div>
            <div class="bg-light shadow-xl p-5 rounded-lg flex col-span-2 gap-4 items-center border border-b-6 border-b-success border-gray-50">
                <div class="p-3 rounded-xl bg-success">
                    <svg class="fill-light size-12" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M48.6257 47.2084C48.3201 47.2084 48.0336 47.1511 47.7663 47.0365C47.4989 46.9219 47.2507 46.75 47.0215 46.5209L41.7507 41.25H18.834C17.5736 41.25 16.495 40.8016 15.5982 39.9048C14.7013 39.008 14.2522 37.9287 14.2507 36.6667V34.375H39.459C40.7194 34.375 41.7988 33.9266 42.6971 33.0298C43.5954 32.133 44.0438 31.0537 44.0423 29.7917V13.75H46.334C47.5944 13.75 48.6738 14.1992 49.5721 15.0975C50.4704 15.9959 50.9188 17.0745 50.9173 18.3334V44.8594C50.9173 45.5469 50.6882 46.1107 50.2298 46.5507C49.7715 46.9907 49.2368 47.2099 48.6257 47.2084ZM9.66732 27.9011L12.36 25.2084H34.8757V9.16671H9.66732V27.9011ZM7.37565 35.75C6.76454 35.75 6.22982 35.5308 5.77148 35.0923C5.31315 34.6539 5.08398 34.0901 5.08398 33.4011V9.16671C5.08398 7.90629 5.53315 6.82768 6.43148 5.93087C7.32982 5.03407 8.40843 4.5849 9.66732 4.58337H34.8757C36.1361 4.58337 37.2154 5.03254 38.1138 5.93087C39.0121 6.82921 39.4605 7.90782 39.459 9.16671V25.2084C39.459 26.4688 39.0106 27.5482 38.1138 28.4465C37.217 29.3448 36.1376 29.7932 34.8757 29.7917H14.2507L8.97982 35.0625C8.75065 35.2917 8.50239 35.4636 8.23503 35.5782C7.96766 35.6927 7.68121 35.75 7.37565 35.75Z" fill="white"/>
                    </svg>
                </div>
                <div class="w-full">
                    <h2 class="text-lg font-semibold">Total Forum</h2>
                    <p class="text-2xl font-bold mt-2">8</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-primary">
                    <svg class="size-12 stroke-light" viewBox="0 0 46 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.25 28.125C26.3566 28.125 28.875 25.6066 28.875 22.5C28.875 19.3934 26.3566 16.875 23.25 16.875C20.1434 16.875 17.625 19.3934 17.625 22.5C17.625 25.6066 20.1434 28.125 23.25 28.125Z" stroke="white" stroke-width="3"/>
                        <path d="M38.6009 20.5013C39.3284 21.3863 39.6922 21.8269 39.6922 22.5C39.6922 23.1731 39.3284 23.6137 38.6009 24.4987C35.9384 27.7312 30.0659 33.75 23.2484 33.75C16.4309 33.75 10.5584 27.7312 7.89594 24.4987C7.16844 23.6137 6.80469 23.1731 6.80469 22.5C6.80469 21.8269 7.16844 21.3863 7.89594 20.5013C10.5584 17.2688 16.4309 11.25 23.2484 11.25C30.0659 11.25 35.9384 17.2688 38.6009 20.5013Z" stroke="white" stroke-width="3"/>
                    </svg>
                </div>
                <h2 class="font-semibold mt-1">Total View Forum</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">90.000</p>
                </div>
            </div>
            <div class="bg-light shadow-xl border border-gray-50 p-4 rounded-lg flex flex-col items-center justify-center">
                <div class="p-2 rounded-xl bg-accent">
                    <svg class="size-12 fill-light" viewBox="0 0 46 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.625 41.25C8.59375 41.25 7.71125 40.8831 6.9775 40.1494C6.24375 39.4156 5.87625 38.5325 5.875 37.5V28.9688L11.0312 23.1094L13.7031 25.7812L9.95313 30H35.5469L31.8906 25.875L34.5625 23.2031L39.625 28.9688V37.5C39.625 38.5312 39.2581 39.4144 38.5244 40.1494C37.7906 40.8844 36.9075 41.2513 35.875 41.25H9.625ZM9.625 37.5H35.875V33.75H9.625V37.5ZM20.1719 26.9531L13.5625 20.3438C12.8438 19.625 12.4925 18.7425 12.5087 17.6962C12.525 16.65 12.8919 15.7669 13.6094 15.0469L22.7969 5.85937C23.5156 5.14062 24.4062 4.76563 25.4688 4.73438C26.5312 4.70312 27.4219 5.04687 28.1406 5.76562L34.75 12.375C35.4688 13.0938 35.8438 13.9688 35.875 15C35.9062 16.0312 35.5625 16.9062 34.8438 17.625L25.4688 27C24.75 27.7188 23.8675 28.0706 22.8213 28.0556C21.775 28.0406 20.8919 27.6731 20.1719 26.9531ZM32.125 15.0469L25.5156 8.4375L16.2344 17.7188L22.8438 24.3281L32.125 15.0469Z" fill="white"/>
                    </svg>
                </div>
                <h2 class="font-semibold mt-1">Total Up Vote</h2>
                <div class="mt-2">
                    <p class="text-xl font-bold text-center">200</p>
                </div>
            </div>
        </div>
    
        <div x-data="chartVs()" x-init="init()" class="my-10">
            <h1 class="font-semibold text-lg text-center mb-5">Jumlah Pembelajaran vs Forum</h1>
            <canvas id="lineVs" height="150"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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