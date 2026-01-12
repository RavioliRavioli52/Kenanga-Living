<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  use HasFactory;

  protected $table = 'order_items';
  protected $fillable = ['id_orders', 'id_products', 'jumlah', 'harga_satuan', 'subtotal'];

  protected $primaryKey = 'id_order_items';

  /**
   * Relasi dengan Category
   */
  public function category()
  {
    return $this->belongsTo(Category::class, 'id_categories', 'id_categories');
  }
  public function product()
  {
    return $this->belongsTo(Product::class, 'id_products', 'id_products');
  }
}


