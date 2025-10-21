<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_orders');
            $table->foreignId('id_users')->constrained('users', 'id_users');
            $table->decimal('total_harga', 12, 2);
            $table->enum('metode_bayar', ['COD', 'Virtual Account']);
            $table->enum('status', ['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan']);
            $table->string('alamat_kirim', 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
