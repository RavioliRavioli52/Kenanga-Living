<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_reviews');
            $table->foreignId('id_products')->constrained('products', 'id_products')->cascadeOnDelete();
            $table->foreignId('id_users')->constrained('users', 'id_users')->cascadeOnDelete();
            $table->integer('rating'); // 1-5
            $table->text('komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
