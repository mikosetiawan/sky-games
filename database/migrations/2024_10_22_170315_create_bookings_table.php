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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('jadwal_in_id');
            $table->unsignedBigInteger('jadwal_out_id');
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->string('metode_pembayaran');
            $table->string('status')->default('pending');
            $table->decimal('total_amount', 10, 2); // Menambahkan total amount
            $table->string('order_id')->nullable(); // Menambahkan order_id untuk Midtrans
            $table->string('snap_token')->nullable(); // Menambahkan snap_token untuk Midtrans
            $table->timestamps();

            // Foreign keys
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('jadwal_in_id')->references('id')->on('jadwals')->onDelete('cascade');
            $table->foreign('jadwal_out_id')->references('id')->on('jadwals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};