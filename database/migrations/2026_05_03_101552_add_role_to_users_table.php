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
    Schema::table('users', function (Blueprint $table) {
        // 1. Tambahkan kolom Role (Pilihannya: admin atau anggota)
        $table->string('role')->default('anggota'); 

        // 2. Tambahkan kolom untuk Kode QR unik
        $table->string('qr_token')->unique()->nullable();

        // 3. Hubungkan User dengan tabel Kelompok (Group)
        $table->foreignId('group_id')->nullable()->constrained('groups');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['role', 'qr_token', 'group_id']);
    });
}
};
