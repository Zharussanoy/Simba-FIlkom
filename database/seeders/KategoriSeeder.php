<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('kategori_barang')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('kategori_barang')->insert([
            ['nama' => 'Elektronik',          'slug' => 'elektronik',         'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kendaraan',           'slug' => 'kendaraan',          'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dokumen',             'slug' => 'dokumen',            'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pakaian & Aksesori',  'slug' => 'pakaian-aksesori',   'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Tas & Dompet',        'slug' => 'tas-dompet',         'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Alat Tulis',          'slug' => 'alat-tulis',         'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Buku & Modul',        'slug' => 'buku-modul',         'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kartu & Identitas',   'slug' => 'kartu-identitas',    'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Perhiasan & Aksesori','slug' => 'perhiasan-aksesori', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Lainnya',             'slug' => 'lainnya',            'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}