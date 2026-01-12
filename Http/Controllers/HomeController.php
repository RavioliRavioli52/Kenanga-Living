<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Ambil 3 produk terbaru sebagai featured products
        $featuredProducts = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('homepage.home', compact('featuredProducts'));
    }
}
