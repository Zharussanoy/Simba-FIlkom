<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;
use App\Models\KlaimBarang;
use Illuminate\Http\Request;

class KlaimBarangController extends Controller
{

    public function store(Request $request, BarangTemuan $barang)
    {
        $request->validate([
            'bukti_kepemilikan' => 'required|string',
            'foto_bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')
                ->store('bukti_klaim', 'public');
        }

        KlaimBarang::create([
            'barang_temuan_id' => $barang->id,
            'user_id' => auth()->id(),
            'bukti_kepemilikan' => $request->bukti_kepemilikan,
            'foto_bukti' => $fotoPath,
            'status' => 'menunggu',
        ]);

        $barang->update([
            'status' => 'menunggu_verifikasi',
            'diklaim_oleh' => auth()->id(),
        ]);

        return back()->with(
            'success',
            'Klaim berhasil dikirim.'
        );
    }

    public function setujui(KlaimBarang $klaim)
    {
        $klaim->update([
            'status' => 'disetujui',
        ]);

        $klaim->barang->update([
            'status' => 'diklaim',
        ]);

        return back()->with(
            'success',
            'Klaim disetujui.'
        );
    }

    public function tolak(KlaimBarang $klaim)
    {
        $klaim->update([
            'status' => 'ditolak',
        ]);

        $klaim->barang->update([
            'status' => 'tersedia',
            'diklaim_oleh' => null,
        ]);

        return back()->with(
            'success',
            'Klaim ditolak.'
        );
    }
}