<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of products (Admin)
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id_products', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_products' => 'required|string|max:100',
            'id_categories' => 'required|exists:categories,id_categories',
            'deskripsi_products' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'nullable|integer|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $imageName);
        }

        Product::create([
            'nama_products' => $request->nama_products,
            'id_categories' => $request->id_categories,
            'deskripsi_products' => $request->deskripsi_products,
            'harga' => $request->harga,
            'stok' => $request->stok ?? 0,
            'gambar' => $imageName,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified product
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_products' => 'required|string|max:100',
            'id_categories' => 'required|exists:categories,id_categories',
            'deskripsi_products' => 'nullable|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'nullable|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_products' => $request->nama_products,
            'id_categories' => $request->id_categories,
            'deskripsi_products' => $request->deskripsi_products,
            'harga' => $request->harga,
            'stok' => $request->stok ?? 0,
        ];

        // Handle file upload if new image is provided
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($product->gambar && file_exists(public_path('assets/img/' . $product->gambar))) {
                unlink(public_path('assets/img/' . $product->gambar));
            }

            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img'), $imageName);
            $data['gambar'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified product
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image file
        if ($product->gambar && file_exists(public_path('assets/img/' . $product->gambar))) {
            unlink(public_path('assets/img/' . $product->gambar));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}


