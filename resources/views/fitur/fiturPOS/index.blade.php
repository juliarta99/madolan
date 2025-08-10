@extends('layouts.landingpage.main')

@section('content')
<section class="relative bg-gradient-to-br white via-white to-white-85 pt-30 overflow-hidden">

    <section class="max-w-6xl mx-auto px-6  flex flex-col md:flex-row items-center gap-20 mt-25">
        <!-- Logo -->
        <img src="{{ asset('assets/pos1.png') }}" alt="Madolan Logo" class="w-120 h-60 object-contain">

        <!-- Konten -->
        <div class="flex-1">
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-blue-600">Kelola </span>Penjualan Lebih <span class="text-orange-500">Mudah, Cepat, dan Akurat</span> 
        </h3>
            <p class="text-gray-600 mt-3 leading-relaxed">
                Sistem kasir modern dan pre-order yang membantu mencatat transaksi, mengatur stok, dan menyederhanakan proses jual beli tanpa ribet
            </p>
            <!-- Tombol -->
            <div class="flex gap-4 mt-6">
                <a href="#" class="px-5 py-2 rounded-lg border-2 border-blue-600 text-blue-600 font-semibold hover:bg-blue-50">
                    Jelajahi Lebih Lanjut
                </a>
                <a href="{{ route('login.index')}}" class="px-5 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Fitur 1 -->
    <div class="container mx-auto px-6 mt-100 grid md:grid-cols-2 items-center gap-10">
        <!-- Gambar -->
        <div>
        <img src="{{ asset('assets/pos1.png') }}" alt="Ringkasan Penjualan" class="w-full max-w-md mx-auto">
        </div>
        <!-- Teks -->
        <div>
        <p class="text-blue-500 font-semibold mb-2">Sistem Kasir Friendly</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500"> Antarmuka</span> Kasir yang <span class="text-blue-600">Ramah & Praktis</span>
        </h3>
        <p class="text-gray-600 mb-6">
            Dirancang untuk memudahkan siapa pun, cukup beberapa klik untuk menyelesaikan transaksi. Cocok untuk toko kecil hingga bisnis berkembang
        </p>

        </div>
    </div>

    <!-- Fitur 2 -->
    <div class="container mx-auto px-6 mt-50 grid md:grid-cols-2 items-center gap-10 md:text-right">
        <!-- Teks -->
        <div class="order-2 md:order-1">
        <p class="text-orange-600 font-semibold mb-2">Manajemen Barang dan Stok</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500">Catat</span> Barang dan Stok dengan<span class="text-blue-600"> Mudah</span>
        </h3>
        <p class="text-gray-600 mb-6">
            Sistem pendataan barang, memberi peringatan  jika stok menipis, dan menampilkan ringkasan barang paling laris
        </p>
        </div>
        <!-- Gambar -->
        <div class="order-1 md:order-2">
        <img src="{{ asset('assets/pos1.png') }}" alt="dasboard analisis" class="w-full max-w-md mx-auto">
        </div>
    </div>

    <!-- Fitur 3 -->
    <div class="container mx-auto px-6 mt-50 grid md:grid-cols-2 items-center gap-10">
        <!-- Gambar -->
        <div>
        <img src="{{ asset('assets/pos1.png') }}" alt="Best Time" class="w-full max-w-md mx-auto">
        </div>
        <!-- Teks -->
        <div>
        <p class="text-blue-500 font-semibold mb-2">Sistem Pre-Order</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500">Terima Pesanan </span>Sebelum <span class="text-blue-500">Hari H </span>
        </h3>
        <p class="text-gray-600 mb-6">
            Cocok untuk produk berbasis pesanan seperti kue atau hampers. Pre-order terintegrasi langsung ke dashboard dan laporan
        </p>
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