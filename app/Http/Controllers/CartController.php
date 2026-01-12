<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantityRequest = $request->input('quantity', 1); // Ambil input jumlah dari form

        // 1. Validasi apakah jumlah yang diminta melebihi stok di database
        if ($quantityRequest > $product->stok) {
            return redirect()->back()->with('error', 'Maaf, stok tidak mencukupi untuk jumlah yang Anda minta.');
        }

        $cart = session()->get('cart', []);

        // 2. Cek jika produk sudah ada di keranjang, hitung totalnya
        $currentQtyInCart = isset($cart[$id]) ? $cart[$id]['quantity'] : 0;
        $totalAfterAdd = $currentQtyInCart + $quantityRequest;

        // 3. Validasi total di keranjang tidak boleh melebihi stok
        if ($totalAfterAdd > $product->stok) {
            return redirect()->back()->with('error', 'Gagal menambah. Total di keranjang Anda melebihi stok tersedia.');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantityRequest;
        } else {
            $cart[$id] = [
                "name" => $product->nama_products,
                "quantity" => $quantityRequest,
                "price" => $product->harga,
                "image" => $product->gambar
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    public function index()
    {
        return view('homepage.cart'); // Buat file ini nanti untuk checkout
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}