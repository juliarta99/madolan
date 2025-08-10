@extends('layouts.landingpage.main')

@section('content')
<section class="relative bg-gradient-to-br white via-white to-white-85 pt-30 overflow-hidden">

    <section class="max-w-6xl mx-auto px-6  flex flex-col md:flex-row items-center gap-20 mt-25">
        <!-- Logo -->
        <img src="{{ asset('assets/Pembukuan.png') }}" alt="Madolan Logo" class="w-120 h-60 object-contain">

        <!-- Konten -->
        <div class="flex-1">
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-blue-600">Catat </span> Sekali, <span class="text-orange-500">Laporan </span>Jalan Sendiri 
        </h3>
            <p class="text-gray-600 mt-3 leading-relaxed">
                Dengan Madolan, pembukuan harian jadi mudah dan laporan keuangan langsung tersusun otomatis. Lebih cepat, rapi, dan siap pakai
            </p>
            <!-- Tombol -->
            <div class="flex gap-4 mt-6">
                <a href="#" class="px-5 py-2 rounded-lg border-2 border-blue-600 text-blue-600 font-semibold hover:bg-blue-50">
                    Jelajahi Lebih Lanjut
                </a>
                <a href="#" class="px-5 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Fitur 1 -->
    <div class="container mx-auto px-6 mt-100 grid md:grid-cols-2 items-center gap-10">
        <!-- Gambar -->
        <div>
        <img src="{{ asset('assets/Pembukuan.png') }}" alt="Ringkasan Penjualan" class="w-full max-w-md mx-auto">
        </div>
        <!-- Teks -->
        <div>
        <p class="text-blue-500 font-semibold mb-2">Pembukuan</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            Pemasukan, Pengeluaran, Hutang <span class="text-orange-500">Semua </span>Dapat <span class="text-blue-600">Tercatat</span>
        </h3>
        <p class="text-gray-600 mb-6">
            Catat seluruh transaksi harian secara ringkas namun lengkap. Madolan bantu kamu memahami keuangan usahamu dari hari ke hari
        </p>

        </div>
    </div>

    <!-- Fitur 2 -->
    <div class="container mx-auto px-6 mt-50 grid md:grid-cols-2 items-center gap-10 md:text-right">
        <!-- Teks -->
        <div class="order-2 md:order-1">
        <p class="text-orange-600 font-semibold mb-2">Laporan Otomatis</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500">Laporan Siap </span>Unduh, <span class="text-blue-600">Tanpa Ribet</span>
        </h3>
        <p class="text-gray-600 mb-6">
            Laba rugi, arus kas, dan lainnya disajikan otomatis dari pembukuan. Praktis untuk evaluasi usaha atau pengajuan pendanaan
        </p>
        </div>
        <!-- Gambar -->
        <div class="order-1 md:order-2">
        <img src="{{ asset('assets/Pembukuan.png') }}" alt="dasboard analisis" class="w-full max-w-md mx-auto">
        </div>
    </div>

    <section class="bg-gradient-to-r from-white-50 to-white pt-50">
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