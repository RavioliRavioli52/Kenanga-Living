<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman utama, kemungkinan menggunakan index.blade.php
// Jika Anda ingin menggunakan index.blade.php dari folder homepages
Route::get('/', function () {
    return view('homepage.home');
})->name('home'); // <-- Tambahkan nama route

// Route untuk halaman About
Route::get('/about', function () {
    return view('homepage.about');
})->name('about'); // <-- Tambahkan nama route

// Route untuk halaman Contact
Route::get('/contact', function () {
    return view('homepage.contact');
})->name('contact');

// Route untuk halaman Shop
Route::get('/shop', function () {
    return view('homepage.shop');
})->name('shop'); // <-- Tambahkan nama route

// Route untuk halaman detail produk (Shop Single)
Route::get('/shop-single', function () {
    return view('homepage.shop-single'); // Mengarahkan ke resources/views/homepages/shop-single.blade.php
})->name('shop-single'); // <-- Tambahkan nama route

// Route untuk halaman Wishlist
Route::get('/wishlist', function () {
    return view('homepage.wishlist'); // Mengarahkan ke resources/views/homepages/wishlist.blade.php
})->name('wishlist');