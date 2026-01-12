<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id_products)
    {
        // Validasi input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:500',
        ]);

        // Simpan ulasan
        Review::create([
            'id_products' => $id_products,
            'id_users' => Auth::user()->id_users, // Sesuai kolom primary key user Anda
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}