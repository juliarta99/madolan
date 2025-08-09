@extends('layouts.landingpage.main')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] absolute -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
    <a href="" class="fixed bg-primary flex items-center gap-0 group z-50 bottom-5 right-5 w-12 h-12 rounded-full overflow-hidden transition-all duration-300 ease-in-out hover:w-36 hover:gap-2 hover:rounded-[999px] p-3 md:p-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
            class="size-6 md:size-8 stroke-light flex-shrink-0 mx-auto group-hover:mx-3 transition-all duration-300" 
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" 
                d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        <p class="text-sm md:text-base font-semibold text-light opacity-0 
                group-hover:opacity-100 transition-all duration-300 
                transform translate-x-2 group-hover:translate-x-0 whitespace-nowrap">
            Tambah
        </p>
    </a>
    
    <section class="pt-24 pb-10 container px-2 md:px-8 max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row gap-4  md:gap-6 items-center">
            <form class='flex justify-start items-center w-full'>
                <x-input.default 
                    type="text" 
                    placeholder="Cari forum" 
                    class="!rounded-tl-full !rounded-bl-full border-r-0 !rounded-tr-none !rounded-br-none w-full"
                />
                <div class="border bg-light border-gray-300 rounded-r-full border-l-0 flex items-center">
                    <button 
                        type="submit" 
                        class="rounded-tl-full rounded-bl-full hover:bg-secondary transition-all duration-200 bg-primary md:py-1.5 lg:py-2 px-2 py-1 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6 fill-light">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button 
                        type="submit" 
                        class="rounded-tr-full rounded-br-full hover:bg-secondary transition-all duration-200 bg-accent md:py-1.5 lg:py-2 px-2 py-1 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6 fill-light">
                            <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </form>
            <x-button.icon class="w-full md:w-max">
                <x-slot:icon>
                    <svg class="size-6" viewBox="0 0 56 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M48.6257 47.2084C48.3201 47.2084 48.0336 47.1511 47.7663 47.0365C47.4989 46.9219 47.2507 46.75 47.0215 46.5209L41.7507 41.25H18.834C17.5736 41.25 16.495 40.8016 15.5982 39.9048C14.7013 39.008 14.2522 37.9287 14.2507 36.6667V34.375H39.459C40.7194 34.375 41.7988 33.9266 42.6971 33.0298C43.5954 32.133 44.0438 31.0537 44.0423 29.7917V13.75H46.334C47.5944 13.75 48.6738 14.1992 49.5721 15.0975C50.4704 15.9959 50.9188 17.0745 50.9173 18.3334V44.8594C50.9173 45.5469 50.6882 46.1107 50.2298 46.5507C49.7715 46.9907 49.2368 47.2099 48.6257 47.2084ZM9.66732 27.9011L12.36 25.2084H34.8757V9.16671H9.66732V27.9011ZM7.37565 35.75C6.76454 35.75 6.22982 35.5308 5.77148 35.0923C5.31315 34.6539 5.08398 34.0901 5.08398 33.4011V9.16671C5.08398 7.90629 5.53315 6.82768 6.43148 5.93087C7.32982 5.03407 8.40843 4.5849 9.66732 4.58337H34.8757C36.1361 4.58337 37.2154 5.03254 38.1138 5.93087C39.0121 6.82921 39.4605 7.90782 39.459 9.16671V25.2084C39.459 26.4688 39.0106 27.5482 38.1138 28.4465C37.217 29.3448 36.1376 29.7932 34.8757 29.7917H14.2507L8.97982 35.0625C8.75065 35.2917 8.50239 35.4636 8.23503 35.5782C7.96766 35.6927 7.68121 35.75 7.37565 35.75Z" fill="white"/>
                    </svg>
                    Forum
                </x-slot:icon>
            </x-button.icon>
        </div>
    </section>

    {{-- content --}}
    <section class="container px-2 md:px-8 max-w-6xl mx-auto flex flex-col gap-6 mb-24 relative">
        <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6 flex flex-col md:flex-row gap-6">
            <img src="{{ asset('assets/image-default.png') }}" class="h-40 md:h-30 aspect-square rounded-lg object-cover" alt="">
            <div>
                <div class="flex justify-between gap-3 flex-wrap">
                    <h1 class="text-base md:text-lg font-semibold">Cara Meningkatkan Omzet Tanpa Nambah Modal</h1>
                    <div class="flex gap-4 items-center">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-primary"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM331.3 188.7L435.3 292.7C439.9 297.3 441.2 304.2 438.8 310.1C436.4 316 430.5 320 424 320L368 320L368 416C368 433.7 353.7 448 336 448L304 448C286.3 448 272 433.7 272 416L272 320L216 320C209.5 320 203.7 316.1 201.2 310.1C198.7 304.1 200.1 297.2 204.7 292.7L308.7 188.7C314.9 182.5 325.1 182.5 331.3 188.7z"/></svg>
                            <span class="text-sm md:text-base text-primary font-semibold">493</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-accent"><path d="M256.5 37.6C265.8 29.8 279.5 30.1 288.4 38.5C300.7 50.1 311.7 62.9 322.3 75.9C335.8 92.4 352 114.2 367.6 140.1C372.8 133.3 377.6 127.3 381.8 122.2C382.9 120.9 384 119.5 385.1 118.1C393 108.3 402.8 96 415.9 96C429.3 96 438.7 107.9 446.7 118.1C448 119.8 449.3 121.4 450.6 122.9C460.9 135.3 474.6 153.2 488.3 175.3C515.5 219.2 543.9 281.7 543.9 351.9C543.9 475.6 443.6 575.9 319.9 575.9C196.2 575.9 96 475.7 96 352C96 260.9 137.1 182 176.5 127C196.4 99.3 216.2 77.1 231.1 61.9C239.3 53.5 247.6 45.2 256.6 37.7zM321.7 480C347 480 369.4 473 390.5 459C432.6 429.6 443.9 370.8 418.6 324.6C414.1 315.6 402.6 315 396.1 322.6L370.9 351.9C364.3 359.5 352.4 359.3 346.2 351.4C328.9 329.3 297.1 289 280.9 268.4C275.5 261.5 265.7 260.4 259.4 266.5C241.1 284.3 207.9 323.3 207.9 370.8C207.9 439.4 258.5 480 321.6 480z"/></svg>
                            <span class="text-sm md:text-base text-accent font-semibold">Trending</span>
                        </div>
                    </div>
                </div>
                <p class="mt-1 text-sm md:text-base">Bagi dong strategi teman-teman buat naik omzet tanpa perlu tambahan dana. Kolaborasi? Efisiensi? Upselling?</p>
                <div class="mt-4">
                    <div class="flex justify-between gap-3 flex-wrap">
                        <div class="flex gap-2">
                            <div class="p-1 px-2 rounded-sm text-xs md:text-sm bg-primary/30">omset</div>
                            <div class="p-1 px-2 rounded-sm text-xs md:text-sm bg-primary/30">efisiensi</div>
                            <div class="p-1 px-2 rounded-sm text-xs md:text-sm bg-primary/30">strategi</div>
                            <div class="p-1 px-2 rounded-sm text-xs md:text-sm bg-accent/30">+2</div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                                <span class="text-gray-600 text-sm md:text-base">Angga Putra</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-gray-600"><path d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z"/></svg>
                                <span class="text-gray-600 text-sm md:text-base">2542 views</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">2 hari yang lalu</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex md:justify-end gap-2 md:gap-4 flex-wrap">
                        <x-button.icon>
                            <x-slot:icon>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="fill-light size-5 md:size-6" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.544 2.95501C4.33074 2.75629 4.04867 2.64811 3.75722 2.65325C3.46577 2.65839 3.18769 2.77646 2.98157 2.98258C2.77545 3.1887 2.65738 3.46678 2.65224 3.75823C2.6471 4.04968 2.75528 4.33175 2.954 4.54501L4.199 5.79001C2.71125 7.00767 1.52964 8.55711 0.749004 10.314L0.359004 11.1915C0.245924 11.4463 0.1875 11.722 0.1875 12.0008C0.1875 12.2795 0.245924 12.5552 0.359004 12.81L0.749004 13.6875C1.44042 15.2419 2.44638 16.6361 3.70344 17.7823C4.96051 18.9285 6.44142 19.8019 8.05281 20.3473C9.6642 20.8927 11.3711 21.0983 13.0659 20.9512C14.7607 20.8041 16.4067 20.3074 17.9 19.4925L19.454 21.045C19.557 21.1555 19.6812 21.2442 19.8192 21.3057C19.9572 21.3672 20.1062 21.4002 20.2572 21.4029C20.4083 21.4056 20.5583 21.3778 20.6984 21.3212C20.8385 21.2646 20.9657 21.1804 21.0726 21.0736C21.1794 20.9667 21.2636 20.8395 21.3202 20.6994C21.3768 20.5593 21.4046 20.4093 21.4019 20.2582C21.3992 20.1072 21.3662 19.9582 21.3047 19.8202C21.2432 19.6822 21.1545 19.558 21.044 19.455L4.544 2.95501ZM16.226 17.817L14.285 15.8775C13.4255 16.3855 12.4214 16.5931 11.4309 16.4678C10.4403 16.3425 9.51961 15.8914 8.81362 15.1854C8.10763 14.4794 7.65648 13.5587 7.53118 12.5682C7.40588 11.5776 7.61355 10.5736 8.1215 9.71401L5.798 7.39051C4.50052 8.40532 3.47235 9.72349 2.804 11.229L2.4605 12L2.8055 12.7725C3.34776 13.9914 4.12692 15.0904 5.09769 16.0054C6.06846 16.9205 7.21146 17.6335 8.46024 18.1029C9.70901 18.5723 11.0386 18.7887 12.3718 18.7396C13.705 18.6906 15.0151 18.3769 16.226 17.817ZM9.824 11.4165C9.7219 11.7984 9.72206 12.2004 9.82447 12.5822C9.92688 12.964 10.1279 13.3121 10.4074 13.5916C10.6869 13.8711 11.0351 14.0721 11.4168 14.1745C11.7986 14.277 12.2006 14.2771 12.5825 14.175L9.824 11.4165ZM12.311 7.51051L16.487 11.6865C16.4115 10.6039 15.9473 9.58502 15.1799 8.81763C14.4125 8.05024 13.3936 7.58602 12.311 7.51051ZM21.191 12.7725C20.8338 13.5774 20.3723 14.3319 19.8185 15.0165L21.416 16.6155C22.1617 15.7306 22.7788 14.7449 23.249 13.6875L23.639 12.81C23.7523 12.555 23.8108 12.2791 23.8108 12C23.8108 11.721 23.7523 11.445 23.639 11.19L23.249 10.314C22.0239 7.56024 19.8315 5.35134 17.0869 4.10568C14.3424 2.86002 11.2363 2.6641 8.357 3.55501L10.214 5.41501C12.431 5.01583 14.7178 5.37191 16.7085 6.42626C18.6991 7.4806 20.2786 9.17227 21.194 11.2305L21.536 12.0015L21.191 12.7725Z"/>
                                </svg>
                            </x-slot:icon>
                            Hidden
                        </x-button.icon>
                        <x-button.icon variant="accent">
                            <x-slot:icon>
                                <svg width="29" height="26" viewBox="0 0 29 26" fill="none" class="stroke-light size-5 md:size-6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.84732 16.8717C2.84885 15.5749 2.34961 14.9253 2.34961 13C2.34961 11.0735 2.84885 10.4263 3.84732 9.12829C5.84073 6.53931 9.18385 3.60263 14.0963 3.60263C19.0088 3.60263 22.3519 6.53931 24.3453 9.12829C25.3438 10.4275 25.843 11.0747 25.843 13C25.843 14.9265 25.3438 15.5737 24.3453 16.8717C22.3519 19.4607 19.0088 22.3974 14.0963 22.3974C9.18385 22.3974 5.84073 19.4607 3.84732 16.8717Z" stroke-width="1.76201"/>
                                    <path d="M17.6203 13C17.6203 13.9346 17.249 14.831 16.5881 15.4919C15.9273 16.1527 15.0309 16.524 14.0963 16.524C13.1617 16.524 12.2653 16.1527 11.6044 15.4919C10.9435 14.831 10.5723 13.9346 10.5723 13C10.5723 12.0654 10.9435 11.169 11.6044 10.5081C12.2653 9.84726 13.1617 9.47598 14.0963 9.47598C15.0309 9.47598 15.9273 9.84726 16.5881 10.5081C17.249 11.169 17.6203 12.0654 17.6203 13Z" stroke-width="1.76201"/>
                                </svg>
                            </x-slot:icon>
                            Hidden
                        </x-button.icon>
                        <x-button.icon variant="warning">
                            <x-slot:icon>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="fill-light size-5 md:size-6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.1406 1.60156C20 2.46094 20 3.82812 19.1406 4.6875L17.9688 5.85938L14.1406 2.03125L15.3125 0.859375C16.1719 0 17.5391 0 18.3984 0.859375L19.1406 1.60156ZM6.71875 9.45312L13.2422 2.92969L17.0703 6.75781L10.5469 13.2812C10.3125 13.5156 10 13.7109 9.6875 13.8281L6.21094 14.9609C5.85938 15.0781 5.50781 15 5.27344 14.7266C5 14.4922 4.92188 14.1016 5.03906 13.7891L6.17188 10.3125C6.28906 10 6.48438 9.6875 6.71875 9.45312ZM7.5 2.5C8.16406 2.5 8.75 3.08594 8.75 3.75C8.75 4.45312 8.16406 5 7.5 5H3.75C3.04688 5 2.5 5.58594 2.5 6.25V16.25C2.5 16.9531 3.04688 17.5 3.75 17.5H13.75C14.4141 17.5 15 16.9531 15 16.25V12.5C15 11.8359 15.5469 11.25 16.25 11.25C16.9141 11.25 17.5 11.8359 17.5 12.5V16.25C17.5 18.3203 15.8203 20 13.75 20H3.75C1.64062 20 0 18.3203 0 16.25V6.25C0 4.17969 1.64062 2.5 3.75 2.5H7.5Z"/>
                                </svg>
                            </x-slot:icon>
                            Edit
                        </x-button.icon>
                        <x-button.icon variant="danger">
                            <x-slot:icon>
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" class="fill-light size-5 md:size-6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.23438 22C6.61562 22 6.08612 21.7826 5.64587 21.3478C5.20562 20.913 4.98512 20.3896 4.98438 19.7778V5.33333H3.85938V3.11111H9.48438V2H16.2344V3.11111H21.8594V5.33333H20.7344V19.7778C20.7344 20.3889 20.5142 20.9122 20.074 21.3478C19.6337 21.7833 19.1039 22.0007 18.4844 22H7.23438ZM18.4844 5.33333H7.23438V19.7778H18.4844V5.33333ZM9.48438 17.5556H11.7344V7.55556H9.48438V17.5556ZM13.9844 17.5556H16.2344V7.55556H13.9844V17.5556Z"/>
                                </svg>
                            </x-slot:icon>
                            Delete
                        </x-button.icon>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection