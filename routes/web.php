<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

// ✅ Home & Redirect
Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('homepage.home');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);
});


// ✅ Whoami (cek user login)
Route::get('/whoami', function () {
    if (auth()->check()) {
        return response()->json([
            'logged_in' => true,
            'user' => auth()->user(),
        ]);
    }
    return response()->json(['logged_in' => false]);
});

// ✅ Halaman tambahan
Route::get('/about', fn() => view('homepage.about'))->name('about');
Route::get('/contact', fn() => view('homepage.contact'))->name('contact');
Route::get('/wishlist', fn() => view('homepage.wishlist'))->name('wishlist');

// ✅ Shop & Produk
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

// ✅ Search Produk
Route::get('/search', [SearchController::class, 'search'])->name('search');

// ✅ Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth routes
require __DIR__ . '/auth.php';
