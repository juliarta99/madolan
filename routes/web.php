<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pos', function () {
    return view('pos/pos');
});
Route::get('/pos-scan', function () {
    return view('pos/pos-scan');
});
Route::get('/pos-confirm', function () {
    return view('pos/pos-confirm');
});
Route::get('/pos-succes', function () {
    return view('pos/pos-succes');
});