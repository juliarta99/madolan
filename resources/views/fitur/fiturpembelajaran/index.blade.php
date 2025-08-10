@extends('layouts.landingpage.main')

@section('content')
<section class="relative bg-gradient-to-br white via-white to-white-85 pt-30 overflow-hidden">

    <section class="max-w-6xl mx-auto px-6  flex flex-col md:flex-row items-center gap-20 mt-25">
        <!-- Logo -->
        <img src="{{ asset('assets/pembelajaran1.png') }}" alt="Madolan Logo" class="w-120 h-60 object-contain">

        <!-- Konten -->
        <div class="flex-1">
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500">Belajar</span> dan <span class="text-blue-600"> Berbagi Ilmu</span>
        </h3>
            <p class="text-gray-600 mt-3 leading-relaxed">
                Akses materi praktis, jadi mentor, atau bagikan pengalamanmu. Semua bisa belajar dan tumbuh bersama di Madolan
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
        <img src="{{ asset('assets/pembelajaran2.png') }}" alt="Ringkasan Penjualan" class="w-full max-w-md mx-auto">
        </div>
        <!-- Teks -->
        <div>
        <p class="text-blue-500 font-semibold mb-2">Belajar dari Mentor</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500">Ilmu Praktis</span>, Untuk <span class="text-blue-600">Aksi Nyata</span>
        </h3>
        <p class="text-gray-600 mb-6">
            Pelajari dasar-dasar bisnis, keuangan, pemasaran, hingga digitalisasi lewat modul  yang disusun untuk pelaku usaha. Serta berkesempatan mendapatkan mentor impian anda
        </p>

        </div>
    </div>

    <!-- Fitur 2 -->
    <div class="container mx-auto px-6 mt-50 grid md:grid-cols-2 items-center gap-10 md:text-right">
        <!-- Teks -->
        <div class="order-2 md:order-1">
        <p class="text-orange-600 font-semibold mb-2">Jadi Mentor dan Sharing Ilmu</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4">
            <span class="text-orange-500">Berbagi Ilmu</span>, Bangun <span class="text-blue-600">Ekosistem</span>
        </h3>
        <p class="text-gray-600 mb-6">
            Bantu pelaku usaha lain dengan membagikan pengalamanmu. Buat modul, jadi mentor, dan beri dampak nyata bagi komunitas
        </p>
        </div>
        <!-- Gambar -->
        <div class="order-1 md:order-2">
        <img src="{{ asset('assets/pembelajaran3.png') }}" alt="dasboard analisis" class="w-full max-w-md mx-auto">
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