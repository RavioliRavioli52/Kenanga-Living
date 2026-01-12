<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }
        return view('homepage.checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'alamat_kirim' => 'required|string|max:100',
            'metode_bayar' => 'required|in:COD,Virtual Account',
            'bank' => 'required_if:metode_bayar,Virtual Account|nullable|in:BCA,BRI',
        ]);

        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }

        $total_harga = 0;
        foreach ($cart as $item) {
            $total_harga += $item['price'] * $item['quantity'];
        }

        DB::beginTransaction();
        try {

            // Generate VA
            $va_number = null;
            if ($request->metode_bayar === 'Virtual Account') {
                $prefix = $request->bank === 'BCA' ? '8800' : '1200';
                $va_number = $prefix . rand(10000000, 99999999);
            }

            // 1️⃣ Simpan Order (HANYA SEKALI)
            $order = Order::create([
                'id_users' => Auth::user()->id_users,
                'total_harga' => $total_harga,
                'metode_bayar' => $request->metode_bayar,
                'status' => 'pending',
                'alamat_kirim' => $request->alamat_kirim,
                // 'va_number' => $va_number, // jika ada kolomnya
            ]);

            // 2️⃣ Simpan Item & Kurangi Stok
            foreach ($cart as $id_products => $details) {

                OrderItem::create([
                    'id_orders' => $order->id_orders,
                    'id_products' => $id_products,
                    'jumlah' => $details['quantity'],
                    'harga_satuan' => $details['price'],
                    'subtotal' => $details['price'] * $details['quantity'],
                ]);

                $product = Product::findOrFail($id_products);

                if ($product->stok < $details['quantity']) {
                    throw new \Exception('Stok produk tidak mencukupi');
                }

                $product->decrement('stok', $details['quantity']);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('home')
                ->with([
                    'success' => 'Pesanan berhasil diproses',
                    'va_number' => $va_number, // Kirim nomor VA
                    'bank' => $request->bank,     // Kirim nama Bank
                    'total_bayar' => $total_harga // Kirim total untuk tampilan di Home
                ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function myOrders()
    {
        $orders = Order::where('id_users', auth()->user()->id_users)
            ->with('items.product')
            ->latest()
            ->get();

        return view('homepage.my-orders', compact('orders'));
    }

}
