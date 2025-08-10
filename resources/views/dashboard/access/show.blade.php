@extends('layouts.dashboard')

@section('content')
    <x-header-with-back route="{{ route('dashboard.access') }}" titleBeforeSpan="Detail" titleInSpan="Pegawai" />
    <x-button.icon>
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-light"><path d="M400 416C497.2 416 576 337.2 576 240C576 142.8 497.2 64 400 64C302.8 64 224 142.8 224 240C224 258.7 226.9 276.8 232.3 293.7L71 455C66.5 459.5 64 465.6 64 472L64 552C64 565.3 74.7 576 88 576L168 576C181.3 576 192 565.3 192 552L192 512L232 512C245.3 512 256 501.3 256 488L256 448L296 448C302.4 448 308.5 445.5 313 441L346.3 407.7C363.2 413.1 381.3 416 400 416zM440 160C462.1 160 480 177.9 480 200C480 222.1 462.1 240 440 240C417.9 240 400 222.1 400 200C400 177.9 417.9 160 440 160z"/></svg>
        </x-slot:icon>
        Update Password
    </x-button.icon>
    <div class="my-4">
        <x-badge class="w-max">Kasir</x-badge>
        <div class="flex mt-1 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
            <p class="font-semibold">Nyoman Lastri</p>
            <x-badge backgroundColor="bg-success">Aktif</x-badge>
        </div>
        <div class="flex mt-1 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6"><path d="M240 192C240 147.8 275.8 112 320 112C364.2 112 400 147.8 400 192C400 236.2 364.2 272 320 272C275.8 272 240 236.2 240 192zM448 192C448 121.3 390.7 64 320 64C249.3 64 192 121.3 192 192C192 262.7 249.3 320 320 320C390.7 320 448 262.7 448 192zM144 544C144 473.3 201.3 416 272 416L368 416C438.7 416 496 473.3 496 544L496 552C496 565.3 506.7 576 520 576C533.3 576 544 565.3 544 552L544 544C544 446.8 465.2 368 368 368L272 368C174.8 368 96 446.8 96 544L96 552C96 565.3 106.7 576 120 576C133.3 576 144 565.3 144 552L144 544z"/></svg>
            <p class="font-semibold">nyomanlastri13</p>
        </div>
        <div class="flex mt-1 gap-2">
            <svg class="size-6" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M27.7083 15.3125V14.5833C27.7083 9.08395 27.7083 6.33353 25.9992 4.62582C24.29 2.91811 21.541 2.91666 16.0417 2.91666C10.5423 2.91666 7.79187 2.91666 6.08417 4.62582C4.37646 6.33499 4.375 9.08395 4.375 14.5833V21.1458C4.375 25.9394 4.375 28.3369 5.69917 29.9512C5.94222 30.2468 6.21153 30.5161 6.50708 30.7592C8.12292 32.0833 10.5175 32.0833 15.3125 32.0833M10.2083 10.2083H21.875M10.2083 16.0417H16.0417" stroke="#070707" stroke-width="2.1875" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M26.25 26.9791L24.0625 26.1771V22.6041M17.5 25.5208C17.5 26.3826 17.6697 27.236 17.9995 28.0322C18.3293 28.8284 18.8127 29.5518 19.4221 30.1612C20.0315 30.7706 20.7549 31.254 21.5511 31.5838C22.3473 31.9136 23.2007 32.0833 24.0625 32.0833C24.9243 32.0833 25.7777 31.9136 26.5739 31.5838C27.3701 31.254 28.0935 30.7706 28.7029 30.1612C29.3123 29.5518 29.7957 28.8284 30.1255 28.0322C30.4553 27.236 30.625 26.3826 30.625 25.5208C30.625 23.7803 29.9336 22.1111 28.7029 20.8804C27.4722 19.6497 25.803 18.9583 24.0625 18.9583C22.322 18.9583 20.6528 19.6497 19.4221 20.8804C18.1914 22.1111 17.5 23.7803 17.5 25.5208Z" stroke="#070707" stroke-width="2.1875" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="font-semibold">Total Created: 133</p>
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <h1 class="text-base md:text-lg lg:text-xl font-semibold">Riwayat Transaksi oleh Nyoman Rai</h1>
        <x-form.search 
            name="search"
            placeholder="Search transaksi"
            class="w-full"
        />
        <div
                class="overflow-x-auto bg-light shadow-xl rounded-lg"
            >
            <!-- Table Header -->
            <table class="w-full table-auto text-sm">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th class="px-4 py-2 text-left">Waktu</th>
                        <th class="px-4 py-2 text-left">Kode</th>
                        <th class="px-4 py-2 text-left">Tipe</th>
                        <th class="px-4 py-2 text-left">Subtotal</th>
                        <th class="px-4 py-2 text-left">Kasir</th>
                        <th class="px-4 py-2 text-left">Pembayaran</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
    
                <!-- Table Body -->
                <tbody class="text-gray-700">
                    @for ($i = 0; $i<10; $i++)
                        <tr class="border-b border-b-gray-300 even:bg-gray-50">
                            <td class="px-4 py-2">10/08/2023 10:32:42</td>
                            <td class="px-4 py-2">TR3042024921</td>
                            <td class="px-4 py-2">Akuntan</td>
                            <td class="px-4 py-2">Rp 30.000</td>
                            <td class="px-4 py-2">Nyoman Rai</td>
                            <td class="px-4 py-2">Cash</td>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 8V5H8V8H6V3H18V8H16ZM18 12.5C18.2833 12.5 18.521 12.404 18.713 12.212C18.905 12.02 19.0007 11.7827 19 11.5C18.9993 11.2173 18.9033 10.98 18.712 10.788C18.5207 10.596 18.2833 10.5 18 10.5C17.7167 10.5 17.4793 10.596 17.288 10.788C17.0967 10.98 17.0007 11.2173 17 11.5C16.9993 11.7827 17.0953 12.0203 17.288 12.213C17.4807 12.4057 17.718 12.5013 18 12.5ZM16 19V15H8V19H16ZM18 21H6V17H2V11C2 10.15 2.29167 9.43767 2.875 8.863C3.45833 8.28833 4.16667 8.00067 5 8H19C19.85 8 20.5627 8.28767 21.138 8.863C21.7133 9.43833 22.0007 10.1507 22 11V17H18V21ZM20 15V11C20 10.7167 19.904 10.4793 19.712 10.288C19.52 10.0967 19.2827 10.0007 19 10H5C4.71667 10 4.47933 10.096 4.288 10.288C4.09667 10.48 4.00067 10.7173 4 11V15H6V13H18V15H20Z" fill="#27AE60"/>
                                            </svg>
                                        </button>
                                    </a>
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
        </div>
    </div>
@endsection