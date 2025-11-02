<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('homepage.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
=======
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

>>>>>>> 8f8001d62e0ee4025f44db1b0e11eb82d494c1cc

// Route untuk halaman About
Route::get('/about', function () {
    return view('homepage.about');
})->name('about');

// Route untuk halaman Contact
Route::get('/contact', function () {
    return view('homepage.contact');
})->name('contact');

// Route untuk halaman Shop
Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// Route untuk halaman detail produk (Shop Single)
Route::get('/shop-single/{id}', [ProductController::class, 'show'])->name('shop-single');

// Route untuk halaman Wishlist
Route::get('/wishlist', function () {
    return view('homepage.wishlist'); // Mengarahkan ke resources/views/homepages/wishlist.blade.php
})->name('wishlist');

<<<<<<< HEAD
// Route untuk search
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Admin Routes - Kelola Produk
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
});

require __DIR__ . '/auth.php';
=======
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
>>>>>>> 8f8001d62e0ee4025f44db1b0e11eb82d494c1cc
