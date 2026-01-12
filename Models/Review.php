<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  use HasFactory;

  protected $table = 'reviews';
  protected $primaryKey = 'id_reviews'; // Sesuaikan dengan migrasi

  protected $fillable = [
    'id_products',
    'id_users',
    'rating',
    'komentar'
  ];

  // Relasi ke User (untuk mengambil nama pengulas)
  public function user()
  {
    return $this->belongsTo(User::class, 'id_users', 'id_users');
  }

  // Relasi ke Product
  public function product()
  {
    return $this->belongsTo(Product::class, 'id_products', 'id_products');
  }
}