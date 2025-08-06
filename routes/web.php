<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

