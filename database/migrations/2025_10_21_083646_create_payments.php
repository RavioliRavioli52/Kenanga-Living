<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payments');
            $table->foreignId('id_orders')->constrained('orders', 'id_orders');
            $table->foreignId('id_users')->constrained('users', 'id_users');
            $table->enum('metode_bayar', ['COD', 'Virtual Account']);
            $table->enum('status_bayar', ['belum dibayar', 'sudah dibayar']);
            $table->dateTime('tanggal_bayar')->nullable();
            $table->string('kode_va', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
