<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BarangTemuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('barang_temuan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Buat folder storage kalau belum ada
        Storage::disk('public')->makeDirectory('barang');

        $barangs = [
            [
                'nama'      => 'Kunci Motor Honda Beat',
                'deskripsi' => 'Kunci motor Honda Beat warna merah dengan gantungan kunci karakter Doraemon. Ditemukan di lantai 2 dekat Lab.',
                'kategori'  => 2, // Kendaraan
                'lokasi'    => 3, // Gedung G
                'gambar'    => 'kunci-motor.jpg',
                'status'    => 'tersedia',
                'created'   => '2026-05-03 08:00:00',
            ],
            [
                'nama'      => 'Dompet Kulit Coklat',
                'deskripsi' => 'Dompet kulit warna coklat berisi KTM dan beberapa kartu ATM.',
                'kategori'  => 5, // Tas & Dompet
                'lokasi'    => 1, // Gedung A
                'gambar'    => 'dompet.jpg',
                'status'    => 'tersedia',
                'created'   => '2026-05-02 09:00:00',
            ],
            [
                'nama'      => 'Powerbank Xiaomi 10000mAh',
                'deskripsi' => 'Powerbank Xiaomi warna hitam kapasitas 10000mAh. Ditemukan di meja baca perpustakaan.',
                'kategori'  => 1, // Elektronik
                'lokasi'    => 12, // Perpustakaan
                'gambar'    => 'powerbank.jpg',
                'status'    => 'tersedia',
                'created'   => '2026-05-01 10:00:00',
            ],
            [
                'nama'      => 'Jaket Hitam',
                'deskripsi' => 'Jaket hitam ukuran L. Ditemukan di kursi ruang tunggu.',
                'kategori'  => 4, // Pakaian
                'lokasi'    => 2, // Gedung F
                'gambar'    => 'jaket.jpg',
                'status'    => 'tersedia',
                'created'   => '2026-04-30 11:00:00',
            ],
            [
                'nama'      => 'Kacamata Hitam',
                'deskripsi' => 'Kacamata hitam frame bulat. Ditemukan di meja kantin.',
                'kategori'  => 4, 
                'lokasi'    => 11, 
                'gambar'    => 'kacamata.jpg',
                'status'    => 'tersedia',
                'created'   => '2026-04-29 12:00:00',
            ],
            [
                'nama'      => 'Botol Minum Tupperware',
                'deskripsi' => 'Botol minum Tupperware berwarna Hijau. Ditemukan di meja kantin.',
                'kategori'  => 8, 
                'lokasi'    => 11, 
                'gambar'    => 'BotolMinum.jpg',
                'status'    => 'tersedia',
                'created'   => '2026-04-28 13:00:00',
            ],
        ];

        foreach ($barangs as $b) {
            $sourcePath = database_path('seeders/images/' . $b['gambar']);
            $destPath   = 'barang/' . $b['gambar'];

            if (File::exists($sourcePath)) {
                Storage::disk('public')->put($destPath, File::get($sourcePath));
            }

            DB::table('barang_temuan')->insert([
                'user_id'     => 2, 
                'nama_barang' => $b['nama'],
                'deskripsi'   => $b['deskripsi'],
                'kategori_id' => $b['kategori'],
                'lokasi_id'   => $b['lokasi'],
                'foto'        => File::exists($sourcePath) ? $destPath : null,
                'status'      => $b['status'],
                'created_at'  => $b['created'],
                'updated_at'  => $b['created'],
            ]);
        }
    }
}