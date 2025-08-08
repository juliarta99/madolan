<nav 
    x-data="{ scrolled: false, mobileOpen: false, fiturOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 0 })"
    :class="scrolled ? 'bg-light shadow-md' : 'bg-transparent'" 
    class="fixed top-0 left-0 w-full z-50 transition-colors duration-300"
>
    <div class="flex items-center justify-between px-2 py-3 md:px-8 md:py-4 container mx-auto">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/logo.svg') }}" alt="Logo" class="lg:w-10 lg:h-10 w-8 h-8">
            <span class="font-semibold text-sm sm:text-base">Madolan</span>
        </div>

        <ul class="hidden lg:flex items-center space-x-7 font-medium text-gray-700 transition-all duration-200">
            <li>
                <a href="#" class="hover:text-primary @if(Route::is('landingpage')) text-primary @endif">Beranda</a>
            </li>
            <li class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="cursor-pointer flex items-center gap-1 hover:text-accent @if(Route::is('fitur*')) text-accent @endif">
                    Fitur
                    <svg class="w-6 h-6 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.298l3.71-4.07a.75.75 0 011.08 1.04l-4.25 4.667a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-2"
                    @click.away="open = false"
                    class="absolute mt-2 w-60 bg-light shadow-xl rounded-lg overflow-hidden z-50"
                    style="display: none;"
                >
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-50">Dashboard Analisis</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-50">Forum</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-50">Pembelajaran</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-50">Point of Sales</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-50">Pembukuan & Laporan Otomatis</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-50">Informasi Pendanaan</a>
                </div>
            </li>
            <li>
                <a href="#" class="hover:text-primary @if(Route::is('faq')) text-primary @endif">FAQ</a>
            </li>
            <li>
                <a href="{{ route('forum.index')}}" class="hover:text-accent @if(Route::is('forum*')) text-accent @endif">Forum</a>
            </li>
            <li>
                <a href="login.blade.php" class="hover:text-primary @if(Route::is('pembelajaran*')) text-primary @endif">Pembelajaran</a>
            </li>
        </ul>

        <div class="flex gap-2 items-center">
            @auth
                <div class="flex space-x-3">
                    <a href="">
                        <x-button.icon>
                            <x-slot:icon>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9961 2.5C12.3525 2.5 12.6627 2.60379 12.9424 2.81641V2.81738L19.8652 8.11719L19.8721 8.12207C20.0656 8.26551 20.2178 8.4475 20.3301 8.67578L20.3311 8.67773C20.4441 8.90564 20.5 9.14456 20.5 9.40039V20.7002C20.5 20.9103 20.4282 21.0895 20.2598 21.2598C20.0914 21.4299 19.9165 21.5 19.7139 21.5H14.7207C14.553 21.5 14.4355 21.4483 14.335 21.3467C14.2338 21.2435 14.1816 21.1217 14.1816 20.9492V13.8506H9.81836V20.9492C9.81836 21.1236 9.76491 21.2447 9.66406 21.3467C9.56324 21.4485 9.44654 21.5 9.28027 21.5H4.28613C4.08353 21.5 3.90857 21.4299 3.74023 21.2598C3.57182 21.0895 3.50004 20.9103 3.5 20.7002V9.40039C3.50005 9.14456 3.55592 8.90563 3.66895 8.67773C3.78236 8.44905 3.93524 8.26601 4.12891 8.12207L4.13477 8.11816L11.0586 2.81641L11.0596 2.81543C11.3331 2.60427 11.6394 2.50001 11.9961 2.5ZM12 2.80078C11.7132 2.80078 11.4484 2.89368 11.2275 3.07812L4.30371 8.35254L4.28418 8.36816C4.14066 8.48931 4.02222 8.63363 3.93262 8.79883C3.85575 8.94064 3.81094 9.09164 3.79395 9.24707L3.78613 9.40039V21.2002H9.53223V14.1006C9.53223 13.9283 9.58494 13.8074 9.68652 13.7051L9.68848 13.7031C9.78942 13.6007 9.90581 13.5498 10.0713 13.5498H13.9287C14.0943 13.5498 14.2114 13.6009 14.3135 13.7041C14.4146 13.8064 14.4678 13.9275 14.4678 14.1006V21.2002H20.2139V9.40039C20.2138 9.19274 20.1685 8.99036 20.0703 8.80371C19.9805 8.63306 19.8587 8.48619 19.71 8.36426L19.7031 8.3584L19.6963 8.35352L12.7734 3.07812C12.5521 2.89401 12.2872 2.80078 12 2.80078Z" fill="#FCFDFD" stroke="#FCFDFD"/>
                                </svg>
    
                            </x-slot:icon>
                            Dashboard
                        </x-button.icon>
                    </a>
                    <a href="#" class="hidden lg:flex items-center space-x-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-dark" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9.5C14.0711 9.5 15.75 7.82107 15.75 5.75C15.75 3.67893 14.0711 2 12 2C9.92893 2 8.25 3.67893 8.25 5.75C8.25 7.82107 9.92893 9.5 12 9.5Z" stroke-width="1.66667"/>
                            <path d="M2 19.5C2 18.1739 2.52678 16.9021 3.46447 15.9645C4.40215 15.0268 5.67392 14.5 7 14.5H17C18.3261 14.5 19.5979 15.0268 20.5355 15.9645C21.4732 16.9021 22 18.1739 22 19.5C22 20.163 21.7366 20.7989 21.2678 21.2678C20.7989 21.7366 20.163 22 19.5 22H4.5C3.83696 22 3.20107 21.7366 2.73223 21.2678C2.26339 20.7989 2 20.163 2 19.5Z" stroke-width="1.66667" stroke-linejoin="round"/>
                        </svg>
                        <span class="truncate max-w-[100px]">Sanjaya Putra</span>
                    </a>
                </div>
            @endauth
    
            @guest
                <div class="flex space-x-3">
                    <a href="{{ route('register.index')}}" class="hidden lg:block">
                        <x-button.default>
                            Register
                        </x-button.default>
                    </a>
                    <a href="{{ route('login.index')}}">
                        <x-button.default variant="accent">
                            Login
                        </x-button.default>
                    </a>
                </div>
            @endguest
    
            <button @click="mobileOpen = true" class="lg:hidden focus:outline-none">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div 
        class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg z-50 transform transition-transform duration-300"
        :class="{ 'translate-x-0': mobileOpen, 'translate-x-full': !mobileOpen }"
    >
        <div class="p-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/logo.svg') }}" alt="Logo" class="w-10 h-10">
                    <span class="font-semibold">Madolan</span>
                </div>
                <button @click="mobileOpen = false">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <nav class="mt-6 space-y-4">
                <a href="#" class="block hover:text-primary text-sm sm:text-base @if(Route::is('landingpage')) text-primary @endif">Beranda</a>

                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center w-full justify-between hover:text-accent text-sm sm:text-base cursor-pointer @if(Route::is('fitur*')) text-accent @endif">
                        Fitur
                        <svg class="w-5 h-5" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.298l3.71-4.07a.75.75 0 011.08 1.04l-4.25 4.667a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="ml-4 mt-2 space-y-2">
                        <a href="#" class="block text-sm hover:text-primary">Dashboard Analisis</a>
                        <a href="#" class="block text-sm hover:text-primary">Forum</a>
                        <a href="#" class="block text-sm hover:text-primary">Pembelajaran</a>
                        <a href="#" class="block text-sm hover:text-primary">Point of Sales</a>
                        <a href="#" class="block text-sm hover:text-primary">Pembukuan</a>
                        <a href="#" class="block text-sm hover:text-primary">Pendanaan</a>
                    </div>
                </div>

                <a href="#" class="block hover:text-primary text-sm sm:text-base @if(Route::is('faq')) text-primary @endif">FAQ</a>
                <a href="#" class="block hover:text-accent text-sm sm:text-base @if(Route::is('forum*')) text-accent @endif">Forum</a>
                <a href="#" class="block hover:text-primary text-sm sm:text-base @if(Route::is('pembelajaran*')) text-primary @endif">Pembelajaran</a>

                <div class="pt-4 border-t border-gray-200 mt-4">
                     @auth
                        <div class="flex flex-col gap-2">
                            <a href="" class="w-full">
                                <x-button.icon class="w-full">
                                    <x-slot:icon>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9961 2.5C12.3525 2.5 12.6627 2.60379 12.9424 2.81641V2.81738L19.8652 8.11719L19.8721 8.12207C20.0656 8.26551 20.2178 8.4475 20.3301 8.67578L20.3311 8.67773C20.4441 8.90564 20.5 9.14456 20.5 9.40039V20.7002C20.5 20.9103 20.4282 21.0895 20.2598 21.2598C20.0914 21.4299 19.9165 21.5 19.7139 21.5H14.7207C14.553 21.5 14.4355 21.4483 14.335 21.3467C14.2338 21.2435 14.1816 21.1217 14.1816 20.9492V13.8506H9.81836V20.9492C9.81836 21.1236 9.76491 21.2447 9.66406 21.3467C9.56324 21.4485 9.44654 21.5 9.28027 21.5H4.28613C4.08353 21.5 3.90857 21.4299 3.74023 21.2598C3.57182 21.0895 3.50004 20.9103 3.5 20.7002V9.40039C3.50005 9.14456 3.55592 8.90563 3.66895 8.67773C3.78236 8.44905 3.93524 8.26601 4.12891 8.12207L4.13477 8.11816L11.0586 2.81641L11.0596 2.81543C11.3331 2.60427 11.6394 2.50001 11.9961 2.5ZM12 2.80078C11.7132 2.80078 11.4484 2.89368 11.2275 3.07812L4.30371 8.35254L4.28418 8.36816C4.14066 8.48931 4.02222 8.63363 3.93262 8.79883C3.85575 8.94064 3.81094 9.09164 3.79395 9.24707L3.78613 9.40039V21.2002H9.53223V14.1006C9.53223 13.9283 9.58494 13.8074 9.68652 13.7051L9.68848 13.7031C9.78942 13.6007 9.90581 13.5498 10.0713 13.5498H13.9287C14.0943 13.5498 14.2114 13.6009 14.3135 13.7041C14.4146 13.8064 14.4678 13.9275 14.4678 14.1006V21.2002H20.2139V9.40039C20.2138 9.19274 20.1685 8.99036 20.0703 8.80371C19.9805 8.63306 19.8587 8.48619 19.71 8.36426L19.7031 8.3584L19.6963 8.35352L12.7734 3.07812C12.5521 2.89401 12.2872 2.80078 12 2.80078Z" fill="#FCFDFD" stroke="#FCFDFD"/>
                                        </svg>
            
                                    </x-slot:icon>
                                    Dashboard
                                </x-button.icon>
                            </a>
                            <a href="#" class="flex items-center space-x-2 justify-center px-2 py-1 text-xs md:px-3 md:py-1.5 bg-accent rounded-sm">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-light" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 9.5C14.0711 9.5 15.75 7.82107 15.75 5.75C15.75 3.67893 14.0711 2 12 2C9.92893 2 8.25 3.67893 8.25 5.75C8.25 7.82107 9.92893 9.5 12 9.5Z" stroke-width="1.66667"/>
                                    <path d="M2 19.5C2 18.1739 2.52678 16.9021 3.46447 15.9645C4.40215 15.0268 5.67392 14.5 7 14.5H17C18.3261 14.5 19.5979 15.0268 20.5355 15.9645C21.4732 16.9021 22 18.1739 22 19.5C22 20.163 21.7366 20.7989 21.2678 21.2678C20.7989 21.7366 20.163 22 19.5 22H4.5C3.83696 22 3.20107 21.7366 2.73223 21.2678C2.26339 20.7989 2 20.163 2 19.5Z" stroke-width="1.66667" stroke-linejoin="round"/>
                                </svg>
                                <span class="truncate max-w-[100px] text-sm lg:text-base text-light">Sanjaya Putra</span>
                            </a>
                        </div>
                    @endauth
            
                    @guest
                        <div class="flex flex-col gap-2">
                            <a href="" class="w-full">
                                <x-button.default class="w-full">
                                    Register
                                </x-button.default>
                            </a>
                            <a href="" class="w-full">
                                <x-button.default variant="accent" class="w-full">
                                    Login
                                </x-button.default>
                            </a>
                        </div>
                    @endguest
                </div>
            </nav>
        </div>
    </div>

    <div 
        x-show="mobileOpen" 
        @click="mobileOpen = false"
        class="fixed inset-0 bg-black/50 bg-opacity-40 z-40"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    ></div>
</nav>