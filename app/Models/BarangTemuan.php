<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangTemuan extends Model
{
    protected $table = 'barang_temuan';

    protected $fillable = [
        'user_id',
        'nama_barang',
        'deskripsi',
        'kategori_id',
        'lokasi_id',
        'foto',
        'status',
        'diklaim_oleh',
        'petugas_penyerah', 
        'foto_penyerahan', 
        'tanggal_diserahkan',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    // Barang dibuat oleh user/security
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    // Relasi kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    // User yang berhasil klaim barang
    public function pemilikKlaim()
    {
        return $this->belongsTo(User::class, 'diklaim_oleh');
    }

    // Semua riwayat klaim barang
    public function klaim()
    {
        return $this->hasMany(KlaimBarang::class, 'barang_temuan_id');
    }
}