@extends('layouts.landingpage.main')

@section('content')
<section class="relative bg-gradient-to-br white via-white to-white-85 pt-30 overflow-hidden">
    
  <section class="relative bg-white md:py-70 flex flex-col items-center justify-center px-4 md:block">
      
      <!-- FOTO ATAS (mobile) -->
      <div class="flex flex-col gap-4 w-full md:hidden">
          <img src="{{ asset('assets/hm1.png') }}" alt="" class="absolute -left-20 w-80 animate-my-custom">
          <img src="{{ asset('assets/hm2.png') }}" alt="" class="absolute -right-20 w-70 animate-my-custom">
      </div>

      <!-- FOTO ABSOLUTE UNTUK DESKTOP -->
      <img src="{{ asset('assets/hm1.png') }}" alt="" class="hidden md:block w-100 absolute top-[20%] z-0 -left-20 rotate-20 animate-my-custom">
      <img src="{{ asset('assets/hm2.png') }}" alt="" class="hidden md:block w-70 absolute top-[2%] z-0 left-[23%] rotate-20 animate-my-custom">
      <img src="{{ asset('assets/hm3.png') }}" alt="" class="hidden md:block w-100 absolute top-[30%] z-0 -right-30 -rotate-20 animate-my-custom">
      <img src="{{ asset('assets/hm4.png') }}" alt="" class="hidden md:block w-70 absolute top-[5%] z-0 right-[24%] -rotate-20 animate-my-custom">

      <!-- TEKS -->
      <div class="mt-65 md:mt-0 relative z-10 text-center max-w-3xl mx-auto">
          <h1 class="text-3xl md:text-5xl font-bold leading-tight">
              Semua <span class="text-orange-500">Usaha</span> Layak <span class="text-blue-600">Bertumbuh</span>
          </h1>
          <p class="mt-4 text-gray-600 text-lg">
              Bukan sekadar alat, tapi ruang untuk usahamu naik kelas dengan teknologi, data, dan komunitas
          </p>
          <div class="mt-8 flex justify-center gap-4">
              <a href="{{ route('fitur.ds.index')}}" class="px-6 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition">Lihat Fitur</a>
              <a href="{{ route('login.index')}}" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Daftar Sekarang</a>
          </div>
      </div>

      <!-- FOTO BAWAH (mobile) -->
      <div class="flex flex-col gap-4 w-full mt-10 md:hidden">
          <img src="{{ asset('assets/hm3.png') }}" alt="" class="absolute -left-20 w-80 animate-my-custom">
          <img src="{{ asset('assets/hm4.png') }}" alt="" class="absolute left-60 w-80 animate-my-custom">
      </div>

  </section>


<section class="mt-65 md:mt-0 max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-35">
    <!-- Logo -->
    <div class="bg-white rounded-3xl shadow-lg p-8 flex items-center justify-center">
        <img src="{{ asset('assets/logo.svg') }}" alt="Madolan Logo" class="w-60 h-50 object-contain">
    </div>

    <!-- Konten -->
    <div class="flex-1">
        <p class="text-orange-500 font-semibold text-sm">Tentang Madolan</p>
        <h1 class="text-3xl font-bold mt-1">
            Setiap Usaha Punya <span class="text-blue-600">Potensi Besar</span>
        </h1>
        <p class="text-gray-600 mt-3 leading-relaxed">
            Madolan adalah platform digital yang membantu usaha tumbuh lebih rapi, cerdas, dan mandiri 
            melalui pencatatan, analisis, kolaborasi, dan pembelajaran dalam satu ruang terpadu. 
            Dengan dukungan AI, Madolan menyajikan insight dan konsultasi cerdas untuk mendukung 
            keputusan bisnis yang lebih tepat dan berkelanjutan.
        </p>

        <!-- Statistik -->
        <div class="flex flex-col md:flex-row gap-10 mt-6">
            <!-- Card Biru -->
            <div class="flex items-center gap-3 bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition border-b-4 border-blue-600">
                <i class="fa-solid fa-arrow-trend-up text-blue-600 text-2xl"></i>
                <div>
                    <p class="text-2xl font-bold text-blue-600">61%</p>
                    <p class="text-gray-600 text-sm">PDB Indonesia berasal dari UMKM</p>
                </div>
            </div>

            <!-- Card Oranye -->
            <div class="flex items-center gap-3 bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition border-b-4 border-orange-500">
                <i class="fa-solid fa-arrow-trend-down text-orange-500 text-2xl"></i>
                <div>
                    <p class="text-2xl font-bold text-orange-500">21%</p>
                    <p class="text-gray-600 text-sm">Hanya 21% UMKM yang telah go digital</p>
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex gap-4 mt-6">
            <a href="{{ route('fitur.ds.index')}}" class="px-5 py-2 rounded-lg border-2 border-blue-600 text-blue-600 font-semibold hover:bg-blue-50">
                Jelajahi Lebih Lanjut
            </a>
            <a href="{{ route('login.index')}}" class="px-5 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                Daftar Sekarang
            </a>
        </div>
    </div>
