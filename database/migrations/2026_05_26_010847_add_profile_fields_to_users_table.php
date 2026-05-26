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
            $table->string('nim')->nullable()->after('name');
            $table->string('nomor_kontak')->nullable()->after('nim');
            $table->string('fakultas')->nullable()->after('nomor_kontak');
            $table->string('prodi')->nullable()->after('fakultas');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nim', 'nomor_kontak', 'fakultas', 'prodi']);
        });
    }
};
