@extends('layouts.landingpage.main')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] absolute -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>

    {{-- content --}}
    <section x-data="{
                toTop: false,
                checkScroll() {
                    const el = document.getElementById('detailForum');
                    if (!el) return;
                    const rect = el.getBoundingClientRect();
                    this.toTop = rect.bottom < 0; // Jika bagian bawah sudah melewati atas layar
                },
                init() {
                    this.checkScroll();
                    window.addEventListener('scroll', () => this.checkScroll());
                },
                goToTop() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            }"
            class="container px-2 md:px-8 max-w-6xl mx-auto flex flex-col gap-6 my-24"
    >
        <div class="fixed top-18 left-0 w-full shadow-lg bg-light transition-transform duration-700"
            :class="{ 'translate-y-0': toTop, '-translate-y-[300%]': !toTop }"
        >
            <div class="px-2 py-4 md:px-8 md:py-5 container mx-auto">
                <div class="flex justify-between gap-3 flex-wrap">
                    <h1 @click="goToTop()" class="text-base md:text-lg font-semibold cursor-pointer">Cara Meningkatkan Omzet Tanpa Nambah Modal</h1>
                    <div class="flex gap-4 items-center">
                        <button class="flex items-center gap-2 w-max cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-accent"><path d="M448 256C501 256 544 213 544 160C544 107 501 64 448 64C395 64 352 107 352 160C352 165.4 352.5 170.8 353.3 176L223.6 248.1C206.7 233.1 184.4 224 160 224C107 224 64 267 64 320C64 373 107 416 160 416C184.4 416 206.6 406.9 223.6 391.9L353.3 464C352.4 469.2 352 474.5 352 480C352 533 395 576 448 576C501 576 544 533 544 480C544 427 501 384 448 384C423.6 384 401.4 393.1 384.4 408.1L254.7 336C255.6 330.8 256 325.5 256 320C256 314.5 255.5 309.2 254.7 304L384.4 231.9C401.3 246.9 423.6 256 448 256z"/></svg>
                        </button>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-primary"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM331.3 188.7L435.3 292.7C439.9 297.3 441.2 304.2 438.8 310.1C436.4 316 430.5 320 424 320L368 320L368 416C368 433.7 353.7 448 336 448L304 448C286.3 448 272 433.7 272 416L272 320L216 320C209.5 320 203.7 316.1 201.2 310.1C198.7 304.1 200.1 297.2 204.7 292.7L308.7 188.7C314.9 182.5 325.1 182.5 331.3 188.7z"/></svg>
                            <span class="text-primary font-semibold">493</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="detailForum" class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6 flex gap-6">
            <img src="{{ asset('assets/image-default.png') }}" class="h-30 aspect-square rounded-lg object-cover" alt="">
            <div>
                <div class="flex justify-between gap-3 flex-wrap">
                    <h1 class="text-base md:text-lg font-semibold">Cara Meningkatkan Omzet Tanpa Nambah Modal</h1>
                    <div class="flex gap-4 items-center">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-primary"><path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM331.3 188.7L435.3 292.7C439.9 297.3 441.2 304.2 438.8 310.1C436.4 316 430.5 320 424 320L368 320L368 416C368 433.7 353.7 448 336 448L304 448C286.3 448 272 433.7 272 416L272 320L216 320C209.5 320 203.7 316.1 201.2 310.1C198.7 304.1 200.1 297.2 204.7 292.7L308.7 188.7C314.9 182.5 325.1 182.5 331.3 188.7z"/></svg>
                            <span class="text-primary font-semibold">493</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-accent"><path d="M256.5 37.6C265.8 29.8 279.5 30.1 288.4 38.5C300.7 50.1 311.7 62.9 322.3 75.9C335.8 92.4 352 114.2 367.6 140.1C372.8 133.3 377.6 127.3 381.8 122.2C382.9 120.9 384 119.5 385.1 118.1C393 108.3 402.8 96 415.9 96C429.3 96 438.7 107.9 446.7 118.1C448 119.8 449.3 121.4 450.6 122.9C460.9 135.3 474.6 153.2 488.3 175.3C515.5 219.2 543.9 281.7 543.9 351.9C543.9 475.6 443.6 575.9 319.9 575.9C196.2 575.9 96 475.7 96 352C96 260.9 137.1 182 176.5 127C196.4 99.3 216.2 77.1 231.1 61.9C239.3 53.5 247.6 45.2 256.6 37.7zM321.7 480C347 480 369.4 473 390.5 459C432.6 429.6 443.9 370.8 418.6 324.6C414.1 315.6 402.6 315 396.1 322.6L370.9 351.9C364.3 359.5 352.4 359.3 346.2 351.4C328.9 329.3 297.1 289 280.9 268.4C275.5 261.5 265.7 260.4 259.4 266.5C241.1 284.3 207.9 323.3 207.9 370.8C207.9 439.4 258.5 480 321.6 480z"/></svg>
                            <span class="text-accent font-semibold">Trending</span>
                        </div>
                    </div>
                </div>
                <div class="mt-1">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z"/></svg>
                            <span class="text-gray-600">2542 views</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
                <p class="mt-4">Bagi dong strategi teman-teman buat naik omzet tanpa perlu tambahan dana. Kolaborasi? Efisiensi? Upselling?</p>
                <div class="mt-4">
                    <div class="flex gap-2">
                        <div class="p-1 px-2 rounded-sm bg-primary/30">omset</div>
                        <div class="p-1 px-2 rounded-sm bg-primary/30">efisiensi</div>
                        <div class="p-1 px-2 rounded-sm bg-primary/30">strategi</div>
                        <div class="p-1 px-2 rounded-sm bg-accent/30">+2</div>
                    </div>
                </div>
                <div class="mt-4">
                    <button class="flex items-center gap-2 w-max cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-accent"><path d="M448 256C501 256 544 213 544 160C544 107 501 64 448 64C395 64 352 107 352 160C352 165.4 352.5 170.8 353.3 176L223.6 248.1C206.7 233.1 184.4 224 160 224C107 224 64 267 64 320C64 373 107 416 160 416C184.4 416 206.6 406.9 223.6 391.9L353.3 464C352.4 469.2 352 474.5 352 480C352 533 395 576 448 576C501 576 544 533 544 480C544 427 501 384 448 384C423.6 384 401.4 393.1 384.4 408.1L254.7 336C255.6 330.8 256 325.5 256 320C256 314.5 255.5 309.2 254.7 304L384.4 231.9C401.3 246.9 423.6 256 448 256z"/></svg>
                        <span class="text-accent">Bagikan</span>
                    </button>
                </div>
                {{-- <div class="mt-4">
                    <div class="flex justify-end gap-4">
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
                </div> --}}
            </div>
        </div>
        <div class="w-full pl-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-primary text-light p-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic!</p>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-light"><path d="M305 151.1L320 171.8L335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1L576 231.7C576 343.9 436.1 474.2 363.1 529.9C350.7 539.3 335.5 544 320 544C304.5 544 289.2 539.4 276.9 529.9C203.9 474.2 64 343.9 64 231.7L64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1z"/></svg>
                            <span class="text-light">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-light"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-light">Anda</span>
                        </div>
                        <p class="text-light">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-primary"><path d="M337.3 51C325.9 48.7 314.2 48.7 302.8 51L115.3 88.5C104.1 90.7 96 100.6 96 112C96 122.3 102.5 131.3 112 134.6L112 208L96.3 286.6C96.1 287.5 96 288.5 96 289.5C96 297.5 102.5 304.1 110.6 304.1L145.5 304.1C153.5 304.1 160.1 297.6 160.1 289.5C160.1 288.5 160 287.6 159.8 286.6L144 208L144 141.3L192 150.9L192 208C192 278.7 249.3 336 320 336C390.7 336 448 278.7 448 208L448 150.9L524.7 135.6C535.9 133.3 544 123.4 544 112C544 100.6 535.9 90.7 524.7 88.5L337.3 51zM320 288C275.8 288 240 252.2 240 208L400 208C400 252.2 364.2 288 320 288zM216.1 384.1C154.7 412.3 112 474.3 112 546.3C112 562.7 125.3 576 141.7 576L296 576L296 430L238.6 387C232.1 382.1 223.4 380.8 216 384.2zM344 576L498.3 576C514.7 576 528 562.7 528 546.3C528 474.3 485.3 412.3 423.9 384.2C416.5 380.8 407.8 382.1 401.3 387L343.9 430L343.9 576z"/></svg>
                        <span class="text-primary">Mentor</span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-danger"><path d="M305 151.1L320 171.8L335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1L576 231.7C576 343.9 436.1 474.2 363.1 529.9C350.7 539.3 335.5 544 320 544C304.5 544 289.2 539.4 276.9 529.9C203.9 474.2 64 343.9 64 231.7L64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1z"/></svg>
                            <span class="text-danger">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"/></svg>
                            <span class="text-gray-500">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"/></svg>
                            <span class="text-gray-500">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"/></svg>
                            <span class="text-gray-500">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"/></svg>
                            <span class="text-gray-500">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"/></svg>
                            <span class="text-gray-500">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full pr-14">
            <div class="w-full shadow-xl border border-gray-200 rounded-xl bg-light p-6">
                <div class="flex gap-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, hic! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, rem?</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"/></svg>
                            <span class="text-gray-500">54</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-6 fill-gray-600"><path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"/></svg>
                            <span class="text-gray-600">Angga Putra</span>
                        </div>
                        <p class="text-gray-600">2 hari yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section 
        x-data="{ 
            imagePreview: null,
            clearImage() {
                this.imagePreview = null;
            }
        }" 
        class="container px-2 md:px-8 max-w-6xl fixed bottom-3 -translate-x-1/2 left-1/2"
    >
        <div class="w-full shadow-xl border border-gray-200 rounded-2xl bg-light p-4 flex flex-col gap-4">
            <template x-if="imagePreview">
                <div class="relative w-max">
                    <img :src="imagePreview" alt="Preview" class="max-h-20 aspect-square rounded border border-gray-300 shadow object-cover">
                    <div class="absolute top-1 right-1 flex gap-1 items-center">
                        <label for="imageInput" class="p-1 rounded-full bg-warning cursor-pointer flex items-center justify-center">
                            <svg class="fill-light size-3" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.0816 20.7778H6.66493L17.526 9.91667L15.9427 8.33333L5.0816 19.1944V20.7778ZM2.85938 23V18.2778L17.526 3.63889C17.7483 3.43519 17.9938 3.27778 18.2627 3.16667C18.5316 3.05556 18.8138 3 19.1094 3C19.4049 3 19.692 3.05556 19.9705 3.16667C20.249 3.27778 20.4897 3.44444 20.6927 3.66667L22.2205 5.22222C22.4427 5.42593 22.6049 5.66667 22.7071 5.94444C22.8094 6.22222 22.8601 6.5 22.8594 6.77778C22.8594 7.07407 22.8086 7.35667 22.7071 7.62556C22.6057 7.89444 22.4434 8.13963 22.2205 8.36111L7.5816 23H2.85938ZM16.7205 9.13889L15.9427 8.33333L17.526 9.91667L16.7205 9.13889Z"/>
                            </svg>  
                        </label>
                        <button @click="clearImage()" type="button" class="p-1 rounded-full bg-danger flex items-center justify-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 stroke-light">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </template>
            <textarea 
                id="chatInput" 
                name="chatInput" 
                rows="1" 
                placeholder="Masukkan balasan atau tanggapan anda"
                class="w-full py-3 rounded-lg resize-y focus:outline-none focus:ring-none"
            ></textarea>

            <input 
                type="file" 
                id="imageInput" 
                class="hidden"
                @change="const file = $event.target.files[0]; if (file) { imagePreview = URL.createObjectURL(file); }" 
            >

            <div class="flex gap-4 justify-between items-center">
                <template x-if="imagePreview">
                    <div class="p-2 rounded-full bg-gray-600 flex items-center justify-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-gray-100 size-6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 5H22M19 2V8M21 11.5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H12.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 15.0002L17.914 11.9142C17.5389 11.5392 17.0303 11.3286 16.5 11.3286C15.9697 11.3286 15.4611 11.5392 15.086 11.9142L6 21.0002" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 11C10.1046 11 11 10.1046 11 9C11 7.89543 10.1046 7 9 7C7.89543 7 7 7.89543 7 9C7 10.1046 7.89543 11 9 11Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </template>
                <template x-if="!imagePreview">
                    <label for="imageInput" class="p-2 rounded-full bg-accent flex items-center justify-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-light size-6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 5H22M19 2V8M21 11.5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H12.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 15.0002L17.914 11.9142C17.5389 11.5392 17.0303 11.3286 16.5 11.3286C15.9697 11.3286 15.4611 11.5392 15.086 11.9142L6 21.0002" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 11C10.1046 11 11 10.1046 11 9C11 7.89543 10.1046 7 9 7C7.89543 7 7 7.89543 7 9C7 10.1046 7.89543 11 9 11Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </label>
                </template>

                <label class="p-2 rounded-full bg-primary flex items-center justify-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="fill-light size-6" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.9993 2C12.185 2.0001 12.3669 2.05188 12.5248 2.14955C12.6827 2.24722 12.8103 2.38692 12.8933 2.553L21.8933 20.553C21.9776 20.7219 22.0123 20.9113 21.9935 21.0991C21.9747 21.2869 21.9031 21.4656 21.787 21.6145C21.6709 21.7633 21.515 21.8763 21.3374 21.9403C21.1598 22.0042 20.9677 22.0166 20.7833 21.976L11.9993 20.024L3.2163 21.976C3.03187 22.0169 2.83964 22.0046 2.66186 21.9408C2.48408 21.8769 2.32803 21.764 2.21178 21.6151C2.09553 21.4662 2.02383 21.2874 2.00499 21.0994C1.98614 20.9115 2.02092 20.722 2.1053 20.553L11.1053 2.553C11.1883 2.38692 11.3159 2.24722 11.4738 2.14955C11.6317 2.05188 11.8136 2.0001 11.9993 2ZM12.9993 18.198L19.1653 19.568L12.9993 7.236V18.198ZM10.9993 7.236L4.8333 19.568L10.9993 18.198V7.236Z"/>
                    </svg>
                </label>
            </div>
        </div>
    </section>
@endsection