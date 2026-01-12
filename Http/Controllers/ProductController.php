<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products (Shop page)
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category (jenis barang) - bisa multiple
        if ($request->has('categories') && is_array($request->categories) && count($request->categories) > 0) {
            // Filter out empty values and convert to integers
            $categoryIds = array_filter(array_map('intval', $request->categories));
            if (count($categoryIds) > 0) {
                $query->whereIn('id_categories', $categoryIds);
            }
        } elseif ($request->has('category') && $request->category) {
            // Support untuk backward compatibility dengan single category
            $query->where('id_categories', (int)$request->category);
        }

        // Filter by price range (harga)
        if ($request->has('min_price') && $request->min_price) {
            $query->where('harga', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('harga', '<=', $request->max_price);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_products', 'LIKE', '%' . $search . '%')
                  ->orWhere('deskripsi_products', 'LIKE', '%' . $search . '%');
            });
        }

        $products = $query->orderBy('nama_products', 'asc')->paginate(12);
        $categories = Category::all();

        return view('homepage.shop', compact('products', 'categories'));
    }

    /**
     * Display the specified product (Shop Single page)
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $relatedProducts = Product::where('id_categories', $product->id_categories)
            ->where('id_products', '!=', $id)
            ->limit(4)
            ->get();

        return view('homepage.shop-single', compact('product', 'relatedProducts'));
    }
}
