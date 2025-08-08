@extends('layouts.landingpage.main')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] absolute -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
    <a href="" class="fixed bg-primary flex items-center gap-0 group z-50 bottom-5 right-5 w-12 h-12 rounded-full overflow-hidden transition-all duration-300 ease-in-out hover:w-36 hover:gap-2 hover:rounded-[999px] p-3 md:p-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
            class="size-6 md:size-8 stroke-light flex-shrink-0 mx-auto transition-all duration-300" 
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

    <section class="container px-2 md:px-8 max-w-6xl mx-auto flex flex-col md:flex-row gap-4 md:gap-10 items-center mt-24 mb-10 relative">
        <img src="{{ asset('assets/image-default.png') }}" class="md:max-w-[40%] w-full md:h-60 aspect-video rounded-lg object-cover" alt="">
        <div class="flex flex-col gap-4">
            <div class="flex gap-4 items-center">
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 md:size-6 fill-danger">
                        <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                    </svg>
                    <span class="text-sm md:text-base text-danger font-semibold">493</span>
                </div>
                <div class="flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-accent"><path d="M256.5 37.6C265.8 29.8 279.5 30.1 288.4 38.5C300.7 50.1 311.7 62.9 322.3 75.9C335.8 92.4 352 114.2 367.6 140.1C372.8 133.3 377.6 127.3 381.8 122.2C382.9 120.9 384 119.5 385.1 118.1C393 108.3 402.8 96 415.9 96C429.3 96 438.7 107.9 446.7 118.1C448 119.8 449.3 121.4 450.6 122.9C460.9 135.3 474.6 153.2 488.3 175.3C515.5 219.2 543.9 281.7 543.9 351.9C543.9 475.6 443.6 575.9 319.9 575.9C196.2 575.9 96 475.7 96 352C96 260.9 137.1 182 176.5 127C196.4 99.3 216.2 77.1 231.1 61.9C239.3 53.5 247.6 45.2 256.6 37.7zM321.7 480C347 480 369.4 473 390.5 459C432.6 429.6 443.9 370.8 418.6 324.6C414.1 315.6 402.6 315 396.1 322.6L370.9 351.9C364.3 359.5 352.4 359.3 346.2 351.4C328.9 329.3 297.1 289 280.9 268.4C275.5 261.5 265.7 260.4 259.4 266.5C241.1 284.3 207.9 323.3 207.9 370.8C207.9 439.4 258.5 480 321.6 480z"/></svg>
                    <span class="text-sm md:text-base text-accent font-semibold">Trending</span>
                </div>
            </div>
            <div class="">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold">Strategi Pemasaran Digital Nol Rupiah</h1>
                <p class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, obcaecati.</p>
            </div>
            <div class="flex gap-3 items-center">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-gray-600"><path d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z"/></svg>
                    <span class="text-gray-600 text-sm md:text-base">2542 views</span>
                </div>
                <p class="text-gray-600 text-sm md:text-base">2 hari yang lalu</p>
            </div>
            <a href="">
                <x-button.default>
                    Baca Selengkapnya
                </x-button.default>
            </a>
        </div>
    </section>
    <section class="my-10 container px-2 md:px-8 max-w-6xl mx-auto">
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-center">
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
                    <svg class="size-6 fill-light" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5395 5.51C15.5395 7.44997 13.9595 9.02 12.0295 9.02C10.0895 9.02 8.51953 7.44997 8.51953 5.51C8.51953 3.56998 10.0895 2 12.0295 2C13.9695 2 15.5395 3.56998 15.5395 5.51ZM13.5395 5.51C13.5395 4.67998 12.8595 3.99997 12.0295 3.99997C11.1995 3.99997 10.5195 4.67998 10.5195 5.51C10.5195 6.33997 11.1995 7.01998 12.0295 7.01998C12.8595 7.01998 13.5395 6.33997 13.5395 5.51Z"/>
                        <path d="M9.83984 15.48H9.88986V15.53H9.83984V15.48ZM14.2099 15.48H14.1598V15.53H14.2099V15.48ZM14.8099 15.49H14.7598V15.54H14.8099V15.49Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.03 10.92L3 6.39996V17.48L12.03 22L21.06 17.48V6.39996L12.03 10.92ZM5.00002 9.62998L11.03 12.65V19.26L5.00002 16.24V9.62998ZM19.06 16.24L13.03 19.26V12.65L19.06 9.62998V16.24Z"/>
                    </svg>
                    Pembelajaran
                </x-slot:icon>
            </x-button.icon>
        </div>
    </section>

    <section class="container px-2 md:px-8 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-24 relative">
        <a href="{{ route('pembelajaran.show') }}" class="rounded-lg shadow-xl border overflow-hidden border-gray-300">
            <img src="{{ asset('assets/image-default.png') }}" class="w-full aspect-video object-cover" alt="">
            <div class="p-3 md:p-4">
                <h1 class="text-lg md:text-xl font-semibold">Strategi Pemasaran Digital Nol Rupiah</h1>
                <p class="text-sm md:text-base mt-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, adipisci dicta.</p>
                <div class="flex gap-2 items-center flex-wrap mt-2">
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 md:size-6 fill-danger">
                            <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>
                        <span class="text-sm md:text-base text-danger font-semibold">493</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-gray-600"><path d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z"/></svg>
                        <span class="text-gray-600 text-sm md:text-base">2542 views</span>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base">2 hari yang lalu</p>
                </div>
            </div>
            </div>
        </a>
        <a href="{{ route('pembelajaran.show') }}" class="rounded-lg shadow-xl border overflow-hidden border-gray-300">
            <img src="{{ asset('assets/image-default.png') }}" class="w-full aspect-video object-cover" alt="">
            <div class="p-3 md:p-4">
                <h1 class="text-lg md:text-xl font-semibold">Strategi Pemasaran Digital Nol Rupiah</h1>
                <p class="text-sm md:text-base mt-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut, adipisci dicta.</p>
                <div class="flex gap-2 items-center flex-wrap mt-2">
                    <div class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 md:size-6 fill-danger">
                            <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>
                        <span class="text-sm md:text-base text-danger font-semibold">493</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="size-5 md:size-6 fill-gray-600"><path d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z"/></svg>
                        <span class="text-gray-600 text-sm md:text-base">2542 views</span>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base">2 hari yang lalu</p>
                </div>
            </div>
            </div>
        </a>
    </section>
@endsection