</section>

<!-- Section Naik Kelas -->
<section class="py-50 bg-white">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      Bantu Usahamu <span class="text-blue-600">Naik</span> <span class="text-orange-500">Kelas</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto">
      Nikmati pengalaman baru dalam mengelola usaha lebih mudah, cerdas, dan terasa dampaknya sejak awal
    </p>
  </div>

  <!-- Fitur 1 -->
  <div class="container mx-auto px-6 mt-12 grid md:grid-cols-2 items-center gap-10">
    <!-- Gambar -->
    <div>
      <img src="{{ asset('assets/info1.png') }}" alt="Dashboard Analisis" class="w-full max-w-md mx-auto">
    </div>
    <!-- Teks -->
    <div>
      <p class="text-orange-500 font-semibold mb-2">Dashboard Analisis</p>
      <h3 class="text-2xl md:text-3xl font-bold mb-4">
        Lihat <span class="text-blue-600">Data</span>, Buat Keputusan <span class="text-orange-500">Lebih Cerdas</span>
      </h3>
      <p class="text-gray-600 mb-6">
        Semua performa usaha dirangkum rapi dari omzet, pengeluaran, hingga saran cerdas berbasis AI
      </p>
      <a href="{{ route('fitur.ds.index')}}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        Jelajahi Fitur
      </a>
    </div>
  </div>

  <!-- Fitur 2 -->
  <div class="container mx-auto px-6 mt-16 grid md:grid-cols-2 items-center gap-10 md:text-right">
    <!-- Teks -->
    <div class="order-2 md:order-1">
      <p class="text-blue-600 font-semibold mb-2">Forum</p>
      <h3 class="text-2xl md:text-3xl font-bold mb-4">
        <span class="text-blue-600">Belajar</span> Bersama, <span class="text-orange-500">Tumbuh</span> Bersama
      </h3>
      <p class="text-gray-600 mb-6">
        Ruang diskusi dan tanya jawab langsung dengan pelaku usaha lain dan mentor. Dapat ilmu dan siap tumbuh bersama, serta dapatkan insight melalui konsultasi dengan AI
      </p>
      <a href="{{ route('fitur.fiturforum.index')}}" class="px-6 py-3 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600 transition">
        Jelajahi Fitur
      </a>
    </div>
    <!-- Gambar -->
    <div class="order-1 md:order-2">
      <img src="{{ asset('assets/info2.png') }}" alt="Forum" class="w-full max-w-md mx-auto">
    </div>
  </div>

    <!-- Fitur 3 -->
  <div class="container mx-auto px-6 mt-12 grid md:grid-cols-2 items-center gap-10">
    <!-- Gambar -->
    <div>
      <img src="{{ asset('assets/info3.png') }}" alt="Learning Resource" class="w-full max-w-md mx-auto">
    </div>
    <!-- Teks -->
    <div>
      <p class="text-orange-500 font-semibold mb-2">Learning Resource</p>
      <h3 class="text-2xl md:text-3xl font-bold mb-4">
        Ilmu <span class="text-blue-600">Bisnis</span>, Sekali <span class="text-orange-500">Klik</span>
      </h3>
      <p class="text-gray-600 mb-6">
        Belajar dari mentor berpengalaman, tips praktis seputar usaha dan keuangan. Dari dasar sampai strategi lanjut
      </p>
      <a href="{{ route('fitur.fiturpembelajaran.index')}}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        Jelajahi Fitur
      </a>
    </div>
  </div>

   <!-- Fitur 4 -->
  <div class="container mx-auto px-6 mt-16 grid md:grid-cols-2 items-center gap-10 md:text-right">
    <!-- Teks -->
    <div class="order-2 md:order-1">
      <p class="text-blue-600 font-semibold mb-2">Point of Sale</p>
      <h3 class="text-2xl md:text-3xl font-bold mb-4">
        <span class="text-blue-600">Catat</span> Transaksi, Bersama <span class="text-orange-500">Lebih Terarah</span>
      </h3>
      <p class="text-gray-600 mb-6">
        Dari transaksi harian, kamu bisa bangun bisnis yang lebih rapi, terukur, dan siap tumbuh. Semuanya berawal dari satu klik pencatatan
      </p>
      <a href="{{ route('fitur.fiturPOS.index')}}" class="px-6 py-3 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600 transition">
        Jelajahi Fitur
      </a>
    </div>
    <!-- Gambar -->
    <div class="order-1 md:order-2">
      <img src="{{ asset('assets/info4.png') }}" alt="Forum" class="w-full max-w-md mx-auto">
    </div>
  </div>

    <!-- Fitur 5 -->
  <div class="container mx-auto px-6 mt-12 grid md:grid-cols-2 items-center gap-10">
    <!-- Gambar -->
    <div>
      <img src="{{ asset('assets/info5.png') }}" alt="Learning Resource" class="w-full max-w-md mx-auto">
    </div>
    <!-- Teks -->
    <div>
      <p class="text-orange-500 font-semibold mb-2">Pembukuan & Laporan</p>
      <h3 class="text-2xl md:text-3xl font-bold mb-4">
        Satu <span class="text-blue-600">Catatan</span>, Banyak <span class="text-orange-500">Manfaat</span>
      </h3>
      <p class="text-gray-600 mb-6">
        Semua transaksi usaha pemasukan, pengeluaran, utang, dan lainnya dapat tercatat rapi dalam sistem. Tanpa ribet hitung manual, laporan keuangan seperti arus kas, laba rugi, dan lainnya  tersusun otomatis
      </p>
      <a href="{{ route('fitur.fiturlaporan.index')}}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        Jelajahi Fitur
      </a>
    </div>
  </div>

    <!-- Fitur 6 -->
    <div class="container mx-auto px-6 mt-16 grid md:grid-cols-[60%_40%] items-center gap-10 md:text-right">
    <!-- Teks -->
    <div class="order-2 md:order-1">
        <p class="text-blue-600 font-semibold mb-2">Informasi Pendanaan</p>
        <h3 class="text-2xl md:text-3xl font-bold mb-4 leading-snug">
        Akses <span class="text-blue-600">Informasi Pendanaan</span>, 
        <span class="whitespace-nowrap">
            Cek <span class="text-orange-500">Kelayakan</span>
        </span>
        </h3>
        <p class="text-gray-600 mb-6">
        Madolan bantu kamu temukan program pendanaan yang sesuai dari KUR, koperasi, hingga fintech. 
        Sistem kami membaca data usahamu, lalu menilai apakah kamu sudah memenuhi syarat.
        </p>
        <a href="{{ route('fitur.fiturpendanaan.index')}}" class="px-6 py-3 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600 transition">
        Jelajahi Fitur
        </a>
    </div>

    <!-- Gambar -->
    <div class="order-1 md:order-2">
        <img src="{{ asset('assets/info6.png') }}" alt="Forum" class="w-full max-w-md mx-auto">
    </div>
    </div>
