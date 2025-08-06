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
    return view('umkm.keuangan.kategori');
})->name('dashboard.keuangan.kategori');

