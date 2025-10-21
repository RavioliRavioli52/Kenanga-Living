<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_products');
            $table->foreignId('id_categories')->constrained('categories', 'id_categories');
            $table->string('nama_products', 100);
            $table->string('deskripsi_products', 255)->nullable();
            $table->decimal('harga', 12, 2);
            $table->integer('stok')->nullable();
            $table->string('gambar', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
