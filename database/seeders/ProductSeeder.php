<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $kursi = Category::where('nama_categories', 'Kursi')->first();
        $meja = Category::where('nama_categories', 'Meja')->first();
        $sofa = Category::where('nama_categories', 'Sofa')->first();
        $lemari = Category::where('nama_categories', 'Lemari')->first();
        $rak = Category::where('nama_categories', 'Rak')->first();
        $tempatTidur = Category::where('nama_categories', 'Tempat Tidur')->first();
        $dekorasi = Category::where('nama_categories', 'Dekorasi')->first();
        $aksesoris = Category::where('nama_categories', 'Aksesoris')->first();

        $products = [
            // Kursi
            [
                'id_categories' => $kursi->id_categories,
                'nama_products' => 'Kursi Makan Modern Oak',
                'deskripsi_products' => 'Kursi makan dengan bahan kayu oak premium, desain modern dan ergonomis. Nyaman untuk digunakan dalam waktu lama.',
                'harga' => 850000,
                'stok' => 15,
                'gambar' => 'shop_01.jpg',
            ],
            [
                'id_categories' => $kursi->id_categories,
                'nama_products' => 'Kursi Kantor Ergonomic',
                'deskripsi_products' => 'Kursi kantor dengan dukungan lumbar yang dapat disesuaikan. Cocok untuk bekerja seharian dengan nyaman.',
                'harga' => 2500000,
                'stok' => 8,
                'gambar' => 'shop_02.jpg',
            ],
            [
                'id_categories' => $kursi->id_categories,
                'nama_products' => 'Kursi Rotan Natural',
                'deskripsi_products' => 'Kursi rotan dengan desain natural dan tahan lama. Cocok untuk teras atau ruang tamu dengan konsep minimalis.',
                'harga' => 650000,
                'stok' => 12,
                'gambar' => 'shop_03.jpg',
            ],

            // Meja
            [
                'id_categories' => $meja->id_categories,
                'nama_products' => 'Meja Makan Minimalis 6 Kursi',
                'deskripsi_products' => 'Meja makan dengan desain minimalis, terbuat dari kayu jati solid. Dapat menampung hingga 6 orang.',
                'harga' => 4500000,
                'stok' => 5,
                'gambar' => 'shop_04.jpg',
            ],
            [
                'id_categories' => $meja->id_categories,
                'nama_products' => 'Meja Kerja Modern',
                'deskripsi_products' => 'Meja kerja dengan laci penyimpanan dan desain modern. Cocok untuk home office atau ruang kerja.',
                'harga' => 1800000,
                'stok' => 10,
                'gambar' => 'shop_05.jpg',
            ],
            [
                'id_categories' => $meja->id_categories,
                'nama_products' => 'Meja Kopi Minimalis',
                'deskripsi_products' => 'Meja kopi kecil dengan desain minimalis, cocok untuk ruang tamu modern. Terbuat dari kayu oak dengan finishing halus.',
                'harga' => 750000,
                'stok' => 20,
                'gambar' => 'shop_06.jpg',
            ],

            // Sofa
            [
                'id_categories' => $sofa->id_categories,
                'nama_products' => 'Sofa 3 Seater Premium',
                'deskripsi_products' => 'Sofa 3 seater dengan bantal empuk dan busa berkualitas tinggi. Kain tahan lama dan mudah dibersihkan.',
                'harga' => 5500000,
                'stok' => 6,
                'gambar' => 'shop_07.jpg',
            ],
            [
                'id_categories' => $sofa->id_categories,
                'nama_products' => 'Sofa Bed Minimalis',
                'deskripsi_products' => 'Sofa yang dapat diubah menjadi tempat tidur. Praktis untuk ruang terbatas atau ruang tamu multifungsi.',
                'harga' => 4800000,
                'stok' => 4,
                'gambar' => 'shop_08.jpg',
            ],
            [
                'id_categories' => $sofa->id_categories,
                'nama_products' => 'Sofa Corner L-Shape',
                'deskripsi_products' => 'Sofa corner berbentuk L yang nyaman untuk ruang keluarga. Dapat menampung hingga 5 orang dengan nyaman.',
                'harga' => 8500000,
                'stok' => 3,
                'gambar' => 'shop_09.jpg',
            ],

            // Lemari
            [
                'id_categories' => $lemari->id_categories,
                'nama_products' => 'Lemari Pakaian 3 Pintu',
                'deskripsi_products' => 'Lemari pakaian dengan 3 pintu dan laci bawah. Ruang penyimpanan luas untuk pakaian dan barang lainnya.',
                'harga' => 3200000,
                'stok' => 7,
                'gambar' => 'feature_prod_01.jpg',
            ],
            [
                'id_categories' => $lemari->id_categories,
                'nama_products' => 'Lemari Dapur Minimalis',
                'deskripsi_products' => 'Set lemari dapur dengan desain minimalis dan modern. Terbuat dari bahan tahan air dan mudah dibersihkan.',
                'harga' => 5800000,
                'stok' => 5,
                'gambar' => 'feature_prod_02.jpg',
            ],
            [
                'id_categories' => $lemari->id_categories,
                'nama_products' => 'Lemari Buku Antik',
                'deskripsi_products' => 'Lemari buku dengan desain klasik. Cocok untuk ruang belajar atau ruang tamu yang ingin terlihat elegan.',
                'harga' => 2100000,
                'stok' => 9,
                'gambar' => 'feature_prod_03.jpg',
            ],

            // Rak
            [
                'id_categories' => $rak->id_categories,
                'nama_products' => 'Rak TV Floating Modern',
                'deskripsi_products' => 'Rak TV dengan desain floating modern. Terdapat ruang untuk TV dan perangkat elektronik lainnya.',
                'harga' => 1500000,
                'stok' => 12,
                'gambar' => 'shop_01.jpg',
            ],
            [
                'id_categories' => $rak->id_categories,
                'nama_products' => 'Rak Buku 5 Tingkat',
                'deskripsi_products' => 'Rak buku dengan 5 tingkat penyimpanan. Cocok untuk koleksi buku atau dekorasi ruang.',
                'harga' => 980000,
                'stok' => 15,
                'gambar' => 'shop_02.jpg',
            ],
            [
                'id_categories' => $rak->id_categories,
                'nama_products' => 'Rak Display Minimalis',
                'deskripsi_products' => 'Rak display dengan desain minimalis untuk memajang koleksi atau dekorasi. Terbuat dari kayu solid.',
                'harga' => 750000,
                'stok' => 18,
                'gambar' => 'shop_03.jpg',
            ],

            // Tempat Tidur
            [
                'id_categories' => $tempatTidur->id_categories,
                'nama_products' => 'Tempat Tidur King Size Premium',
                'deskripsi_products' => 'Tempat tidur king size dengan desain modern. Terdapat laci penyimpanan di bawah tempat tidur.',
                'harga' => 6800000,
                'stok' => 4,
                'gambar' => 'shop_04.jpg',
            ],
            [
                'id_categories' => $tempatTidur->id_categories,
                'nama_products' => 'Kasur Spring Bed Premium',
                'deskripsi_products' => 'Kasur spring bed dengan tingkat kenyamanan tinggi. Cocok untuk tidur yang nyenyak dan berkualitas.',
                'harga' => 4200000,
                'stok' => 8,
                'gambar' => 'shop_05.jpg',
            ],
            [
                'id_categories' => $tempatTidur->id_categories,
                'nama_products' => 'Set Kamar Tidur Minimalis',
                'deskripsi_products' => 'Set kamar tidur lengkap terdiri dari tempat tidur, meja rias, dan lemari kecil. Desain minimalis dan modern.',
                'harga' => 8500000,
                'stok' => 3,
                'gambar' => 'shop_06.jpg',
            ],

            // Dekorasi
            [
                'id_categories' => $dekorasi->id_categories,
                'nama_products' => 'Lampu Meja Modern',
                'deskripsi_products' => 'Lampu meja dengan desain modern dan pencahayaan LED yang dapat disesuaikan. Cocok untuk meja kerja atau meja samping tempat tidur.',
                'harga' => 450000,
                'stok' => 25,
                'gambar' => 'shop_07.jpg',
            ],
            [
                'id_categories' => $dekorasi->id_categories,
                'nama_products' => 'Cermin Dinding Hias',
                'deskripsi_products' => 'Cermin dinding dengan frame dekoratif. Dapat memperbesar ruang dan memberikan kesan elegan pada ruangan.',
                'harga' => 850000,
                'stok' => 15,
                'gambar' => 'shop_08.jpg',
            ],
            [
                'id_categories' => $dekorasi->id_categories,
                'nama_products' => 'Vas Dekoratif Modern',
                'deskripsi_products' => 'Vas dekoratif dengan desain modern untuk menampilkan bunga atau tanaman hias. Terbuat dari keramik berkualitas.',
                'harga' => 320000,
                'stok' => 30,
                'gambar' => 'shop_09.jpg',
            ],

            // Aksesoris
            [
                'id_categories' => $aksesoris->id_categories,
                'nama_products' => 'Bantal Sofa Premium Set',
                'deskripsi_products' => 'Set bantal sofa dengan berbagai ukuran dan warna. Bahan premium yang nyaman dan mudah dibersihkan.',
                'harga' => 550000,
                'stok' => 20,
                'gambar' => 'feature_prod_01.jpg',
            ],
            [
                'id_categories' => $aksesoris->id_categories,
                'nama_products' => 'Karpet Modern Persia',
                'deskripsi_products' => 'Karpet dengan motif modern Persia. Bahan berkualitas tinggi, lembut, dan tahan lama. Menambah kehangatan ruangan.',
                'harga' => 1850000,
                'stok' => 10,
                'gambar' => 'feature_prod_02.jpg',
            ],
            [
                'id_categories' => $aksesoris->id_categories,
                'nama_products' => 'Selimut Sofa Premium',
                'deskripsi_products' => 'Selimut sofa dengan bahan premium yang hangat dan nyaman. Cocok untuk cuaca dingin atau sebagai dekorasi.',
                'harga' => 420000,
                'stok' => 22,
                'gambar' => 'feature_prod_03.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
