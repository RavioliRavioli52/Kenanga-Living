<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle search request
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        
        // Jika query kosong, redirect kembali dengan pesan
        if (empty(trim($query))) {
            return redirect()->route('home')->with('search_error', 'Masukkan kata kunci untuk mencari produk.');
        }

        // Mencari produk berdasarkan nama atau deskripsi
        $products = Product::where(function($q) use ($query) {
                $q->where('nama_products', 'LIKE', '%' . $query . '%')
                  ->orWhere('deskripsi_products', 'LIKE', '%' . $query . '%');
            })
            ->orderBy('nama_products', 'asc')
            ->paginate(12);

        return view('homepage.search-results', [
            'products' => $products,
            'query' => $query
        ]);
    }
}

