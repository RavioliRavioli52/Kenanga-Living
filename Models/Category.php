<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id_categories';

    protected $fillable = [
        'nama_categories',
        'deskripsi',
    ];

    /**
     * Relasi dengan Product
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'id_categories', 'id_categories');
    }
}

