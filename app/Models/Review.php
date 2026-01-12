<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'id_reviews';

    // TAMBAHKAN BARIS INI:
    protected $fillable = [
        'id_products',
        'id_users',
        'rating',
        'komentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }
}