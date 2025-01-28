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
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('guru')->onDelete('cascade');
            $table->integer('bulan'); // Bulan gaji (1-12)
            $table->integer('tahun'); // Tahun gaji
            $table->decimal('gaji_pokok', 15, 2); // Gaji pokok berdasarkan jam mengajar
            $table->decimal('potongan', 15, 2); // Potongan gaji karena absen
            $table->decimal('total_gaji', 15, 2); // Total gaji yang diterima
            $table->date('tanggal_pembayaran')->nullable(); // Tanggal pembayaran gaji
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
