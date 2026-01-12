<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id_orders';

    protected $fillable = ['id_users', 'total_harga', 'metode_bayar', 'status', 'alamat_kirim'];

    /**
     * Relasi dengan Category
     */
    public function category()
    {
    return $this->belongsTo(Category::class, 'id_categories', 'id_categories');
    }
    public function items()
    {
    return $this->hasMany(OrderItem::class, 'id_orders', 'id_orders');
    }
    public function user()
    {
    return $this->belongsTo(User::class, 'id_users', 'id_users');
    }
}


