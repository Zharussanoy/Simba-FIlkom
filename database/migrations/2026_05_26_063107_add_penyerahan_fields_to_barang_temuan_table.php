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
        Schema::table('barang_temuan', function (Blueprint $table) {
            $table->string('petugas_penyerah')->nullable()->after('diklaim_oleh');
            $table->string('foto_penyerahan')->nullable()->after('petugas_penyerah');
            $table->timestamp('tanggal_diserahkan')->nullable()->after('foto_penyerahan');
        });
    }

    public function down(): void
    {
        Schema::table('barang_temuan', function (Blueprint $table) {
            $table->dropColumn(['petugas_penyerah', 'foto_penyerahan', 'tanggal_diserahkan']);
        });
    }
};
