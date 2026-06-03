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
    Schema::create('groups', function (Blueprint $table) {
        $table->id(); // Ini bawaan: Untuk nomor urut otomatis (1, 2, 3...)
        
        // --- TAMBAHKAN DUA BARIS DI BAWAH INI ---
        $table->string('nama_desa');     // Untuk menyimpan nama desa (teks)
        $table->string('nama_kelompok'); // Untuk menyimpan nama kelompok (teks)
        // ---------------------------------------

        $table->timestamps(); // Ini bawaan: Untuk mencatat kapan data dibuat
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
