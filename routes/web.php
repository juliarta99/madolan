<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landingpage');;

// pos
Route::get('/pos', function () {
    return view('pos.pos');
});
Route::get('/pos-scan', function () {
    return view('pos.pos-scan');
});
Route::get('/pos-confirm', function () {
    return view('pos.pos-confirm');
});
Route::get('/pos-succes', function () {
    return view('pos.pos-succes');
});

Route::get('/pending', function () {
    return view('user-validation.pending');
});
Route::get('/reject', function () {
    return view('user-validation.reject');
});

Route::get('/riwayat', function () {
    return view('dashboard.pos.riwayat-transaksi');
});

Route::get('/list-preorder', function () {
    return view('dashboard.pos.list-preorder');
});

//juli
Route::get('/forum', function () {
    return view('forum.index');
})->name('forum.index');
Route::get('/forum/show', function () {
    return view('forum.show');
})->name('forum.show');

Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

Route::get('/register', function () {
    return view('register.index');
})->name('register.index');

Route::get('/umkm', function () {
    return view('register.umkm.index');
})->name('register.umkm.index');

Route::get('/mentor', function () {
    return view('register.mentor.index');
})->name('register.mentor.index');
Route::get('/pembelajaran', function () {
    return view('pembelajaran.index');
})->name('pembelajaran.index');
Route::get('/pembelajaran/show', function () {
    return view('pembelajaran.show');
})->name('pembelajaran.show');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/product/katalog', function () {
    return view('dashboard.product.katalog.index');
})->name('dashboard.product.katalog');

Route::get('/dashboard/product/katalog/create', function () {
    return view('dashboard.product.katalog.create');
})->name('dashboard.product.katalog.create');

Route::get('/dashboard/product/kategori', function () {
    return view('dashboard.product.kategori.index');
})->name('dashboard.product.kategori');

Route::get('/dashboard/keuangan/kategori', function () {
    return view('dashboard.keuangan.kategori.index');
})->name('dashboard.keuangan.kategori');

Route::get('/dashboard/keuangan/pembukuan', function () {
    return view('dashboard.keuangan.pembukuan.index');
})->name('dashboard.keuangan.pembukuan');
Route::get('/dashboard/keuangan/pembukuan/create', function () {
    return view('dashboard.keuangan.pembukuan.create');
})->name('dashboard.keuangan.pembukuan.create');

Route::get('/dashboard/keuangan/laporan/laba-rugi', function () {
    return view('dashboard.keuangan.laporan.laba-rugi');
})->name('dashboard.keuangan.laporan');
Route::get('/dashboard/keuangan/laporan/arus-kas', function () {
    return view('dashboard.keuangan.laporan.arus-kas');
})->name('dashboard.keuangan.laporan.arus-kas');
Route::get('/dashboard/keuangan/laporan/hutang-piutang', function () {
    return view('dashboard.keuangan.laporan.hutang-piutang');
})->name('dashboard.keuangan.laporan.hutang-piutang');
Route::get('/dashboard/keuangan/laporan/penjualan', function () {
    return view('dashboard.keuangan.laporan.penjualan');
})->name('dashboard.keuangan.laporan.penjualan');

Route::get('/dashboard/keuangan/pendanaan', function () {
    return view('dashboard.keuangan.pendanaan.index');
})->name('dashboard.keuangan.pendanaan');
Route::get('/dashboard/keuangan/pendanaan/result', function () {
    return view('dashboard.keuangan.pendanaan.result');
})->name('dashboard.keuangan.pendanaan.result');

Route::get('/dashboard/learning/forum', function () {
    return view('dashboard.learning.forum.index');
})->name('dashboard.learning.forum');
Route::get('/dashboard/learning/forum/create', function () {
    return view('dashboard.learning.forum.create');
})->name('dashboard.learning.forum.create');

Route::get('/dashboard/access', function () {
    return view('dashboard.access.index');
})->name('dashboard.access');
Route::get('/dashboard/access/create', function () {
    return view('dashboard.access.create');
})->name('dashboard.access.create');
Route::get('/dashboard/access/show', function () {
    return view('dashboard.access.show');
})->name('dashboard.access.show');

// mentor
Route::get('/mentor/dashboard', function () {
    return view('dashboard.mentor');
})->name('mentor.dashboard');
Route::get('/mentor/dashboard/forum', function () {
    return view('dashboard.learning.forum.index');
})->name('mentor.dashboard.forum');
Route::get('/mentor/dashboard/pembelajaran', function () {
    return view('dashboard.learning.pembelajaran.index');
})->name('mentor.dashboard.pembelajaran');
Route::get('/mentor/dashboard/pembelajaran/create', function () {
    return view('dashboard.learning.pembelajaran.create');
})->name('mentor.dashboard.pembelajaran.create');

// admin
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard');
Route::get('/admin/dashboard/user', function () {
    return view('dashboard.user.index');
})->name('admin.dashboard.user');
