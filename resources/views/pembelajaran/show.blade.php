@extends('layouts.landingpage.main')

@section('content')
    <div class="h-70 w-70 bg-accent blur-[150px] absolute -z-10 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
    <section class="container px-2 md:px-8 max-w-6xl mx-auto mt-24 mb-10 relative">
        <div class="flex flex-col md:flex-row gap-4 md:gap-10 items-center">
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
        </div>

        <div class="rounded-lg shadow-xl p-4 border border-gray-300 mt-10">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, consectetur. Sint recusandae quia delectus ab, impedit atque sunt earum aspernatur harum eos illo cumque neque quae? Dignissimos, omnis ipsum. Aliquid aliquam neque harum iusto modi fugit, in voluptatibus vero tenetur accusamus vitae perspiciatis dolor natus placeat maxime minima corporis quas!
        </div>

        <div class="rounded-lg shadow-xl p-4 border border-gray-300 mt-5 flex flex-col gap-4">
            <a href="" class="flex gap-2 flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-6 stroke-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                </svg>
                <p class="text-center font-semibold text-sm md:text-base text-primary">Template PDF</p>
            </a>
            <a href="" class="flex gap-2 flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-6 stroke-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                </svg>
                <p class="text-center font-semibold text-sm md:text-base text-primary">Template PDF</p>
            </a>
            <a href="" class="flex gap-2 flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-6 stroke-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                </svg>
                <p class="text-center font-semibold text-sm md:text-base text-primary">Template PDF</p>
            </a>
        </div>

        <div class="mt-10">
            <h1 class="text-xl lg:text-2xl font-semibold">Pembelajaran Lainnya</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mt-3">
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
                </a>
            </div>
        </div>
    </section>
@endsection