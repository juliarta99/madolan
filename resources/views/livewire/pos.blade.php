<div class="">
    @if ($currentStep == 1)
        <nav class="shadow-md py-3">
            <div class="flex justify-between items-center md:px-10 px-3">
                <div class="hidden lg:flex gap-x-4 ">
                    <button class="bg-blue-500 items-center rounded-xl w-12 h-12 flex justify-center ">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="18" height="20" viewBox="0 0 18 20" fill="none" >
                        <path d="M8.99609 0.5C9.35252 0.5 9.66266 0.603787 9.94238 0.816406V0.817383L16.8652 6.11719L16.8721 6.12207C17.0656 6.26551 17.2178 6.4475 17.3301 6.67578L17.3311 6.67773C17.4441 6.90564 17.5 7.14456 17.5 7.40039V18.7002C17.5 18.9103 17.4282 19.0895 17.2598 19.2598C17.0914 19.4299 16.9165 19.5 16.7139 19.5H11.7207C11.553 19.5 11.4355 19.4483 11.335 19.3467C11.2338 19.2435 11.1816 19.1217 11.1816 18.9492V11.8506H6.81836V18.9492C6.81836 19.1236 6.76491 19.2447 6.66406 19.3467C6.56324 19.4485 6.44654 19.5 6.28027 19.5H1.28613C1.08353 19.5 0.908573 19.4299 0.740234 19.2598C0.571824 19.0895 0.500037 18.9103 0.5 18.7002V7.40039C0.500047 7.14456 0.555916 6.90563 0.668945 6.67773C0.782362 6.44905 0.935237 6.26601 1.12891 6.12207L1.13477 6.11816L8.05859 0.816406L8.05957 0.81543C8.33309 0.60427 8.63935 0.500009 8.99609 0.5ZM9 0.800781C8.71322 0.800781 8.44844 0.893678 8.22754 1.07812L1.30371 6.35254L1.28418 6.36816C1.14066 6.48931 1.02222 6.63363 0.932617 6.79883C0.855745 6.94064 0.810936 7.09164 0.793945 7.24707L0.786133 7.40039V19.2002H6.53223V12.1006C6.53223 11.9283 6.58494 11.8074 6.68652 11.7051L6.68848 11.7031C6.78942 11.6007 6.90581 11.5498 7.07129 11.5498H10.9287C11.0943 11.5498 11.2114 11.6009 11.3135 11.7041C11.4146 11.8064 11.4678 11.9275 11.4678 12.1006V19.2002H17.2139V7.40039C17.2138 7.19274 17.1685 6.99036 17.0703 6.80371C16.9805 6.63306 16.8587 6.48619 16.71 6.36426L16.7031 6.3584L16.6963 6.35352L9.77344 1.07812C9.55205 0.89401 9.28719 0.800781 9 0.800781Z" fill="#FCFDFD" stroke="#FCFDFD"/>
                        </svg>
                    </button>
                    <div class="bg-blue-500 items-center flex text-white px-5 py-3 rounded-xl gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19 19H5V8H19M16 1V3H8V1H6V3H5C3.89 3 3 3.89 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V5C21 4.46957 20.7893 3.96086 20.4142 3.58579C20.0391 3.21071 19.5304 3 19 3H18V1M17 12H12V17H17V12Z" fill="#FCFDFD"/>
                        </svg>
                        <p>Minggu, 03/08/2025</p>
                    </div>
                </div>
                <div class="flex justify-center items-center gap-3">
                    <img src="{{ asset('assets/logo.svg')}}" class="w-6 md:w-10" alt="logo Madolan">
                    <h1 class="text-xl md:text-2xl font-semibold">Madolan</h1>
                </div>
                <div class="flex justify-center items-center gap-3">
                    <button wire:click="toggleScan()" x-data="{ scan: @entangle('scan') }"
                        x-bind:class="scan ? 'bg-orange-500' : 'bg-blue-500 text-black'"
                        class="cursor-pointer transition duration-300 items-center flex justify-center w-7 h-7 md:h-12 md:w-12 md:rounded-xl rounded-[8px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="md:w-6 md:h-6 h-4 w-4" viewBox="0 0 24 24" fill="none">
                        <path d="M4 8V6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4H8M4 16V18C4 18.5304 4.21071 19.0391 4.58579 19.4142C4.96086 19.7893 5.46957 20 6 20H8M16 4H18C18.5304 4 19.0391 4.21071 19.4142 4.58579C19.7893 4.96086 20 5.46957 20 6V8M16 20H18C18.5304 20 19.0391 19.7893 19.4142 19.4142C19.7893 19.0391 20 18.5304 20 18V16M7 12H17" stroke="#FCFDFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="cursor-pointer bg-blue-500 items-center flex justify-center w-7 h-7 md:h-12 md:w-12 md:rounded-xl rounded-[8px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="md:w-6 md:h-6 h-4 w-4" fill="white" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 128C426 128 512 214 512 320C512 426 426 512 320 512C254.8 512 197.1 479.5 162.4 429.7C152.3 415.2 132.3 411.7 117.8 421.8C103.3 431.9 99.8 451.9 109.9 466.4C156.1 532.6 233 576 320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C234.3 64 158.5 106.1 112 170.7L112 144C112 126.3 97.7 112 80 112C62.3 112 48 126.3 48 144L48 256C48 273.7 62.3 288 80 288L104.6 288C105.1 288 105.6 288 106.1 288L192.1 288C209.8 288 224.1 273.7 224.1 256C224.1 238.3 209.8 224 192.1 224L153.8 224C186.9 166.6 249 128 320 128zM344 216C344 202.7 333.3 192 320 192C306.7 192 296 202.7 296 216L296 320C296 326.4 298.5 332.5 303 337L375 409C384.4 418.4 399.6 418.4 408.9 409C418.2 399.6 418.3 384.4 408.9 375.1L343.9 310.1L343.9 216z"/></svg>
                    </button>
                    <button class="cursor-pointer bg-blue-500 items-center flex justify-center text-white w-7 h-7 md:w-12 md:h-12 lg:w-40   gap-2 md:rounded-xl rounded-[8px]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="md:w-6 md:h-6 h-4 w-4" viewBox="0 0 24 24" fill="none">
                        <path d="M9 3.75H5.25V21.75H18.75V3.75H15M7.5 17.25H16.5M9 5.25H15L15.75 2.25H8.25L9 5.25ZM9 15L11.25 14.25L15.75 9.75L14.25 8.25L9.75 12.75L9 15Z" stroke="#FCFDFD" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-2xl font-semibold hidden lg:block">Pre-Order</p>
                    </button>
                </div>
            </div>
        </nav>
    
        <main class="w-full lg:flex h-screen">

            @if(!$scan)
                <div 
                    x-data="{ 
                        nama: @entangle('customProduk.nama').defer, 
                        harga: @entangle('customProduk.harga').defer, 
                        satuan: @entangle('customProduk.satuan').defer 
                    }"
                    popover
                    id="custom-produk"
                    class="shadow-xl absolute w-150 bg-white rounded-2xl left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 p-6 z-100">

                    <div class="flex justify-between items-center">
                        <p class="font-semibold">Custom Produk</p>
                        <button popovertarget="custom-produk">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="w-8 h-7 cursor-pointer" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
                        </button>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-gray-700 text-sm font-medium">Nama</label>
                        <input 
                            x-model="nama"
                            type="text" 
                            placeholder="Nama Produk"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50"
                        >
                    </div>

                    <div class="space-y-2 mt-2">
                        <label class="block text-gray-700 text-sm font-medium">Harga</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">Rp.</span>
                            <input 
                                x-model="harga"
                                type="number"
                                min="0"
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg bg-gray-50"
                            >
                        </div>
                    </div>

                    <div class="space-y-2 mt-2">
                        <label class="block text-gray-700 text-sm font-medium">Satuan</label>
                        <input 
                            x-model="satuan"
                            type="text"
                            placeholder="biji, kg, butir"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50"
                        >
                    </div>

                    <div class="flex mt-3 gap-2">
                        <button 
                            x-on:click="
                                nama = '';
                                harga = 0;
                                satuan = '';
                            " 
                            popovertarget="custom-produk"
                            class="cursor-pointer text-base rounded-2xl flex-1 bg-red-400 hover:bg-red-500 text-white font-semibold py-3 transition-colors">
                            Batal
                        </button>

                        <button 
                            x-on:click="@this.call('custom', nama, harga, satuan); 
                            nama = '';
                            harga = 0;
                            satuan = '';" 
                            popovertarget="custom-produk"
                            class="cursor-pointer text-base rounded-2xl flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 transition-colors">
                            Terapkan
                        </button>
                    </div>
                </div>
                <section class="pt-6 lg:w-[70%] overflow-y-scroll bg-gray-100 pb-50 ">
                    <div class="md:mx-10">
                        <div class="bg-white md:p-4 p-2 rounded-xl shadow flex items-center gap-2 md:gap-4 w-full">
                        <!-- Dropdown Kategori -->
                            <form class="flex flex-col w-1/3">
                                <label class="text-[12px] sm:text-sm font-semibold mb-1">Kategori Produk</label>
                                <div class="relative">
                                    <select class="w-full border border-gray-300 rounded-lg px-3 h-8 text-sm text-gray-600 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option selected disabled>Pilih...</option>
                                        <option value="elektronik">Elektronik</option>
                                        <option value="pakaian">Pakaian</option>
                                        <option value="minuman">Makanan</option>
                                    </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                </div>
                            </form>

                        <!-- Input Cari Produk -->
                            <form class="flex flex-col w-2/3">
                                <label class="text-[12px] sm:text-sm font-semibold mb-1">Cari Produk</label>
                                <div class="flex rounded-lg overflow-hidden border border-gray-300 focus-within:ring-2 focus-within:ring-blue-500">
                                <input type="text" name="produk" placeholder="Cari Produk" class="w-full px-3  text-sm text-gray-600 focus:outline-none">
                                <button type="submit" class="bg-blue-600 p-2 flex items-center justify-center cursor-pointer">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                                    </svg>
                                </button>
                                </div>
                            </form>
                        </div>


                        <button popovertarget="custom-produk" class="cursor-pointer mt-6 py-2 bg-blue-500 text-white flex items-center justify-center gap-2 rounded-xl w-full px-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                            <path d="M8.5 15.3819V9.33861L1.83333 6.12092V14.9696L7.5 17.7147L7.17708 18.9917L0.5 15.774V4.67295L9.16667 0.5L17.8333 4.67295V7.38788C17.3472 7.46162 16.9028 7.61245 16.5 7.84037V6.12092L9.83333 9.33861V14.0948L8.5 15.3819ZM7.02083 2.96355L13.1042 6.32202L15.6771 5.07516L9.16667 1.92785L7.02083 2.96355ZM9.16667 8.22247L11.6667 7.01584L5.58333 3.65737L2.65625 5.07516L9.16667 8.22247ZM18.4167 8.9364C18.7083 8.9364 18.9792 8.98668 19.2292 9.08723C19.4792 9.18778 19.7014 9.32521 19.8958 9.4995C20.0903 9.67379 20.2361 9.88495 20.3333 10.133C20.4306 10.381 20.4861 10.6458 20.5 10.9274C20.5 11.1888 20.4479 11.4435 20.3438 11.6916C20.2396 11.9396 20.0903 12.1574 19.8958 12.3451L12.4271 19.5548L8.5 20.5L9.47917 16.7092L16.9479 9.50955C17.1493 9.31515 17.375 9.17102 17.625 9.07718C17.875 8.98333 18.1389 8.9364 18.4167 8.9364ZM18.9479 11.4402C19.0938 11.2994 19.1667 11.1285 19.1667 10.9274C19.1667 10.7195 19.0972 10.552 18.9583 10.4246C18.8194 10.2972 18.6389 10.2302 18.4167 10.2235C18.3194 10.2235 18.2257 10.2369 18.1354 10.2637C18.0451 10.2905 17.9653 10.3408 17.8958 10.4145L10.6875 17.3728L10.3333 18.7303L11.7396 18.3884L18.9479 11.4402Z" fill="#FCFDFD"/>
                            </svg>
                            <p class="">Custom Produk</p>
                        </button>
                    </div>
                    
                    <p class="mx-3 md:mx-10 text-[16px] md:text-xl font-semibold mt-2">Dimsum</p>
                    <!-- grid produk -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-4 mx-4">
                        <!-- Card 1 -->
                        @foreach ($datas as $data)
                            <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center text-center">
                                <img src="{{ asset('assets/logo.svg')}}" alt="Siomay" class="rounded-lg w-full h-36 object-cover mb-3">

                                <div class="flex items-center gap-1 text-sm text-gray-600 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M1.48047 5.12501L9.50172 1.47876L17.523 5.12501M1.48047 5.12501L9.50172 8.77126M1.48047 5.12501V13.1463L9.50172 17.5213M17.523 5.12501L9.50172 8.77126M17.523 5.12501V13.1463L9.50172 17.5213M9.50172 8.77126V17.5213M12.6267 15.75V11.375M15.1267 14.5V10.125" stroke="#282828" stroke-width="1.5" stroke-linejoin="round"/>
                                    </svg>
                                    <span>{{ $data['stok'] }}</span>
                                </div>

                                <p class="font-medium mb-1">{{ $data['nama'] }}</p>
                                <p class="text-lg font-bold text-black mb-3">Rp {{ number_format($data['harga'], 0, ',', '.') }}</p>

                                <div class="flex items-center gap-4">
                                    <button 
                                        wire:click="kurangDariCart('{{ $data['nama'] }}')" 
                                        class="bg-blue-600 cursor-pointer text-white w-8 h-8 rounded-full flex items-center justify-center text-2xl"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 11 11" fill="none">
                                            <path d="M9.875 6.125H1.125V4.875H9.875V6.125Z" fill="#FCFDFD"/>
                                        </svg>
                                    </button>

                                    <span class="text-lg font-semibold">
                                        {{ $cart[$data['nama']]['qty'] ?? 0 }}
                                    </span>

                                    <button 
                                        wire:click="tambahKeCart('{{ $data['nama'] }}')" 
                                        class="bg-blue-600 cursor-pointer text-white w-8 h-8 rounded-full flex items-center justify-center text-2xl"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                            <path d="M14.3359 7.92857H8.33594V13.5H6.33594V7.92857H0.335938V6.07143H6.33594V0.5H8.33594V6.07143H14.3359V7.92857Z" fill="#FCFDFD"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                </section>
            @else 
                <section class="pt-3 lg:w-[70%] overflow-y-scroll bg-gray-100 pb-50 ">
                    <div class="flex flex-col mx-3 md:mx-10">
                        <button wire:click="toggleScan()" class="bg-orange-500 text-white flex items-center gap-2 justify-center my-2 cursor-pointer rounded-xl p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                            <path d="M4.49994 9.99997L3.79294 10.707L3.08594 9.99997L3.79294 9.29297L4.49994 9.99997ZM21.4999 18C21.4999 18.2652 21.3946 18.5195 21.207 18.7071C21.0195 18.8946 20.7652 19 20.4999 19C20.2347 19 19.9804 18.8946 19.7928 18.7071C19.6053 18.5195 19.4999 18.2652 19.4999 18H21.4999ZM8.79294 15.707L3.79294 10.707L5.20694 9.29297L10.2069 14.293L8.79294 15.707ZM3.79294 9.29297L8.79294 4.29297L10.2069 5.70697L5.20694 10.707L3.79294 9.29297ZM4.49994 8.99997H14.4999V11H4.49994V8.99997ZM21.4999 16V18H19.4999V16H21.4999ZM14.4999 8.99997C16.3565 8.99997 18.1369 9.73747 19.4497 11.0502C20.7624 12.363 21.4999 14.1435 21.4999 16H19.4999C19.4999 14.6739 18.9732 13.4021 18.0355 12.4644C17.0978 11.5268 15.826 11 14.4999 11V8.99997Z" fill="#FCFDFD"/>
                            </svg>
                            <p>Keluar dari Mode Scan</p>
                        </button>
                        <Label class="mb-2 font-semibold">Camera Source</Label>
                        <div class="relative">
                            <select class="w-full border border-gray-300 rounded-lg px-3 h-8 text-sm text-gray-600 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option selected disabled>Pilih...</option>
                                <option>Camere Fuji</option>
                                <option>Camera Canon</option>
                                <option>Camera Musang</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex md:mx-10 mx-3 my-4 gap-3 text-white text-[18px] font-semibold">
                        <button class=" bg-blue-500 w-1/2 py-3 rounded-2xl cursor-pointer">
                            Sambungkan Kamera
                        </button>
                        <button class="bg-red-400 w-1/2 py-3 rounded-2xl cursor-pointer">
                            Reset
                        </button>
                    </div>

                    <div class="md:mx-10 mx-3 w-85 h-50 rounded-2xl border-1 border-gray-300">
                        <img class="md:mx-10 mx-3 w-85" src="resource/code.png" alt="">
                    </div>
                    <p class="mx-3 md:mx-10 text-[16px] md:text-xl font-semibold">Hasil Scan</p>

                    <div class="flex-col gap-4 items-start mx-3 md:mx-10 bg-white p-3 rounded-2xl">
                        <div class="flex gap-4">
                            <img src="resource/dimsum.png" alt="Siomay" class="w-30 h-20 rounded-lg object-cover">
                            <div class="flex-1">
                                <h3 class="font-medium text-sm md:text-base">Siomay Ayam Full Daging</h3>
                                <p class="font-bold text-sm md:text-xl text-black">Rp 12.000</p>
                                <div class="flex items-center gap-4 mt-2">
                                        <button class="bg-blue-600 text-white w-6 h-6 rounded-full items-center text-center flex justify-center text-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M9.875 6.125H1.125V4.875H9.875V6.125Z" fill="#FCFDFD"/>
                                            </svg>
                                        </button>
                                        <span class="text-lg font-semibold">2</span>
                                        <button class="bg-blue-600 text-white w-6 h-6 rounded-full items-center text-center flex justify-center text-2xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 15 14" fill="none">
                                        <path d="M14.3359 7.92857H8.33594V13.5H6.33594V7.92857H0.335938V6.07143H6.33594V0.5H8.33594V6.07143H14.3359V7.92857Z" fill="#FCFDFD"/>
                                        </svg>
                            </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-md font-semibold">Total:</p>
                            <p class="text-lg font-bold text-black">Rp 24.000</p>
                        </div>
                    </div>

                    <div class="flex mx-3 md:mx-10 my-4 gap-3 text-white text-[18px] font-semibold">
                        <button class=" bg-red-400 w-1/2 py-3 rounded-2xl">
                            Batal
                        </button>
                        <button class="bg-blue-500 w-1/2 py-3 rounded-2xl">
                            Tambahkan
                        </button>
                    </div>
                </section>
            @endif
            <aside class="lg:w-[30%] overflow-y-scroll">
                <div popover id="detai-cart" class="fixed space-y-6 p-6 lg:block rounded-xl lg:rounded-none lg:p-4 lg:max-w-md w-[100%] z-30 mx-auto lg:pb-70 bg-white h-[100%] lg:h-auto overflow-y-scroll top-1/2 left-1/2  transform -translate-x-1/2 -translate-y-1/2 lg:static lg:top-auto lg:left-auto lg:transform-none lg:translate-x-0 lg:translate-y-0">
                    
                    <div class=" flex justify-between items-center lg:hidden">
                        <p class="">Detail Cart</p>
                        <button popovertarget="detai-cart">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="w-8 h-7 cursor-pointer" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
                        </button>
                    </div>

                    @if (count($cart) > 0)
                        @foreach ($cart as $item)
                        <div class="flex-col gap-4 items-start">
                            <div class="flex gap-4">
                                <img src="{{ asset('assets/logo.svg')}}" alt="Siomay" class="w-30 h-20 rounded-lg object-cover">
                                <div class="flex-1">
                                    <h3 class="font-medium text-sm md:text-base">{{ $item['nama'] }}</h3>
                                    <p class="font-bold text-sm md:text-xl text-black">Rp {{ $item['harga'] }}</p>
                                    <div class="flex items-center gap-4 mt-2">
                                        <button wire:click="kurangDariCart('{{ $item['nama'] }}')" class="bg-blue-600 cursor-pointer text-white w-6 h-6 rounded-full items-center text-center flex justify-center text-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                            <path d="M9.875 6.125H1.125V4.875H9.875V6.125Z" fill="#FCFDFD"/>
                                            </svg>
                                        </button>
                                        <span  class="text-lg font-semibold">{{ $item['qty'] }}</span>
                                        <button wire:click="tambahKeCart('{{ $item['nama'] }}')" class="bg-blue-600 cursor-pointer text-white w-6 h-6 rounded-full items-center text-center flex justify-center text-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 15 14" fill="none">
                                            <path d="M14.3359 7.92857H8.33594V13.5H6.33594V7.92857H0.335938V6.07143H6.33594V0.5H8.33594V6.07143H14.3359V7.92857Z" fill="#FCFDFD"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-md font-semibold">Total:</p>
                                <p class="text-lg font-bold text-black">{{ $item['qty'] * $item['harga'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif

                    
                </div>
                <div class=" items-center border-t-1 border-gray-300 fixed bottom-0 lg:w-[30%] w-full pb-8 pt-6 px-6 bg-white">
                    <div class="flex items-center justify-between">
                        <p class="text-[14px] font-medium ">{{ $totalItem }} items</p>
                        <button popovertarget="detai-cart" class="bg-blue-500 text-white flex items-center justify-center gap-2 px-2 py-1 rounded-[6px] lg:hidden ">
                            <p>Detail Cart</p>
                            <svg class="fill-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z"/></svg>
                        </button>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <p class="md:text-2xl text-base font-semibold">Subtotal:</p>
                        <p class="md:text-2xl text-base font-semibold">Rp {{ $total }}</p>
                    </div>
                    <div class="flex items-center justify-center gap-3">
                        <button wire:click="resetCart"
                            class="border-2 border-amber-500 rounded-[6px] md:rounded-xl w-[50%] h-8 md:h-12 cursor-pointer">
                            <p class="text-amber-500 text-center text-base md:text-xl font-semibold">Reset</p>
                        </button>
                        <button wire:click="nextStepTwo()"
                            class="bg-blue-500 rounded-[6px] md:rounded-xl w-[50%] h-8 md:h-12 cursor-pointer">
                            <p class="text-white text-base text-center md:text-xl font-semibold">Lanjutkan</p>
                        </button>
                    </div>
                </div>
            </aside>
        </main>
    @elseif($currentStep == 2)
        <div class="h-screen md:overflow-y-hidden md:flex relative">
        <section class="lg:w-[70%] md:w-[60%] overflow-y-scroll relative bg-gray-100">
            <!-- Background blur decoration -->
            <div class="hidden md:block md:fixed z-10 left-4 bottom-0 transform -translate-x-1/2 translate-y-1/2 w-[270px] h-[270px] rounded-[50%] bg-blue-400 blur-[100px]"></div>
            <!-- Popover Detail - Hidden by default -->
            <div popover id="detail" class="md:block z-20 fixed md:absolute h-screen bg-gray-100 md:bg-transparent p-6 w-full rounded-xl md:rounded-none ">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-semibold">List Keranjang</h1>
                    <button id="closeDetail" popovertarget="detail" class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-7 cursor-pointer" viewBox="0 0 640 640">
                            <path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/>
                        </svg>
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-2 lg:gap-6 mt-4 ">
                    <!-- Kartu Produk -->
                    @foreach ($cart as $item)
                        <div class="lg:flex-row flex flex-col items-center gap-4 bg-white p-4 rounded-xl shadow-md">
                            <img src="resource/dimsum.png" alt="Siomay" class="lg:w-24 h-24 rounded-lg object-cover">
                            <div>
                                <h3 class="font-medium">{{$item['nama']}}</h3>
                                <p>
                                    <span class="text-orange-500 font-semibold">Rp {{$item['harga']}}</span>
                                    <span class="text-blue-600 font-semibold ml-2">x{{$item['qty']}} pcs</span>
                                </p>
                                <p class="text-2xl font-semibold mt-2 text-black">Rp {{$item['harga'] * $item['qty']}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>

        <aside x-data="{ 
                        customerName: @entangle('customerName').defer, 
                        typePayment: @entangle('typePayment').defer, 
                        money: @entangle('money').defer,
                        total: {{$total}},
                        kembalian: 0
                    }"
        class="lg:w-[30%] md:w-[40%] w-full bg-white h-screen">
            <div class="w-full mx-auto p-4">
                <!-- Bagian Form Ringkasan & Pembayaran -->
                <div class="p-4 mt-6">
                    <h2 class="text-2xl font-semibold text-center">
                        <span class="text-orange-500">Ringkasan</span>
                        <span class="text-black">&</span>
                        <span class="text-blue-600">Pembayaran</span>
                    </h2>
                    <hr class="mt-4 text-gray-300">

                    <div class="mt-4 space-y-4">
                        <!-- Nama Customer -->
                        <div>
                            <label class="block text-sm font-medium">Nama Customer</label>
                            <input x-model="customerName" type="text" placeholder="Masukkan nama customer" class="mt-1 w-full border rounded-lg px-3 py-2 text-sm">
                        </div>

                        <!-- Jenis Pembayaran -->
                        <div>
                            <label class="block text-sm font-medium">Jenis Pembayaran <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-4 mt-1">
                                <label class="flex items-center gap-1">
                                    <input x-model="typePayment" value="cash" type="radio" name="payment" checked>
                                    <span>Cash</span>
                                </label>
                                <label class="flex items-center gap-1">
                                    <input x-model="typePayment" type="radio" value="digital" name="payment">
                                    <span>Digital</span>
                                </label>
                            </div>
                        </div>

                        <!-- Uang Tunai -->
                        <div>
                            <label class="block text-sm font-medium">Uang Tunai <span class="text-red-500">*</span></label>
                            <input x-model="money" type="number" min=0  class="mt-1 w-full border rounded-lg px-3 py-2 text-sm">
                        </div>
                    </div>
                </div>

                <hr class="my-3 text-gray-300">

                <!-- Bagian Ringkasan -->
                <div class="p-4">
                    <div class="flex items-center justify-between mb-1">
                        <p class="text-[14px] font-medium">{{$totalItem}} items</p>
                        <button type="button" popovertarget="detail" id="openDetail" class="bg-blue-500 text-white flex items-center justify-center gap-2 px-2 py-1 rounded-[6px] md:hidden">
                            <p class="text-sm">Detail Cart</p>
                            <svg class="fill-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                <path d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z"/>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm font-semibold">Subtotal: <span class="text-xl font-semibold text-black">Rp {{ $total }}</span></p>
                    <p class="text-sm font-semibold text-orange-500">Pembayaran: <span class="text-xl font-semibold">Rp </span><span x-text="money" class="text-xl font-semibold">Rp </span></p>
                    <p  class="text-sm font-semibold text-blue-600">Kembalian: <span class="text-xl font-semibold">Rp </span><span x-text="isNaN(money - total) ? 0 : money - total" class="text-xl font-semibold"></span></p>

                    <!-- Tombol -->
                    <div class="flex justify-between mt-6 gap-3">
                        <button wire:click="nextStepOne()" class="border border-orange-500 text-orange-500 px-4 py-2 rounded-lg hover:bg-orange-100 w-[50%]">
                            Kembali
                        </button>
                        <button 
                            wire:click="nextStepTree()"
                            type="button" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-[50%]">
                            Selesaikan
                        </button>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    @elseif ($currentStep == 3)
        <div class="h-screen relative ">
            <div class="fixed z-10 left-4 bottom-0 transform -translate-x-1/2 translate-y-1/2 w-[270px] h-[270px] rounded-[50%] bg-blue-400 blur-[100px]"></div>
            <div class="fixed z-10 right-4 top-0 transform translate-x-1/2 -translate-y-1/2 w-[270px] h-[270px] rounded-[50%] bg-orange-400 blur-[100px]"></div>

            <section class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full flex flex-col justify-center items-center text-center z-20 p-5">
                <img class="items-center sm:w-18 md:w-30" src="resource/berhasil.png" alt="">
                <h2 class="md:text-3xl text-xl font-bold">Transaksi Berhasil Diselesaikan</h2>
                <p class="mt-3">Data transaksi telah disimpan. Anda dapat mencetak struk atau kembali ke halaman POS untuk transaksi berikutnya.</p>
                <div class="flex gap-4 mt-4">
                    <button class="cursor-pointer flex gap-2 items-center justify-center text-white text-base font-semibold bg-blue-500 py-3 px-4 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3.99994 9.99997L3.29294 10.707L2.58594 9.99997L3.29294 9.29297L3.99994 9.99997ZM20.9999 18C20.9999 18.2652 20.8946 18.5195 20.707 18.7071C20.5195 18.8946 20.2652 19 19.9999 19C19.7347 19 19.4804 18.8946 19.2928 18.7071C19.1053 18.5195 18.9999 18.2652 18.9999 18H20.9999ZM8.29294 15.707L3.29294 10.707L4.70694 9.29297L9.70694 14.293L8.29294 15.707ZM3.29294 9.29297L8.29294 4.29297L9.70694 5.70697L4.70694 10.707L3.29294 9.29297ZM3.99994 8.99997H13.9999V11H3.99994V8.99997ZM20.9999 16V18H18.9999V16H20.9999ZM13.9999 8.99997C15.8565 8.99997 17.6369 9.73747 18.9497 11.0502C20.2624 12.363 20.9999 14.1435 20.9999 16H18.9999C18.9999 14.6739 18.4732 13.4021 17.5355 12.4644C16.5978 11.5268 15.326 11 13.9999 11V8.99997Z" fill="#FCFDFD"/>
                        </svg>
                        <a href="/pos" class="text-sm md:text-base font-semibold">Kembali ke Halaman POS</a>
                    </button>
                    <button class="cursor-pointer flex gap-2 items-center justify-center text-white text-base font-semibold bg-green-600 py-3 px-4 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M16 8V5H8V8H6V3H18V8H16ZM18 12.5C18.2833 12.5 18.521 12.404 18.713 12.212C18.905 12.02 19.0007 11.7827 19 11.5C18.9993 11.2173 18.9033 10.98 18.712 10.788C18.5207 10.596 18.2833 10.5 18 10.5C17.7167 10.5 17.4793 10.596 17.288 10.788C17.0967 10.98 17.0007 11.2173 17 11.5C16.9993 11.7827 17.0953 12.0203 17.288 12.213C17.4807 12.4057 17.718 12.5013 18 12.5ZM16 19V15H8V19H16ZM18 21H6V17H2V11C2 10.15 2.29167 9.43767 2.875 8.863C3.45833 8.28833 4.16667 8.00067 5 8H19C19.85 8 20.5627 8.28767 21.138 8.863C21.7133 9.43833 22.0007 10.1507 22 11V17H18V21ZM20 15V11C20 10.7167 19.904 10.4793 19.712 10.288C19.52 10.0967 19.2827 10.0007 19 10H5C4.71667 10 4.47933 10.096 4.288 10.288C4.09667 10.48 4.00067 10.7173 4 11V15H6V13H18V15H20Z" fill="#FCFDFD"/>
                        </svg>
                        <p class="text-sm md:text-base font-semibold">Cetak Struk</p>
                    </button>
                </div>
            </section>
        </div>
    @endif
</div>