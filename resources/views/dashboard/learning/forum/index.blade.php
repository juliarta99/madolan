@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl lg:text-3xl font-bold mb-4">Forum Saya</h1>
    <div class="bg-primary p-4 rounded-md mb-4">
        <h2 class="font-semibold text-light">Lihat diskusi hari ini</h2>
        <p class="text-light mt-1 mb-3 text-sm md:text-base">
            Temukan insight baru, strategi jitu, dan obrolan hangat dari sesama pelaku usaha di komunitas Madolan
        </p>
        <a href="">
            <x-button.default variant="light" class="!text-primary">
                Kunjungi Halaman Forum
            </x-button.default>
        </a>
    </div>
    <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
        <div class="flex gap-2 items-center w-full md:w-max">
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
                            <h2 class="text-xl font-semibold">Filter Forum Saya</h2>
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
                                <x-label for="status">Status</x-label>
                                <x-input.select 
                                    name="status"
                                    :options="[
                                        'ditolak' => 'ditolak',
                                        'terverifikasi' => 'terverifikasi',
                                        'menunggu' => 'menunggu',
                                    ]"
                                />
                            </div>

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
                                <x-label for="discussion">Diskusi</x-label>
                                <x-input.select 
                                    name="discussion"
                                    :options="[
                                        '' => 'Pilih...',
                                        'belum-ada-diskusi' => 'Belum Ada Diskusi',
                                        'ada-diskusi' => 'Ada Diskusi',
                                    ]"
                                />
                            </div>

                            <div>
                                <x-label for="category">Kategori</x-label>
                                <x-input.select 
                                    name="category"
                                    :options="[
                                        '' => 'Pilih..',
                                        'digital-marketing' => 'Digital Marketing',
                                        'sales' => 'Sales'
                                    ]"
                                />
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
                placeholder="Search forum"
                class="w-full"
            />
        </div>
        <a href="{{ route('dashboard.learning.forum.create') }}" class="w-full md:w-max max-w-full">
            <x-button.icon class="w-full">
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
            class="flex flex-col gap-6"
        >
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6 flex flex-col lg:flex-row gap-6">
                <img src="{{ asset('assets/image-default.png') }}" class="h-40 lg:h-30 aspect-square rounded-lg object-cover" alt="">
                <div class="w-full">
                    <div class="flex justify-between gap-3 flex-wrap">
                        <h1 class="text-base md:text-lg font-semibold order-2 md:order-1">Cara Meningkatkan Omzet Tanpa Nambah Modal</h1>
                        <x-badge backgroundColor="bg-danger" class="order-1 md:order-2">Ditolak</x-badge>
                    </div>
                    <p class="mt-1">Bagi dong strategi teman-teman buat naik omzet tanpa perlu tambahan dana. Kolaborasi? Efisiensi? Upselling?</p>
                    <div class="mt-4">
                        <div class="flex justify-between gap-3 flex-wrap">
                            <div class="flex gap-2">
                                <div class="p-1 px-2 text-xs md:text-sm rounded-sm bg-primary/30">omset</div>
                                <div class="p-1 px-2 text-xs md:text-sm rounded-sm bg-primary/30">efisiensi</div>
                                <div class="p-1 px-2 text-xs md:text-sm rounded-sm bg-primary/30">strategi</div>
                                <div class="p-1 px-2 text-xs md:text-sm rounded-sm bg-accent/30">+2</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <p class="text-gray-600 text-sm md:text-base">2 hari yang lalu</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 rounded-md bg-danger text-light py-2 px-4">
                        <h3 class="font-semibold">Forum anda ditolak</h3>
                        <a href="" class="flex w-max max-w-full items-center gap-2">
                            <p>Baca pesan mengapa ditolak</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-light"><path d="M354.4 83.8C359.4 71.8 371.1 64 384 64L544 64C561.7 64 576 78.3 576 96L576 256C576 268.9 568.2 280.6 556.2 285.6C544.2 290.6 530.5 287.8 521.3 278.7L464 221.3L310.6 374.6C298.1 387.1 277.8 387.1 265.3 374.6C252.8 362.1 252.8 341.8 265.3 329.3L418.7 176L361.4 118.6C352.2 109.4 349.5 95.7 354.5 83.7zM64 240C64 195.8 99.8 160 144 160L224 160C241.7 160 256 174.3 256 192C256 209.7 241.7 224 224 224L144 224C135.2 224 128 231.2 128 240L128 496C128 504.8 135.2 512 144 512L400 512C408.8 512 416 504.8 416 496L416 416C416 398.3 430.3 384 448 384C465.7 384 480 398.3 480 416L480 496C480 540.2 444.2 576 400 576L144 576C99.8 576 64 540.2 64 496L64 240z"/></svg>
                        </a>
                    </div>
                    <div class="mt-4">
                        <div class="flex lg:justify-end gap-4 flex-wrap">
                            <x-button.icon>
                                <x-slot:icon>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="fill-light size-6" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.544 2.95501C4.33074 2.75629 4.04867 2.64811 3.75722 2.65325C3.46577 2.65839 3.18769 2.77646 2.98157 2.98258C2.77545 3.1887 2.65738 3.46678 2.65224 3.75823C2.6471 4.04968 2.75528 4.33175 2.954 4.54501L4.199 5.79001C2.71125 7.00767 1.52964 8.55711 0.749004 10.314L0.359004 11.1915C0.245924 11.4463 0.1875 11.722 0.1875 12.0008C0.1875 12.2795 0.245924 12.5552 0.359004 12.81L0.749004 13.6875C1.44042 15.2419 2.44638 16.6361 3.70344 17.7823C4.96051 18.9285 6.44142 19.8019 8.05281 20.3473C9.6642 20.8927 11.3711 21.0983 13.0659 20.9512C14.7607 20.8041 16.4067 20.3074 17.9 19.4925L19.454 21.045C19.557 21.1555 19.6812 21.2442 19.8192 21.3057C19.9572 21.3672 20.1062 21.4002 20.2572 21.4029C20.4083 21.4056 20.5583 21.3778 20.6984 21.3212C20.8385 21.2646 20.9657 21.1804 21.0726 21.0736C21.1794 20.9667 21.2636 20.8395 21.3202 20.6994C21.3768 20.5593 21.4046 20.4093 21.4019 20.2582C21.3992 20.1072 21.3662 19.9582 21.3047 19.8202C21.2432 19.6822 21.1545 19.558 21.044 19.455L4.544 2.95501ZM16.226 17.817L14.285 15.8775C13.4255 16.3855 12.4214 16.5931 11.4309 16.4678C10.4403 16.3425 9.51961 15.8914 8.81362 15.1854C8.10763 14.4794 7.65648 13.5587 7.53118 12.5682C7.40588 11.5776 7.61355 10.5736 8.1215 9.71401L5.798 7.39051C4.50052 8.40532 3.47235 9.72349 2.804 11.229L2.4605 12L2.8055 12.7725C3.34776 13.9914 4.12692 15.0904 5.09769 16.0054C6.06846 16.9205 7.21146 17.6335 8.46024 18.1029C9.70901 18.5723 11.0386 18.7887 12.3718 18.7396C13.705 18.6906 15.0151 18.3769 16.226 17.817ZM9.824 11.4165C9.7219 11.7984 9.72206 12.2004 9.82447 12.5822C9.92688 12.964 10.1279 13.3121 10.4074 13.5916C10.6869 13.8711 11.0351 14.0721 11.4168 14.1745C11.7986 14.277 12.2006 14.2771 12.5825 14.175L9.824 11.4165ZM12.311 7.51051L16.487 11.6865C16.4115 10.6039 15.9473 9.58502 15.1799 8.81763C14.4125 8.05024 13.3936 7.58602 12.311 7.51051ZM21.191 12.7725C20.8338 13.5774 20.3723 14.3319 19.8185 15.0165L21.416 16.6155C22.1617 15.7306 22.7788 14.7449 23.249 13.6875L23.639 12.81C23.7523 12.555 23.8108 12.2791 23.8108 12C23.8108 11.721 23.7523 11.445 23.639 11.19L23.249 10.314C22.0239 7.56024 19.8315 5.35134 17.0869 4.10568C14.3424 2.86002 11.2363 2.6641 8.357 3.55501L10.214 5.41501C12.431 5.01583 14.7178 5.37191 16.7085 6.42626C18.6991 7.4806 20.2786 9.17227 21.194 11.2305L21.536 12.0015L21.191 12.7725Z"/>
                                    </svg>
                                </x-slot:icon>
                                Hidden
                            </x-button.icon>
                            <x-button.icon variant="accent">
                                <x-slot:icon>
                                    <svg width="29" height="26" viewBox="0 0 29 26" fill="none" class="stroke-light size-6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.84732 16.8717C2.84885 15.5749 2.34961 14.9253 2.34961 13C2.34961 11.0735 2.84885 10.4263 3.84732 9.12829C5.84073 6.53931 9.18385 3.60263 14.0963 3.60263C19.0088 3.60263 22.3519 6.53931 24.3453 9.12829C25.3438 10.4275 25.843 11.0747 25.843 13C25.843 14.9265 25.3438 15.5737 24.3453 16.8717C22.3519 19.4607 19.0088 22.3974 14.0963 22.3974C9.18385 22.3974 5.84073 19.4607 3.84732 16.8717Z" stroke-width="1.76201"/>
                                        <path d="M17.6203 13C17.6203 13.9346 17.249 14.831 16.5881 15.4919C15.9273 16.1527 15.0309 16.524 14.0963 16.524C13.1617 16.524 12.2653 16.1527 11.6044 15.4919C10.9435 14.831 10.5723 13.9346 10.5723 13C10.5723 12.0654 10.9435 11.169 11.6044 10.5081C12.2653 9.84726 13.1617 9.47598 14.0963 9.47598C15.0309 9.47598 15.9273 9.84726 16.5881 10.5081C17.249 11.169 17.6203 12.0654 17.6203 13Z" stroke-width="1.76201"/>
                                    </svg>
                                </x-slot:icon>
                                Hidden
                            </x-button.icon>
                            <x-button.icon variant="warning">
                                <x-slot:icon>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="fill-light size-6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.1406 1.60156C20 2.46094 20 3.82812 19.1406 4.6875L17.9688 5.85938L14.1406 2.03125L15.3125 0.859375C16.1719 0 17.5391 0 18.3984 0.859375L19.1406 1.60156ZM6.71875 9.45312L13.2422 2.92969L17.0703 6.75781L10.5469 13.2812C10.3125 13.5156 10 13.7109 9.6875 13.8281L6.21094 14.9609C5.85938 15.0781 5.50781 15 5.27344 14.7266C5 14.4922 4.92188 14.1016 5.03906 13.7891L6.17188 10.3125C6.28906 10 6.48438 9.6875 6.71875 9.45312ZM7.5 2.5C8.16406 2.5 8.75 3.08594 8.75 3.75C8.75 4.45312 8.16406 5 7.5 5H3.75C3.04688 5 2.5 5.58594 2.5 6.25V16.25C2.5 16.9531 3.04688 17.5 3.75 17.5H13.75C14.4141 17.5 15 16.9531 15 16.25V12.5C15 11.8359 15.5469 11.25 16.25 11.25C16.9141 11.25 17.5 11.8359 17.5 12.5V16.25C17.5 18.3203 15.8203 20 13.75 20H3.75C1.64062 20 0 18.3203 0 16.25V6.25C0 4.17969 1.64062 2.5 3.75 2.5H7.5Z"/>
                                    </svg>
                                </x-slot:icon>
                                Edit
                            </x-button.icon>
                            <x-button.icon variant="danger">
                                <x-slot:icon>
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" class="fill-light size-6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.23438 22C6.61562 22 6.08612 21.7826 5.64587 21.3478C5.20562 20.913 4.98512 20.3896 4.98438 19.7778V5.33333H3.85938V3.11111H9.48438V2H16.2344V3.11111H21.8594V5.33333H20.7344V19.7778C20.7344 20.3889 20.5142 20.9122 20.074 21.3478C19.6337 21.7833 19.1039 22.0007 18.4844 22H7.23438ZM18.4844 5.33333H7.23438V19.7778H18.4844V5.33333ZM9.48438 17.5556H11.7344V7.55556H9.48438V17.5556ZM13.9844 17.5556H16.2344V7.55556H13.9844V17.5556Z"/>
                                    </svg>
                                </x-slot:icon>
                                Delete
                            </x-button.icon>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal Edit Status --}}
            <div 
                x-show="confirmEditStatus" 
                x-transition.opacity 
                x-cloak 
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
            >
                <div 
                    x-show="confirmEditStatus" 
                    x-transition 
                    @click.away="confirmEditStatus = false" 
                    class="bg-light p-6 rounded-none md:rounded-lg w-full h-screen  md:w-100 md:h-max shadow-lg"
                >

                    <form action="" method="POST" id="form-edit-status" class="mt-6">
                        @csrf
                        @method("PUT")
                        
                        <template x-if="productShow == 0">
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-primary">menampilkan (publish) produk <span x-text="productName"></span></span> ini?</h1>
                        </template>
                        <template x-if="productShow == 1">
                            <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-accent">menyembunyikan (hidden) produk <span x-text="productName"></span></span>  ini?</h1>
                        </template>

                        <div class="mt-6 grid grid-cols-2 gap-2">
                            <x-button.default 
                                variant="danger"
                                @click="confirmEditStatus = false"
                                type="button"
                                class="w-full"
                            >
                                Batal
                            </x-button.default>
                            <x-button.default 
                                @click="confirmEditStatus = false"
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
                        
                        <h1 class="text-base md:text-lg lg:text-xl font-bold text-center">Apakah anda yakin <span class="text-danger">menghapus (delete) produk <span x-text="productName"></span></span> ini?</h1>

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
@endsection