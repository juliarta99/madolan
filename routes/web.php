<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('landingpage');

Route::get('/forum', function () {
    return view('forum.index');
})->name('forum.index');
Route::get('/forum/show', function () {
    return view('forum.show');
})->name('forum.show');

Route::get('/dashboard', function () {
    return view('umkm.index');
})->name('dashboard');

Route::get('/dashboard/product/katalog', function () {
    return view('umkm.product.katalog.index');
})->name('dashboard.product.katalog');

Route::get('/dashboard/product/katalog/create', function () {
    return view('umkm.product.katalog.create');
})->name('dashboard.product.katalog.create');

Route::get('/dashboard/product/kategori', function () {
    return view('umkm.product.kategori.index');
})->name('dashboard.product.kategori');

Route::get('/dashboard/keuangan/kategori', function () {
    return view('umkm.keuangan.kategori.index');
})->name('dashboard.keuangan.kategori');

Route::get('/dashboard/keuangan/pembukuan', function () {
    return view('umkm.keuangan.pembukuan.index');
})->name('dashboard.keuangan.pembukuan');
Route::get('/dashboard/keuangan/pembukuan/create', function () {
    return view('umkm.keuangan.pembukuan.create');
})->name('dashboard.keuangan.pembukuan.create');

Route::get('/dashboard/keuangan/laporan/laba-rugi', function () {
    return view('umkm.keuangan.laporan.laba-rugi');
})->name('dashboard.keuangan.laporan');
Route::get('/dashboard/keuangan/laporan/arus-kas', function () {
    return view('umkm.keuangan.laporan.arus-kas');
})->name('dashboard.keuangan.laporan.arus-kas');
Route::get('/dashboard/keuangan/laporan/hutang-piutang', function () {
    return view('umkm.keuangan.laporan.hutang-piutang');
})->name('dashboard.keuangan.laporan.hutang-piutang');
Route::get('/dashboard/keuangan/laporan/penjualan', function () {
    return view('umkm.keuangan.laporan.penjualan');
})->name('dashboard.keuangan.laporan.penjualan');

Route::get('/dashboard/keuangan/pendanaan', function () {
    return view('umkm.keuangan.pendanaan.index');
})->name('dashboard.keuangan.pendanaan');
Route::get('/dashboard/keuangan/pendanaan/result', function () {
    return view('umkm.keuangan.pendanaan.result');
})->name('dashboard.keuangan.pendanaan.result');