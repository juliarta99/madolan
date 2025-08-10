@extends('layouts.landingpage.main')

@section('content')

<section class="relative bg-gradient-to-br white via-white to-white-85 pt-30 overflow-hidden">
    <section class="bg-gradient-to-r from-white to-white-50 py-12">
        <div class="container mx-auto px-6 text-center">

            <!-- Heading -->
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
            <span class="text-blue-600">Frequently</span> Asked 
            <span class="text-orange-500">Questions</span>
            </h2>

            <!-- Deskripsi -->
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">
            Temukan jawaban atas pertanyaan umum seputar Madolan. Mulai dari fitur, keamanan data, hingga cara memulai semua dijelaskan dengan jelas dan singkat
            </p>

            {{-- Search Bar  --}}
            <form class='flex justify-start items-center w-full'>
                <x-input.default 
                    type="text" 
                    placeholder="Cari forum" 
                    class="!rounded-tl-full !rounded-bl-full border-r-0 !rounded-tr-none !rounded-br-none w-full"
                />
                <div class="border bg-light border-gray-300 rounded-r-full border-l-0 flex items-center">
                    <button 
                        type="submit" 
                        class="bg-primary hover:bg-secondary transition-all duration-200 
                            rounded-full w-10 h-10 flex items-center justify-center cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6 fill-light">
                            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </section>


    <section class="min-h-screen flex justify-center items-center bg-white-100">
        <section class="container flex flex-wrap gap-6 mx-auto justify-center">
    
        <!-- Kolom 1 -->
        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Umum</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apa itu Madolan?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Madolan adalah platform digital yang membantu pelaku usaha dalam memanage usahanya untuk naik kelas atau meningkatkan omzet usahanya
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Siapa saja yang bisa menggunakan Madolan?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Semua pelaku usaha dari berbagai skala dapat menggunakan Madolan
                </div>
            </div>

            <!-- Item 3 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 3 ? null : 3"
                    :class="active === 3 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah Madolan tersedia dalam bentuk aplikasi?</span>
                    <svg :class="{'rotate-180': active === 3}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 3" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, Madolan tersedia di web dan versi aplikasi mobile
                </div>
            </div>
        </section>

        <!-- Kolom 2 -->
            <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Pencatatan Keuangan & Laporan</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium text-left">Apakah saya bisa mencatat pemasukan dan pengeluaran secara manual?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, semua transaksi bisa dicatat secara manual atau otomatis jika terhubung dengan sistem POS
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah saya bisa mencatat hutang dan piutang?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, Anda bisa mencatat hutang (uang yang Anda pinjam dari orang lain) maupun piutang (uang yang dipinjam orang lain dari Anda) secara terpisah.
                </div>
            </div>

            <!-- Item 3 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 3 ? null : 3"
                    :class="active === 3 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah laporan keuangan dibuat otomatis?</span>
                    <svg :class="{'rotate-180': active === 3}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 3" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, sistem dapat membuat laporan keuangan secara otomatis berdasarkan semua transaksi yang telah Anda catat.
                </div>
            </div>
            <!-- Item 4 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 4 ? null : 4"
                    :class="active === 4 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Bisakah saya mengunduh laporan keuangan?</span>
                    <svg :class="{'rotate-180': active === 4}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 4" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, Anda dapat mengunduh laporan keuangan dalam format PDF sehingga bisa disimpan, dicetak, atau dibagikan kepada pihak lain.
                </div>
            </div>
        </section>

        {{-- Kolom 3  --}}
            <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Insight & Konsultasi AI</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Bagaimana cara menggunakan fitur konsultasi AI?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Cukup buka menu konsultasi pada forum, pilih topik seperti keuangan, pemasaran, atau strategi, lalu tanyakan langsung dengan AI yang didesain untuk bisnis usaha
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apa itu insight AI di Madolan?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Insight AI di Madolan adalah fitur berbasis kecerdasan buatan yang menganalisis data keuangan bisnis kamu secara otomatis.
                </div>
            </div>
        </section>

        {{-- Kolom 4 --}}
        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Dashboard Analisis</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apa saja yang ditampilkan di dashboard?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Dashboard menampilkan ringkasan omzet, pengeluaran, hutang-piutang, dan rekomendasi dari AI
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah data bisa dilihat harian, mingguan, atau bulanan?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, di Madolan kamu bisa melihat data keuangan secara fleksibel sesuai kebutuhan
                </div>
            </div>
        </section>

        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Sistem POS & Pre-Order</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apa itu fitur POS di Madolan?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Fitur POS adalah sistem kasir digital untuk mencatat transaksi usahamu baik toko fisik atau online
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah saya bisa mencatat penjualan pre-order?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, di Madolan kamu bisa mencatat penjualan pre-order dengan mudah.
                </div>
            </div>

            <!-- Item 3 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 3 ? null : 3"
                    :class="active === 3 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah stok barang akan otomatis berkurang setelah transaksi?</span>
                    <svg :class="{'rotate-180': active === 3}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 3" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, di Madolan stok barang akan otomatis berkurang setiap kali terjadi transaksi penjualan.
                </div>
            </div>
        </section>

        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Forum & Komunitas</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apa fungsi forum Madolan?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Forum adalah ruang diskusi antar pelaku usaha, tempat berbagi pengalaman, tanya jawab, dan belajar bersama
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Siapa yang bisa jadi mentor atau pembuat modul?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Siapa saja yang memiliki pengetahuan dan pengalaman di bidang tertentu dapat menjadi mentor atau pembuat modul di Madolan.
                </div>
            </div>
        </section>
        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Learning Resource</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah ada pembelajaran di Madolan?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, ada tips seputar manajemen usaha, pemasaran, pencatatan keuangan, dan lainnya
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah saya bisa menemukan mentor impian saya di pembelajaran ini?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya, Anda bisa. Platform ini menyediakan fitur pencarian dan rekomendasi mentor berdasarkan bidang keahlian, pengalaman, dan gaya mengajar yang sesuai dengan kebutuhan Anda. Dengan begitu, peluang untuk menemukan mentor yang sesuai dengan impian Anda menjadi lebih besar.
                </div>
            </div>
        </section>



        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Pendanaan & Kelayakan</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Bagaimana cara cek kelayakan pendanaan?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Gunakan fitur Cek Kelayakan, sistem akan otomatis menilai dari data usaha Anda.
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah saya bisa mendapatkan informasi seputar pendanaan di Madolan?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya. Madolan menyediakan informasi dan panduan terkait berbagai peluang pendanaan, mulai dari modal usaha, hibah, hingga program inkubasi bisnis. Informasi ini membantu Anda memahami syarat, proses, dan strategi mendapatkan pendanaan yang sesuai dengan kebutuhan bisnis Anda.
                </div>
            </div>
        </section>

        <section x-data="{ active: 1 }" class="bg-white rounded-xl shadow p-4 space-y-2 w-full sm:w-[calc(50%-0.75rem)]">
            <h2 class="font-semibold text-lg mb-2">Bantuan dan Dukungan</h2>

            <!-- Item 1 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                    :class="active === 1 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Jika saya menemukan bug, ke mana saya harus melapor?</span>
                    <svg :class="{'rotate-180': active === 1}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Silakan kirim laporan ke: help@madolan.com atau melalui WhatsApp: +62 812-XXXX-XXXX.
                </div>
            </div>

            <!-- Item 2 -->
            <div class="border rounded-lg overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                    :class="active === 2 ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-50'"
                    class="w-full flex justify-between items-center px-4 py-3 transition-colors">
                    <span class="font-medium">Apakah ada customer service yang dapat saya hubungi?</span>
                    <svg :class="{'rotate-180': active === 2}"
                        class="w-4 h-4 transform transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-transition class="px-4 py-3 text-sm bg-blue-600 text-white">
                    <hr class="border-white my-2">
                    Ya. Madolan menyediakan layanan customer service yang siap membantu Anda melalui berbagai saluran komunikasi, seperti chat, email, atau telepon, untuk menjawab pertanyaan dan memberikan panduan terkait penggunaan platform.
                </div>
            </div>
        </section>
    </section>
    </section>
    <section class="mt-50 bg-white">
        <div class="container mx-auto px-6 text-center justify-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
            <span class="text-orange-500">Masih Ada </span>yang Ingin <span class="text-blue-600">Kamu Tanyakan?</span> 
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
            Kami siap membantumu. Jika pertanyaanmu belum terjawab di FAQ, tim kami akan dengan senang hati menjawabnya secara langsung.
            </p>
            <div class="mt-8 flex justify-center">
                <a href="#" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Hubungi Kami
                </a>
            </div>

        </div>
    </section>
</section>





</section>
    <section class="bg-gradient-to-r from-white-50 to-white mt-40">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
            
            <!-- Kiri: Teks -->
            <div class="bg-blue-600 rounded-3xl p-10 w-full relative">
            <h2 class="text-white text-3xl md:text-4xl font-bold mb-4">
                Waktunya Usahamu Naik Kelas
            </h2>
            <p class="text-blue-100 mb-6">
                Jelajahi fitur Madolan sekarang. Gabung bersama ratusan pelaku usaha lain yang tumbuh dengan Madolan
            </p>
            <a href="#"
                class="bg-orange-500 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-orange-600 transition">
                Daftar Sekarang
            </a>

            <!-- Orang -->
                <img src="{{ asset('assets/people.png') }}" alt="Orang"
                class="hidden md:block absolute bottom-0 -right-1 w-48 md:w-64">
                </div>
        </div>
    </section>
@endsection