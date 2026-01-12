<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_products';

    protected $fillable = [
        'id_categories',
        'nama_products',
        'deskripsi_products',
        'harga',
        'stok',
        'gambar',
    ];

    /**
     * Relasi dengan Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categories', 'id_categories');
    }
}


