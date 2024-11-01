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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->date('tanggal'); // Kolom tanggal
            $table->time('jam_in'); // Kolom jam masuk
            $table->time('jam_out'); // Kolom jam keluar
            $table->foreignId('id_produks')->constrained('produks'); // Kolom ID produk yang terhubung dengan tabel produks
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
