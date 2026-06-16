# SIMBA-FILKOM
Sistem Informasi Barang Hilang & Temuan  
Fakultas Ilmu Komputer, Universitas Brawijaya

## Tentang Aplikasi
SIMBA adalah platform web untuk melaporkan dan menemukan barang hilang
di lingkungan FILKOM UB. Mahasiswa dapat melaporkan kehilangan barang
dan mengklaim barang yang ditemukan oleh petugas keamanan.

## Fitur
- Login berbasis role (Mahasiswa & Security)
- Katalog barang temuan dengan filter lokasi dan kategori
- Form laporan barang hilang
- Sistem klaim barang dengan bukti kepemilikan
- Verifikasi klaim oleh petugas keamanan
- Dashboard monitoring untuk security

## Teknologi
- Laravel 13
- PHP 8.4
- MySQL
- Tailwind CSS

## Cara Install

### 1. Clone repository
git clone https://github.com/Zharussanoy/Simba-FIlkom.git
cd simba-filkom

### 2. Install dependencies
composer install
npm install

### 3. Konfigurasi environment
cp .env.example .env
php artisan key:generate

### 4. Atur database di .env
DB_DATABASE=simba_db
DB_USERNAME=root
DB_PASSWORD=

### 5. Jalankan migrasi dan seeder
php artisan migrate --seed

### 6. Link storage
php artisan storage:link

### 7. Jalankan aplikasi
php artisan serve
npm run dev

## Akun Default
Setelah menjalankan seeder, akun yang tersedia:

| Role      | Email                      | Password    |
|-----------|----------------------------|-------------|
| Security  | azharus@security.simba     | password123 |
| Mahasiswa | test@student.ub.ac.id      | password123 |

## Lokasi FILKOM yang tersedia
Gedung A, Gedung F, Gedung G, Auditorium Algoritma,
GKM, Ruang Baca, Edutech, Junction, Area Parkir,
Musholla, Kantin, Perpustakaan