</section>

<section class="py-16 bg-white">
  <div class="container mx-auto px-6 text-center">
    <!-- Judul -->
    <h2 class="text-2xl md:text-3xl font-bold mb-2">
      Apa Kata <span class="text-blue-600">Mereka</span>
    </h2>
    <p class="text-gray-600 mb-12">
      Dari usaha kecil hingga usaha besar, semua punya cerita tumbuh bersama
    </p>

    <!-- Grid Testimoni -->
    <div class="grid md:grid-cols-3 gap-8 mb-8">
      <!-- Card 1 -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center mb-4 text-left">
          <img src="{{ asset('assets/testimoni/1.jpg') }}" alt="Sari Lestari" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Sari Lestari</h4>
            <p class="text-gray-500 text-sm">Warung Sari Mulia</p>
          </div>
        </div>
        <p class="text-gray-700 text-sm text-left">
          Dulu saya catat manual di buku. Setelah pakai Madolan, keuangan lebih rapi, dan saya bisa ajukan KUR dengan tenang.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center mb-4 text-left">
          <img src="{{ asset('assets/testimoni/2.jpg') }}" alt="Rizky Maulana" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Rizky Maulana</h4>
            <p class="text-gray-500 text-sm">Kopi Muda Mandiri</p>
          </div>
        </div>
        <p class="text-gray-700 text-sm text-left">
          Saya nggak ngerti laporan keuangan, tapi Madolan bantu buat otomatis. Sekarang bisa pantau keuntungan harian langsung dari HP.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center mb-4 text-left">
          <img src="{{ asset('assets/testimoni/3.jpg') }}" alt="Nurhayati" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Nurhayati</h4>
            <p class="text-gray-500 text-sm">Laundry Bersih Kilat</p>
          </div>
        </div>
        <p class="text-gray-700 text-sm text-left">
          Insight AI-nya keren! Madolan kasih saran yang tepat. Terbukti penjualan naik.
        </p>
      </div>
    </div>

    <!-- Row Bawah -->
    <div class="grid md:grid-cols-3 gap-8 items-center">
      <!-- Card 4 -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center mb-4 text-left">
          <img src="{{ asset('assets/testimoni/4.jpg') }}" alt="Andrianto" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Andrianto</h4>
            <p class="text-gray-500 text-sm">Jasa Ketik Anto</p>
          </div>
        </div>
        <p class="text-gray-700 text-sm text-left">
          Dengan Madolan, semua data jualan terekam. Saya bisa lihat produk mana yang paling laku dan dapat peringatan kalau stok mau habis.
        </p>
      </div>

      <!-- Persentase Tengah -->
      <div class="text-center">
        <p class="text-5xl font-bold text-orange-500 mb-2">83%</p>
        <p class="text-lg font-semibold">
          Pengguna Madolan mencatat keuangan lebih rapi dan berhasil meningkatkan omzet
        </p>
      </div>

      <!-- Card 5 -->
      <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center mb-4 text-left">
          <img src="{{ asset('assets/testimoni/5.jpg') }}" alt="Dina" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">Dina</h4>
            <p class="text-gray-500 text-sm">Dina Aksesoris</p>
          </div>
        </div>
        <p class="text-gray-700 text-sm text-left">
          Lewat forum Madolan, saya bisa tanya langsung ke mentor tentang cara ngatur stok dan harga jual. Dulu bingung, sekarang jauh lebih paham.
        </p>
      </div>
    </div>
  </div>
</section>

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
      <a href="{{ route('login.index')}}"
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