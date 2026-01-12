<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items.product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function confirm($id_orders)
    {
        $order = Order::where('id_orders', $id_orders)->firstOrFail();

        if ($order->status !== 'pending') {
            return back()->with('error', 'Order sudah diproses.');
        }

        $order->update([
            'status' => 'selesai'
        ]);

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}

