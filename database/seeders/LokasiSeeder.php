<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lokasi')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('lokasi')->insert([
            ['nama' => 'Gedung A', 'kode' => 'GDA', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gedung F', 'kode' => 'GDF', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gedung G', 'kode' => 'GDG', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Auditorium Algoritma', 'kode' => 'AUD', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'GKM', 'kode' => 'GKM', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Baca', 'kode' => 'RBC', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Edutech', 'kode' => 'EDT', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Junction', 'kode' => 'JCT', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Area Parkir', 'kode' => 'PRK', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Musholla', 'kode' => 'MSH', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kantin', 'kode' => 'KTN', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Perpustakaan', 'kode' => 'PRP', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}