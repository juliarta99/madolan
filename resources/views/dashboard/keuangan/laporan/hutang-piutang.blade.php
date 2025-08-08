@extends('layouts.dashboard')

@section('content')
    <div class="pb-14">

        <h1 class="text-2xl lg:text-3xl font-bold mb-4">Laporan Hutang Piutang</h1>
        <div x-data="{
                showFixedDownload: false,
                checkScroll() {
                    const el = document.getElementById('downloadSection');
                    if (!el) return;
                    const rect = el.getBoundingClientRect();
                    this.showFixedDownload = rect.top < 0;
                },
                init() {
                    this.checkScroll();
                    const scrollContainer = document.getElementById('main');
                    scrollContainer.addEventListener('scroll', () => this.checkScroll());
                    window.addEventListener('scroll', () => this.checkScroll());
                }
            }" 
            x-init="init()"
            class="flex flex-col lg:flex-row gap-4 lg:gap-20 justify-between items-center"
        >
            <div class="transition-transform transform duration-700 w-full fixed bottom-0 left-0 px-4 py-2 md:pl-64 pb-6 md:pb-4 bg-secondary"
                :class="{ '-translate-y-[80%] md:translate-y-0': showFixedDownload, 'translate-y-full': !showFixedDownload }"
            >
                <div class="flex gap-2 mt-1 w-full">
                    <x-button.icon class="w-full" variant="danger">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="fill-light size-6">
                                <path d="M96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l80 0 0-112c0-35.3 28.7-64 64-64l176 0 0-165.5c0-17-6.7-33.3-18.7-45.3L290.7 18.7C278.7 6.7 262.5 0 245.5 0L96 0zM357.5 176L264 176c-13.3 0-24-10.7-24-24L240 58.5 357.5 176zM240 380c-11 0-20 9-20 20l0 128c0 11 9 20 20 20s20-9 20-20l0-28 12 0c33.1 0 60-26.9 60-60s-26.9-60-60-60l-32 0zm32 80l-12 0 0-40 12 0c11 0 20 9 20 20s-9 20-20 20zm96-80c-11 0-20 9-20 20l0 128c0 11 9 20 20 20l32 0c28.7 0 52-23.3 52-52l0-64c0-28.7-23.3-52-52-52l-32 0zm20 128l0-88 12 0c6.6 0 12 5.4 12 12l0 64c0 6.6-5.4 12-12 12l-12 0zm88-108l0 128c0 11 9 20 20 20s20-9 20-20l0-44 28 0c11 0 20-9 20-20s-9-20-20-20l-28 0 0-24 28 0c11 0 20-9 20-20s-9-20-20-20l-48 0c-11 0-20 9-20 20z"/>
                            </svg>
                        </x-slot:icon>
                        PDF
                    </x-button.icon>
                    <x-button.icon class="w-full" variant="success">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="fill-light size-6">
                                <path d="M128 128C128 92.7 156.7 64 192 64L341.5 64C358.5 64 374.8 70.7 386.8 82.7L493.3 189.3C505.3 201.3 512 217.6 512 234.6L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 128zM336 122.5L336 216C336 229.3 346.7 240 360 240L453.5 240L336 122.5zM292 330.7C284.6 319.7 269.7 316.7 258.7 324C247.7 331.3 244.7 346.3 252 357.3L291.2 416L252 474.7C244.6 485.7 247.6 500.6 258.7 508C269.8 515.4 284.6 512.4 292 501.3L320 459.3L348 501.3C355.4 512.3 370.3 515.3 381.3 508C392.3 500.7 395.3 485.7 388 474.7L348.8 416L388 357.3C395.4 346.3 392.4 331.4 381.3 324C370.2 316.6 355.4 319.6 348 330.7L320 372.7L292 330.7z"/>
                            </svg>
                        </x-slot:icon>
                        Excel
                    </x-button.icon>
                </div>
            </div>
            <div class="flex md:flex-row flex-col gap-2 w-full">
                <x-input.daterange class="w-full !flex-row" />
                <div class="w-full">
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
            <div id="downloadSection" class="w-full lg:w-max">
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 md:size-6">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold text-sm md:text-base">Export</span>
                </div>
                <div class="flex gap-2 mt-1 w-full lg:w-max">
                    <x-button.icon class="w-full" variant="danger">
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="fill-light size-6">
                                <path d="M96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l80 0 0-112c0-35.3 28.7-64 64-64l176 0 0-165.5c0-17-6.7-33.3-18.7-45.3L290.7 18.7C278.7 6.7 262.5 0 245.5 0L96 0zM357.5 176L264 176c-13.3 0-24-10.7-24-24L240 58.5 357.5 176zM240 380c-11 0-20 9-20 20l0 128c0 11 9 20 20 20s20-9 20-20l0-28 12 0c33.1 0 60-26.9 60-60s-26.9-60-60-60l-32 0zm32 80l-12 0 0-40 12 0c11 0 20 9 20 20s-9 20-20 20zm96-80c-11 0-20 9-20 20l0 128c0 11 9 20 20 20l32 0c28.7 0 52-23.3 52-52l0-64c0-28.7-23.3-52-52-52l-32 0zm20 128l0-88 12 0c6.6 0 12 5.4 12 12l0 64c0 6.6-5.4 12-12 12l-12 0zm88-108l0 128c0 11 9 20 20 20s20-9 20-20l0-44 28 0c11 0 20-9 20-20s-9-20-20-20l-28 0 0-24 28 0c11 0 20-9 20-20s-9-20-20-20l-48 0c-11 0-20 9-20 20z"/>
                            </svg>
                        </x-slot:icon>
                        PDF
                    </x-button.icon>
                    <x-button.icon class="w-full" variant="success">
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
    
        <div x-data x-init="initChart()" class="grid grid-cols-1 md:grid-cols-2 gap-12 my-10">
            <div class="w-full">
                <h1 class="font-semibold text-base md:text-lg text-center mb-5">Chart Hutang</h1>
                <canvas id="chartHutang"></canvas>
            </div>
            <div class="w-full">
                <h1 class="font-semibold text-base md:text-lg text-center mb-5">Chart Piutang</h1>
                <canvas id="chartPiutang"></canvas>
            </div>
            <div class="w-full col-span-1 md:col-span-2">
                <h1 class="font-semibold text-base md:text-lg text-center mb-5">Chart Hutang Piutang</h1>
                <div class="max-w-100 mx-auto">
                    <canvas id="chartHutangPiutang"></canvas>
                </div>
            </div>
        </div>
    
        <div x-data="hutangPiutangDummy()" x-init="init()" class="space-y-4">
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
                            <th class="px-4 py-2 text-left">Waktu</th>
                            <th class="px-4 py-2 text-left">Tipe</th>
                            <th class="px-4 py-2 text-left">Deskripsi</th>
                            <th class="px-4 py-2 text-left">Total</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <tbody class="text-gray-700">
                            <template x-for="item in transaksi" :key="item.id">
                            <tr class="odd:bg-white even:bg-gray-100">
                                <td class="px-4 py-2 text-left" x-text="item.waktu"></td>
                                <td class="px-4 py-2 text-left" x-text="item.tipe"></td>
                                <td class="px-4 py-2 text-left" x-text="item.deskripsi"></td>
                                <td class="px-4 py-2 text-left" x-text="formatRupiah(item.total)"></td>
                                <td class="px-4 py-2 text-left">
                                    <template x-if="item.status == 1">
                                        <x-badge backgroundColor="bg-success">Lunas</x-badge>
                                    </template>
                                    <template x-if="item.status == 0">
                                        <x-badge backgroundColor="bg-danger">Belum Lunas</x-badge>
                                    </template>
                                </td>
                                <td class="px-4 py-2 text-left">
                                    <a href="">
                                        <button
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                    </a>
                                </td>
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 mb-10">
                <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                    <div class="flex items-center gap-2">
                        <svg viewBox="0 0 24 24" class="fill-success size-12" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                            <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                        </svg>
                        <div class="flex flex-col gap-1">
                            <h3 class="font-semibold text-success">Hutang Lunas</h3>
                            <p class="text-xl font-bold" x-text="formatRupiah(hutang_lunas)"></p>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                    <div class="flex items-center gap-2">
                        <svg viewBox="0 0 24 24" class="fill-success size-12" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                            <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                        </svg>
                        <div class="flex flex-col gap-1">
                            <h3 class="font-semibold text-success">Piutang Lunas</h3>
                            <p class="text-xl font-bold" x-text="formatRupiah(piutang_lunas)"></p>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                    <div class="flex items-center gap-2">
                        <svg viewBox="0 0 24 24" class="fill-danger size-12" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                            <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                        </svg>
                        <div class="flex flex-col gap-1">
                            <h3 class="font-semibold text-danger">Hutang Belum Lunas</h3>
                            <p class="text-xl font-bold" x-text="formatRupiah(hutang_belum_lunas)"></p>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-xl shadow-xl border border-gray-50">
                    <div class="flex items-center gap-2">
                        <svg viewBox="0 0 24 24" class="fill-danger size-12" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12.5C11.0717 12.5 10.1815 12.8687 9.52513 13.5251C8.86875 14.1815 8.5 15.0717 8.5 16C8.5 16.9283 8.86875 17.8185 9.52513 18.4749C10.1815 19.1313 11.0717 19.5 12 19.5C12.9283 19.5 13.8185 19.1313 14.4749 18.4749C15.1313 17.8185 15.5 16.9283 15.5 16C15.5 15.0717 15.1313 14.1815 14.4749 13.5251C13.8185 12.8687 12.9283 12.5 12 12.5ZM10.5 16C10.5 15.6022 10.658 15.2206 10.9393 14.9393C11.2206 14.658 11.6022 14.5 12 14.5C12.3978 14.5 12.7794 14.658 13.0607 14.9393C13.342 15.2206 13.5 15.6022 13.5 16C13.5 16.3978 13.342 16.7794 13.0607 17.0607C12.7794 17.342 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.342 10.9393 17.0607C10.658 16.7794 10.5 16.3978 10.5 16Z"/>
                            <path d="M17.526 5.116L14.347 0.658997L2.658 9.997L2.01 9.99V10H1.5V22H22.5V10H21.538L19.624 4.401L17.526 5.116ZM19.425 10H9.397L16.866 7.454L18.388 6.967L19.425 10ZM15.55 5.79L7.84 8.418L13.946 3.54L15.55 5.79ZM3.5 18.169V13.829C3.92218 13.68 4.30565 13.4384 4.62231 13.1219C4.93896 12.8054 5.18077 12.4221 5.33 12H18.67C18.8191 12.4223 19.0609 12.8058 19.3775 13.1225C19.6942 13.4391 20.0777 13.6809 20.5 13.83V18.17C20.0777 18.3191 19.6942 18.5609 19.3775 18.8775C19.0609 19.1942 18.8191 19.5777 18.67 20H5.332C5.18218 19.5777 4.93996 19.1941 4.62302 18.8774C4.30607 18.5606 3.9224 18.3186 3.5 18.169Z"/>
                        </svg>
                        <div class="flex flex-col gap-1">
                            <h3 class="font-semibold text-danger">Piutang Belum Lunas</h3>
                            <p class="text-xl font-bold" x-text="formatRupiah(piutang_belum_lunas)"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initChart() {
            const ctxHutang = document.getElementById('chartHutang').getContext('2d');
            const ctxPiutang = document.getElementById('chartPiutang').getContext('2d');
            const ctxHutangPiutang = document.getElementById('chartHutangPiutang').getContext('2d');

            new Chart(ctxHutang, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Hutang Usaha',
                        'Hutang Pinjaman',
                        'Hutang Operasional',
                    ],
                    datasets: [{
                        label: 'Chart Hutang',
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


            new Chart(ctxPiutang, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Piutang Penjualan',
                        'Piutang Pinjaman',
                        'Lain-Lain',
                    ],
                    datasets: [{
                        label: 'Chart Piutang',
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

            new Chart(ctxHutangPiutang, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Hutang',
                        'Piutang',
                    ],
                    datasets: [{
                        label: 'Chart Hutang Piutang',
                        data: [60, 40],
                        backgroundColor: [
                            '#F65D5D',
                            '#3B82F6',
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

        function hutangPiutangDummy() {
            return {
                start: '2025-08-10',
                end: '2025-08-25',
                transaksi: [],
                hutang_lunas: 0,
                hutang_belum_lunas: 0,
                piutang_lunas: 0,
                piutang_belum_lunas: 0,

                init() {
                    this.fetchData()
                },

                fetchData() {
                    this.transaksi = Array.from({ length: 10 }).map((_, i) => ({
                        id: i + 1,
                        waktu: '10/08/2025 15:00:15',
                        tipe: 'Hutang',
                        deskripsi: 'Hutang Terus ini',
                        total: 80000,
                        status: i % 2,
                    }))

                    this.hutang_lunas = 12150000
                    this.hutang_belum_lunas = 7490000
                    this.piutang_lunas = 8303293
                    this.piutang_belum_lunas = 90992039
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