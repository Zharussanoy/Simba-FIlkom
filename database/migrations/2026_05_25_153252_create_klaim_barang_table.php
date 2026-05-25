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
        Schema::create('klaim_barang', function (Blueprint $table) {

            $table->id();

            // Relasi ke barang temuan
            $table->foreignId('barang_temuan_id')
                ->constrained('barang_temuan')
                ->onDelete('cascade');

            // Relasi ke user yang klaim
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Bukti kepemilikan
            $table->text('bukti_kepemilikan');

            // Upload foto bukti
            $table->string('foto_bukti')->nullable();

            // Status klaim
            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak'
            ])->default('menunggu');

            // Catatan dari security
            $table->text('catatan_security')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klaim_barang');
    }
};