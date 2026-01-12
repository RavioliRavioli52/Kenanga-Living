<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Home & Redirect
Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('homepage.home');
});

// Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('orders.index');

    Route::post('/orders/{id_orders}/confirm', [AdminOrderController::class, 'confirm'])
        ->name('orders.confirm');
});

// Halaman tambahan
Route::get('/about', fn() => view('homepage.about'))->name('about');
Route::get('/contact', fn() => view('homepage.contact'))->name('contact');
Route::get('/wishlist', fn() => view('homepage.wishlist'))->name('wishlist');

// Shop & Produk
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

// Search Produk
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', function () {
    return "Halaman Checkout (Segera Hadir)"; // Nanti ganti dengan controller sesungguhnya
})->name('checkout');

// Pastikan user harus login dulu sebelum checkout agar data pengiriman tercatat dengan benar
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/product/{id}/review', [ReviewController::class, 'store'])->name('review.store')->middleware('auth');
    Route::get('/my-orders', [CheckoutController::class, 'myOrders'])->name('orders.my');
});

// Auth routes
require __DIR__ . '/auth.php';
