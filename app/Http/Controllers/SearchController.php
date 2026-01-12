<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle search request
     */
    public function search(Request $request)
    {
        $query = $request->q;

        $products = Product::where('nama_products', 'like', "%$query%")
            ->paginate(9);

        $categories = Category::orderBy('nama_categories')->get();

        return view('homepage.search-results', compact(
            'products',
            'query',
            'categories'
        ));
    }
}

