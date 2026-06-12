<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KlaimBarang extends Model
{
    protected $table = 'klaim_barang';

    protected $fillable = [
        'barang_temuan_id',
        'user_id',
        'bukti_kepemilikan',
        'foto_bukti',
        'status',
        'catatan_security',
    ];

    public function barang()
    {
        return $this->belongsTo(BarangTemuan::class, 'barang_temuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}