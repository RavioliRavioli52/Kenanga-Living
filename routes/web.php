<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', fn() => redirect()->route('home'));
    Route::get('/home', fn() => view('homepage.home'))->name('home');
});

Route::group(['middleware' => ['web','auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.index');
});

Route::get('/whoami', function () {
    if (auth()->check()) {
        return response()->json([
            'logged_in' => true,
            'user' => auth()->user(),
        ]);
    }
    return response()->json(['logged_in' => false]);
});


// Route untuk halaman About
Route::get('/about', function () {
    return view('homepage.about');
})->name('about');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
