<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanHilang extends Model
{
    protected $table = 'laporan_hilang';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'kategori_id',
        'lokasi_id',
        'tanggal_hilang',
        'foto',
        'status',
        'barang_temuan_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function barangTemuan()
    {
        return $this->belongsTo(BarangTemuan::class, 'barang_temuan_id');
    }
}