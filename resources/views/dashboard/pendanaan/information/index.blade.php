@extends('layouts.dashboard')

@section('content')
@php
    $data = [
        'type' => [
            "name" => "KUR"
        ],
        'created_by' => [
            "name" => "Budi"
        ],
        'name_funder' => 'BCA Micro Finance',
        'logo_funder' => asset("assets/image-default.png"),
        'start_nominal' => 2000000,
        'end_nominal' => 20000000,
        'interest_rate' => 4.2,
        'tenor' => 6,
        'age_requirements' => 18,
        'turnover_requirements' => 50000000,
        'link_funding' => 'https://www.bca.co.id/microfinance',
        'status' => 0,
        'requirements' => [
            'requirement' => 'Harus Bisa Kayang',
            'requirement' => 'Harus Bisa Kayang',
            'requirement' => 'Harus Bisa Kayang'
        ]
    ]
@endphp
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Informasi Pendanaan</h1>
    <div x-data="{
            confirmEditShow: false,
            detailPendanaan: false,
            confirmDelete: false,
            pendanaanId: null,
            pendanaan: null,
            deleteFormAction() {
                const formDelete = document.getElementById('form-delete');
                formDelete.action = '/admin/dashboard/pendanaan/information/' + this.pendanaanId;
            },
            editFormShowActive() {
                const formEditShowActive = document.getElementById('form-edit-show-active');
                formEditShowActive.action = '/admin/dashboard/pendanaan/information/active' + this.pendanaanId;
            },
            editFormShowNonActive() {
                const formEditShowNonActive = document.getElementById('form-edit-show-non-active');
                formEditShowNonActive.action = '/admin/dashboard/pendanaan/information/non-active' + this.pendanaanId;
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
                                <h2 class="text-xl font-semibold">Filter Pendanaan</h2>
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
                                            'kur' => 'kur',
                                            'hibah' => 'hibah',
                                        ]"
                                    />
                                </div>
                                <div class="">
                                    <x-label>Rentang Nominal</x-label>
                                    <div class="flex gap-2 items-center">
                                        <x-input.default placeholder="Nominal minimum" type="number" name="min_price" />
                                        <span>-</span>
                                        <x-input.default placeholder="Nominal maximun" type="number" name="max_price" />
                                    </div>
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
                    placeholder="Search pendanaan"
                    class="w-full"
                />
            </div>
            <a href="{{ route('admin.dashboard.pendanaan.information.create') }}" class="w-full md:w-max">
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
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Pemberi Dana</th>
                            <th class="px-4 py-2 text-left">Nominal</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody class="text-gray-700">
                        @for ($i = 0; $i<10; $i++)
                            <tr class="border-b border-b-gray-300 even:bg-gray-50">
                                <td class="px-4 py-2">{{ $i + 1 }}</td>
                                <td class="px-4 py-2">KUR Bank BRI</td>
                                <td class="px-4 py-2">Bank BRI</td>
                                <td class="px-4 py-2">Rp 30.000.000 - Rp 40.000.000</td>
                                <td class="px-4 py-2">
                                    @if (1)
                                        <x-badge backgroundColor="bg-success">Aktif</x-badge>
                                    @else
                                        <x-badge backgroundColor="bg-danger">Tidak Aktif</x-badge>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3 items-center">
                                        <button
                                            @click="detailPendanaan = true;
                                                pendanaanId = 21;
                                                pendanaan = @js($data);"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/info.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
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
                                                pendanaanId = 21;
                                                pendanaan = @js($data);
                                                deleteFormAction();"
                                            type="button" 
                                            class="cursor-pointer h-full flex items-center"
                                        >
                                            <img src="{{ asset('assets/icons/trash.svg') }}" class="w-6 min-w-6" alt="">
                                        </button>
                                        @if (1)
                                            <button 
                                                @click="confirmEditShow = true;
                                                    pendanaanId = 21;
                                                    pendanaan = @js($data);
                                                    editFormShowNonActive();"
                                                type="button" 
                                                class="cursor-pointer h-full flex items-center"
                                            >
                                                <img src="{{ asset('assets/icons/eye.svg') }}" class="w-6 min-w-6" alt="">
                                            </button>
                                        @else
                                            <button 
                                                @click="confirmEditShow = true;
                                                    pendanaanId = 21;
                                                    pendanaan = @js($data);
                                                    editFormShowActive();"
                                                type="button" 
                                                class="cursor-pointer h-full flex items-center"
                                            >
                                                <img src="{{ asset('assets/icons/eye_slash.svg') }}" class="w-6 min-w-6" alt="">
                                            </button>
                                        @endif
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

                <div 
                    x-show="detailPendanaan" 
                    x-transition.opacity 
                    x-cloak 
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
                >
                    <div 
                        x-show="detailPendanaan" 
                        x-transition 
                        @click.away="detailPendanaan = false" 
                        class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen md:w-120 md:h-max shadow-lg"
                    >
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold">Detail Pendanaan</h2>
                            <button @click="detailPendanaan = false" class="text-gray-800 hover:text-dark cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="size-6" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Badge + Title -->
                        <x-badge x-text="pendanaan.type.name" class="w-max max-w-full"></x-badge>
                        <h1 class="text-base sm:text-lg lg:text-xl font-semibold my-1" x-text="pendanaan.name"></h1>

                        <!-- Funder Info -->
                        <div class="flex gap-2 items-center mt-3">
                            <template x-if="pendanaan.logo">
                                <img :src="pendanaan.logo" class="w-10 h-10 rounded-full object-cover" alt="">
                            </template>
                            <template x-if="!pendanaan.logo">
                                <img src='{{ asset("assets/image-default.png") }}' class="w-10 h-10 rounded-full object-cover" alt="">
                            </template>
                            <p class="text-gray-800 text-sm" x-text="pendanaan.name_funder"></p>
                        </div>

                        <!-- Info -->
                        <div class="flex flex-col gap-1 mt-4 text-sm">
                            <template x-if="pendanaan.start_nominal != null && pendanaan.end_nominal != null">
                                <h5 class="font-medium text-sm md:text-base">Nominal: <span x-text="pendanaan.start_nominal"></span> - <span x-text="pendanaan.end_nominal"></span></h5>
                            </template>
                            <template x-if="pendanaan.tenor">
                                <h5 class="font-medium text-sm md:text-base">Tenor: <span x-text="pendanaan.tenor"></span> Tahun</h5>
                            </template>
                            <template x-if="pendanaan.interest_rate">
                                <h5 class="font-medium text-sm md:text-base">Bunga: <span x-text="pendanaan.interest_rate"></span>%/tahun</h5>
                            </template>
                        </div>

                        <!-- Requirements -->
                        <h2 class="text-base md:text-lg font-semibold mt-4 mb-1">Syarat - syarat:</h2>
                        <div class="flex flex-col gap-2">
                            <template x-if="pendanaan.age_requirements">
                                <div class="flex gap-2 items-center">
                                    <!-- Icon -->
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_259_4773)">
                                            <path d="M12 6.5C12.3978 6.5 12.7794 6.34196 13.0607 6.06066C13.342 5.77936 13.5 5.39782 13.5 5V2C13.5 1.60218 13.342 1.22064 13.0607 0.93934C12.7794 0.658035 12.3978 0.5 12 0.5C11.6022 0.5 11.2206 0.658035 10.9393 0.93934C10.658 1.22064 10.5 1.60218 10.5 2V5C10.5 5.39782 10.658 5.77936 10.9393 6.06066C11.2206 6.34196 11.6022 6.5 12 6.5ZM8.27 6.11L6.15 4C5.86365 3.71725 5.47742 3.5587 5.075 3.5587C4.67258 3.5587 4.28635 3.71725 4 4C3.85978 4.13849 3.74863 4.30359 3.67307 4.48561C3.59751 4.66764 3.55907 4.86292 3.56 5.06C3.56511 5.45378 3.72285 5.83022 4 6.11L6.15 8.23C6.43104 8.51138 6.81231 8.66965 7.21 8.67C7.50648 8.66974 7.79623 8.58162 8.04266 8.41678C8.2891 8.25194 8.48115 8.01777 8.59457 7.74385C8.708 7.46992 8.7377 7.16853 8.67993 6.87773C8.62216 6.58693 8.47951 6.31977 8.27 6.11ZM0.5 12C0.5 12.3978 0.658035 12.7794 0.93934 13.0607C1.22064 13.342 1.60218 13.5 2 13.5H5C5.39782 13.5 5.77936 13.342 6.06066 13.0607C6.34196 12.7794 6.5 12.3978 6.5 12C6.5 11.6022 6.34196 11.2206 6.06066 10.9393C5.77936 10.658 5.39782 10.5 5 10.5H2C1.60218 10.5 1.22064 10.658 0.93934 10.9393C0.658035 11.2206 0.5 11.6022 0.5 12ZM7 15.52C6.79329 15.5188 6.58862 15.5608 6.39916 15.6435C6.2097 15.7262 6.03967 15.8476 5.9 16L3.77 18.08C3.49152 18.3625 3.33541 18.7433 3.33541 19.14C3.33541 19.5367 3.49152 19.9175 3.77 20.2C4.05295 20.4815 4.43586 20.6395 4.835 20.6395C5.23414 20.6395 5.61705 20.4815 5.9 20.2L8 18.08C8.20631 17.8739 8.34807 17.6121 8.40794 17.3267C8.4678 17.0413 8.44318 16.7446 8.33707 16.473C8.23097 16.2014 8.04798 15.9666 7.81051 15.7973C7.57304 15.6281 7.29138 15.5317 7 15.52ZM10.5 22C10.5 22.3978 10.658 22.7794 10.9393 23.0607C11.2206 23.342 11.6022 23.5 12 23.5C12.3978 23.5 12.7794 23.342 13.0607 23.0607C13.342 22.7794 13.5 22.3978 13.5 22V19C13.5 18.6022 13.342 18.2206 13.0607 17.9393C12.7794 17.658 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.658 10.9393 17.9393C10.658 18.2206 10.5 18.6022 10.5 19V22ZM16.05 16C15.7691 16.2813 15.6113 16.6625 15.6113 17.06C15.6113 17.4575 15.7691 17.8388 16.05 18.12L18.17 20.24C18.4523 20.5196 18.8327 20.6775 19.23 20.68C19.6303 20.678 20.0141 20.5202 20.3 20.24C20.5777 19.9573 20.7323 19.5763 20.73 19.18C20.7323 18.9812 20.6945 18.7841 20.6189 18.6002C20.5433 18.4164 20.4314 18.2497 20.29 18.11L18.17 16C17.8888 15.7191 17.5075 15.5613 17.11 15.5613C16.7125 15.5613 16.3313 15.7191 16.05 16ZM23.5 12C23.5 11.6022 23.342 11.2206 23.0607 10.9393C22.7794 10.658 22.3978 10.5 22 10.5H19C18.6022 10.5 18.2206 10.658 17.9393 10.9393C17.658 11.2206 17.5 11.6022 17.5 12C17.5 12.3978 17.658 12.7794 17.9393 13.0607C18.2206 13.342 18.6022 13.5 19 13.5H22C22.3978 13.5 22.7794 13.342 23.0607 13.0607C23.342 12.7794 23.5 12.3978 23.5 12ZM19 3.41C18.6237 3.42766 18.2673 3.58447 18 3.85L15.86 6C15.5791 6.28125 15.4213 6.6625 15.4213 7.06C15.4213 7.4575 15.5791 7.83875 15.86 8.12C16.143 8.40151 16.5259 8.55954 16.925 8.55954C17.3241 8.55954 17.707 8.40151 17.99 8.12L20.11 6C20.3339 5.78922 20.4877 5.51471 20.5504 5.21366C20.6131 4.9126 20.5817 4.59954 20.4606 4.31688C20.3395 4.03423 20.1344 3.79564 19.8731 3.63342C19.6119 3.47121 19.3071 3.39321 19 3.41Z" fill="#070707"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_259_4773">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <!-- Text -->
                                    <p class="text-sm text-gray-700"><span x-text="pendanaan.age_requirements"></span> Bulan</p>
                                </div>
                            </template>
                            <template x-if="pendanaan.turnover_requirements">
                                <div class="flex gap-2 items-center">
                                    <!-- Icon -->
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_259_4773)">
                                            <path d="M12 6.5C12.3978 6.5 12.7794 6.34196 13.0607 6.06066C13.342 5.77936 13.5 5.39782 13.5 5V2C13.5 1.60218 13.342 1.22064 13.0607 0.93934C12.7794 0.658035 12.3978 0.5 12 0.5C11.6022 0.5 11.2206 0.658035 10.9393 0.93934C10.658 1.22064 10.5 1.60218 10.5 2V5C10.5 5.39782 10.658 5.77936 10.9393 6.06066C11.2206 6.34196 11.6022 6.5 12 6.5ZM8.27 6.11L6.15 4C5.86365 3.71725 5.47742 3.5587 5.075 3.5587C4.67258 3.5587 4.28635 3.71725 4 4C3.85978 4.13849 3.74863 4.30359 3.67307 4.48561C3.59751 4.66764 3.55907 4.86292 3.56 5.06C3.56511 5.45378 3.72285 5.83022 4 6.11L6.15 8.23C6.43104 8.51138 6.81231 8.66965 7.21 8.67C7.50648 8.66974 7.79623 8.58162 8.04266 8.41678C8.2891 8.25194 8.48115 8.01777 8.59457 7.74385C8.708 7.46992 8.7377 7.16853 8.67993 6.87773C8.62216 6.58693 8.47951 6.31977 8.27 6.11ZM0.5 12C0.5 12.3978 0.658035 12.7794 0.93934 13.0607C1.22064 13.342 1.60218 13.5 2 13.5H5C5.39782 13.5 5.77936 13.342 6.06066 13.0607C6.34196 12.7794 6.5 12.3978 6.5 12C6.5 11.6022 6.34196 11.2206 6.06066 10.9393C5.77936 10.658 5.39782 10.5 5 10.5H2C1.60218 10.5 1.22064 10.658 0.93934 10.9393C0.658035 11.2206 0.5 11.6022 0.5 12ZM7 15.52C6.79329 15.5188 6.58862 15.5608 6.39916 15.6435C6.2097 15.7262 6.03967 15.8476 5.9 16L3.77 18.08C3.49152 18.3625 3.33541 18.7433 3.33541 19.14C3.33541 19.5367 3.49152 19.9175 3.77 20.2C4.05295 20.4815 4.43586 20.6395 4.835 20.6395C5.23414 20.6395 5.61705 20.4815 5.9 20.2L8 18.08C8.20631 17.8739 8.34807 17.6121 8.40794 17.3267C8.4678 17.0413 8.44318 16.7446 8.33707 16.473C8.23097 16.2014 8.04798 15.9666 7.81051 15.7973C7.57304 15.6281 7.29138 15.5317 7 15.52ZM10.5 22C10.5 22.3978 10.658 22.7794 10.9393 23.0607C11.2206 23.342 11.6022 23.5 12 23.5C12.3978 23.5 12.7794 23.342 13.0607 23.0607C13.342 22.7794 13.5 22.3978 13.5 22V19C13.5 18.6022 13.342 18.2206 13.0607 17.9393C12.7794 17.658 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.658 10.9393 17.9393C10.658 18.2206 10.5 18.6022 10.5 19V22ZM16.05 16C15.7691 16.2813 15.6113 16.6625 15.6113 17.06C15.6113 17.4575 15.7691 17.8388 16.05 18.12L18.17 20.24C18.4523 20.5196 18.8327 20.6775 19.23 20.68C19.6303 20.678 20.0141 20.5202 20.3 20.24C20.5777 19.9573 20.7323 19.5763 20.73 19.18C20.7323 18.9812 20.6945 18.7841 20.6189 18.6002C20.5433 18.4164 20.4314 18.2497 20.29 18.11L18.17 16C17.8888 15.7191 17.5075 15.5613 17.11 15.5613C16.7125 15.5613 16.3313 15.7191 16.05 16ZM23.5 12C23.5 11.6022 23.342 11.2206 23.0607 10.9393C22.7794 10.658 22.3978 10.5 22 10.5H19C18.6022 10.5 18.2206 10.658 17.9393 10.9393C17.658 11.2206 17.5 11.6022 17.5 12C17.5 12.3978 17.658 12.7794 17.9393 13.0607C18.2206 13.342 18.6022 13.5 19 13.5H22C22.3978 13.5 22.7794 13.342 23.0607 13.0607C23.342 12.7794 23.5 12.3978 23.5 12ZM19 3.41C18.6237 3.42766 18.2673 3.58447 18 3.85L15.86 6C15.5791 6.28125 15.4213 6.6625 15.4213 7.06C15.4213 7.4575 15.5791 7.83875 15.86 8.12C16.143 8.40151 16.5259 8.55954 16.925 8.55954C17.3241 8.55954 17.707 8.40151 17.99 8.12L20.11 6C20.3339 5.78922 20.4877 5.51471 20.5504 5.21366C20.6131 4.9126 20.5817 4.59954 20.4606 4.31688C20.3395 4.03423 20.1344 3.79564 19.8731 3.63342C19.6119 3.47121 19.3071 3.39321 19 3.41Z" fill="#070707"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_259_4773">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <!-- Text -->
                                    <p class="text-sm text-gray-700"><span x-text="pendanaan.turnover_requirements"></span>/tahun</p>
                                </div>
                            </template>
                            <template x-if="pendanaan.requirements" >
                                <template x-for="item in pendanaan.requirements" :key="item.id">
                                    <div class="flex gap-2 items-center">
                                        <!-- Icon -->
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_259_4773)">
                                                <path d="M12 6.5C12.3978 6.5 12.7794 6.34196 13.0607 6.06066C13.342 5.77936 13.5 5.39782 13.5 5V2C13.5 1.60218 13.342 1.22064 13.0607 0.93934C12.7794 0.658035 12.3978 0.5 12 0.5C11.6022 0.5 11.2206 0.658035 10.9393 0.93934C10.658 1.22064 10.5 1.60218 10.5 2V5C10.5 5.39782 10.658 5.77936 10.9393 6.06066C11.2206 6.34196 11.6022 6.5 12 6.5ZM8.27 6.11L6.15 4C5.86365 3.71725 5.47742 3.5587 5.075 3.5587C4.67258 3.5587 4.28635 3.71725 4 4C3.85978 4.13849 3.74863 4.30359 3.67307 4.48561C3.59751 4.66764 3.55907 4.86292 3.56 5.06C3.56511 5.45378 3.72285 5.83022 4 6.11L6.15 8.23C6.43104 8.51138 6.81231 8.66965 7.21 8.67C7.50648 8.66974 7.79623 8.58162 8.04266 8.41678C8.2891 8.25194 8.48115 8.01777 8.59457 7.74385C8.708 7.46992 8.7377 7.16853 8.67993 6.87773C8.62216 6.58693 8.47951 6.31977 8.27 6.11ZM0.5 12C0.5 12.3978 0.658035 12.7794 0.93934 13.0607C1.22064 13.342 1.60218 13.5 2 13.5H5C5.39782 13.5 5.77936 13.342 6.06066 13.0607C6.34196 12.7794 6.5 12.3978 6.5 12C6.5 11.6022 6.34196 11.2206 6.06066 10.9393C5.77936 10.658 5.39782 10.5 5 10.5H2C1.60218 10.5 1.22064 10.658 0.93934 10.9393C0.658035 11.2206 0.5 11.6022 0.5 12ZM7 15.52C6.79329 15.5188 6.58862 15.5608 6.39916 15.6435C6.2097 15.7262 6.03967 15.8476 5.9 16L3.77 18.08C3.49152 18.3625 3.33541 18.7433 3.33541 19.14C3.33541 19.5367 3.49152 19.9175 3.77 20.2C4.05295 20.4815 4.43586 20.6395 4.835 20.6395C5.23414 20.6395 5.61705 20.4815 5.9 20.2L8 18.08C8.20631 17.8739 8.34807 17.6121 8.40794 17.3267C8.4678 17.0413 8.44318 16.7446 8.33707 16.473C8.23097 16.2014 8.04798 15.9666 7.81051 15.7973C7.57304 15.6281 7.29138 15.5317 7 15.52ZM10.5 22C10.5 22.3978 10.658 22.7794 10.9393 23.0607C11.2206 23.342 11.6022 23.5 12 23.5C12.3978 23.5 12.7794 23.342 13.0607 23.0607C13.342 22.7794 13.5 22.3978 13.5 22V19C13.5 18.6022 13.342 18.2206 13.0607 17.9393C12.7794 17.658 12.3978 17.5 12 17.5C11.6022 17.5 11.2206 17.658 10.9393 17.9393C10.658 18.2206 10.5 18.6022 10.5 19V22ZM16.05 16C15.7691 16.2813 15.6113 16.6625 15.6113 17.06C15.6113 17.4575 15.7691 17.8388 16.05 18.12L18.17 20.24C18.4523 20.5196 18.8327 20.6775 19.23 20.68C19.6303 20.678 20.0141 20.5202 20.3 20.24C20.5777 19.9573 20.7323 19.5763 20.73 19.18C20.7323 18.9812 20.6945 18.7841 20.6189 18.6002C20.5433 18.4164 20.4314 18.2497 20.29 18.11L18.17 16C17.8888 15.7191 17.5075 15.5613 17.11 15.5613C16.7125 15.5613 16.3313 15.7191 16.05 16ZM23.5 12C23.5 11.6022 23.342 11.2206 23.0607 10.9393C22.7794 10.658 22.3978 10.5 22 10.5H19C18.6022 10.5 18.2206 10.658 17.9393 10.9393C17.658 11.2206 17.5 11.6022 17.5 12C17.5 12.3978 17.658 12.7794 17.9393 13.0607C18.2206 13.342 18.6022 13.5 19 13.5H22C22.3978 13.5 22.7794 13.342 23.0607 13.0607C23.342 12.7794 23.5 12.3978 23.5 12ZM19 3.41C18.6237 3.42766 18.2673 3.58447 18 3.85L15.86 6C15.5791 6.28125 15.4213 6.6625 15.4213 7.06C15.4213 7.4575 15.5791 7.83875 15.86 8.12C16.143 8.40151 16.5259 8.55954 16.925 8.55954C17.3241 8.55954 17.707 8.40151 17.99 8.12L20.11 6C20.3339 5.78922 20.4877 5.51471 20.5504 5.21366C20.6131 4.9126 20.5817 4.59954 20.4606 4.31688C20.3395 4.03423 20.1344 3.79564 19.8731 3.63342C19.6119 3.47121 19.3071 3.39321 19 3.41Z" fill="#070707"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_259_4773">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <!-- Text -->
                                        <p class="text-sm text-gray-700" x-text="item.requirement"></p>
                                    </div>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
                {{-- Modal Edit Show --}}
                <div 
                    x-show="confirmEditShow" 
                    x-transition.opacity 
                    x-cloak 
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
                >
                    <div 
                        x-show="confirmEditShow" 
                        x-transition 
                        @click.away="confirmEditShow = false" 
                        class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                    >
    
                        <form action="" method="POST" id="form-delete" class="mt-6">
                            @csrf
                            @method("DELETE")
                            
                            <template x-if="pendanaan.status">
                                <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menyembunyikan (hidden) <span x-text="pendanaan.name"></span></span>?</h1>
                            </template>
                            
                            <template x-if="!pendanaan.status">
                                <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-primary">memunculkan (publish) <span x-text="pendanaan.name"></span></span>?</h1>
                            </template>
    
                            <div class="mt-6 grid grid-cols-2 gap-2">
                                <x-button.default 
                                    variant="danger"
                                    @click="confirmEditShow = false"
                                    type="button"
                                    class="w-full"
                                >
                                    Batal
                                </x-button.default>
                                <x-button.default 
                                    @click="confirmEditShow = false"
                                    type="submit"
                                    class="w-full"
                                >
                                    Yakin
                                </x-button.default>
                            </div>
                        </form>
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
                            
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menghapus (delete) transaksi <span x-text="pendanaan.name"></span></span> ini?</h1>
    
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