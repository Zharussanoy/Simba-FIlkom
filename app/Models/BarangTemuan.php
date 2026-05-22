<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangTemuan extends Model
{
    protected $table = 'barang_temuan';

    protected $fillable = [
        'user_id', 'nama_barang', 'deskripsi',
        'kategori_id', 'lokasi_id', 'foto',
        'status', 'diklaim_oleh',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function pemilikKlaim()
    {
        return $this->belongsTo(User::class, 'diklaim_oleh');
    }
}