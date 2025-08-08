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

Route::get('/admin/dashboard/product/katalog', function () {
    return view('dashboard.product.katalog.index');
})->name('admin.dashboard.product.katalog');
Route::get('/admin/dashboard/product/katalog/create', function () {
    return view('dashboard.product.katalog.create');
})->name('admin.dashboard.product.katalog.create');
Route::get('/admin/dashboard/product/kategori', function () {
    return view('dashboard.product.kategori.index');
})->name('admin.dashboard.product.kategori');
Route::get('/admin/dashboard/keuangan/kategori', function () {
    return view('dashboard.keuangan.kategori.index');
})->name('admin.dashboard.keuangan.kategori');

Route::get('/admin/dashboard/keuangan/type', function () {
    return view('dashboard.keuangan.type.index');
})->name('admin.dashboard.keuangan.type');
Route::get('/admin/dashboard/keuangan/kategori', function () {
    return view('dashboard.keuangan.kategori.index');
})->name('admin.dashboard.keuangan.kategori');

Route::get('/admin/dashboard/pendanaan/type', function () {
    return view('dashboard.pendanaan.type.index');
})->name('admin.dashboard.pendanaan.type');
Route::get('/admin/dashboard/pendanaan/information', function () {
    return view('dashboard.pendanaan.information.index');
})->name('admin.dashboard.pendanaan.information');
Route::get('/admin/dashboard/pendanaan/information/create', function () {
    return view('dashboard.pendanaan.information.create');
})->name('admin.dashboard.pendanaan.information.create');

Route::get('/admin/dashboard/learning/category', function () {
    return view('dashboard.learning.category.index');
})->name('admin.dashboard.learning.category');
Route::get('/admin/dashboard/learning/forum', function () {
    return view('dashboard.learning.forum.admin');
})->name('admin.dashboard.learning.forum');
Route::get('/admin/dashboard/learning/pembelajaran', function () {
    return view('dashboard.learning.pembelajaran.admin');
})->name('admin.dashboard.learning.pembelajaran');

Route::get('/admin/dashboard/access', function () {
    return view('dashboard.access.index');
})->name('admin.dashboard.access');