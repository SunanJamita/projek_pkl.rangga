<?php

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

// Berita
Route::get('/berita', function () {
    return view('berita.index');
})->name('berita.index');

Route::get('/berita/{slug}', function ($slug) {
    return view('berita.detail', compact('slug'));
})->name('berita.detail');

// Peraturan
Route::get('/peraturan', function () {
    return view('peraturan');
})->name('peraturan');

// Galeri
Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

// SAKIP
Route::get('/sakip', function () {
    return view('sakip');
})->name('sakip');

// Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
