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
        'diklaim_oleh'
    ];

    // RELASI
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function diklaimOleh()
    {
        return $this->belongsTo(User::class, 'diklaim_oleh');
    }
}