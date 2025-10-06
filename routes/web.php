<?php

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami.index');
})->name('tentang-kami');

// Tentang Kami Submenu
Route::get('/sejarah', function () {
    return view('tentang-kami.sejarah');
})->name('sejarah');

Route::get('/tupoksi', function () {
    return view('tentang-kami.tupoksi');
})->name('tupoksi');

Route::get('/struktur', function () {
    return view('tentang-kami.struktur');
})->name('struktur');

Route::get('/dukungan', function () {
    return view('tentang-kami.dukungan');
})->name('dukungan');

Route::get('/statistik', function () {
    return view('tentang-kami.statistik');
})->name('statistik');

Route::get('/survey', function () {
    return view('tentang-kami.survey');
})->name('survey');

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
