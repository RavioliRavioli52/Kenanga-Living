<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_categories' => 'Kursi',
                'deskripsi' => 'Koleksi kursi modern dan klasik untuk ruang tamu, ruang makan, dan kantor',
            ],
            [
                'nama_categories' => 'Meja',
                'deskripsi' => 'Meja makan, meja kerja, meja kopi, dan meja lainnya dengan berbagai desain',
            ],
            [
                'nama_categories' => 'Sofa',
                'deskripsi' => 'Sofa dan kursi panjang yang nyaman untuk ruang tamu Anda',
            ],
            [
                'nama_categories' => 'Lemari',
                'deskripsi' => 'Lemari pakaian, lemari dapur, dan lemari penyimpanan berbagai ukuran',
            ],
            [
                'nama_categories' => 'Rak',
                'deskripsi' => 'Rak buku, rak TV, dan rak display untuk menata barang-barang Anda',
            ],
            [
                'nama_categories' => 'Tempat Tidur',
                'deskripsi' => 'Tempat tidur, kasur, dan set kamar tidur lengkap dengan berbagai ukuran',
            ],
            [
                'nama_categories' => 'Dekorasi',
                'deskripsi' => 'Lampu, cermin, vas, dan aksesoris dekorasi lainnya untuk mempercantik rumah',
            ],
            [
                'nama_categories' => 'Aksesoris',
                'deskripsi' => 'Bantal, selimut, karpet, dan aksesoris furniture lainnya',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
