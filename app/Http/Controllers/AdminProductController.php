<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest('id_products')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::select('id_categories', 'nama_categories')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_products' => 'required|max:100',
            'id_categories' => 'required|exists:categories,id_categories',
            'deskripsi_products' => 'nullable|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'nullable|integer|min:0',
            'gambar' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nama_products' => 'required|max:100',
            'id_categories' => 'required|exists:categories,id_categories',
            'deskripsi_products' => 'nullable|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'nullable|integer|min:0',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return back()->with('success', 'Produk berhasil dihapus');
    }
}


