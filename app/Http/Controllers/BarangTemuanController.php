<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;
use App\Models\Lokasi;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangTemuanController extends Controller
{
    public function index(Request $request)
    {
        $query = BarangTemuan::with(['lokasi', 'kategori'])->latest();

        if ($request->search) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        if ($request->lokasi) {
            $query->where('lokasi_id', $request->lokasi);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        return view('barang.index', [
            'barangs'   => $query->paginate(10)->withQueryString(),
            'kategoris' => KategoriBarang::all(),
            'lokasis'   => Lokasi::all(),
        ]);
    }
    

    public function show($id)
    {
        $barang = BarangTemuan::with(['lokasi', 'kategori', 'user'])->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function klaim(Request $request, $id)
    {
        $barang = BarangTemuan::findOrFail($id);

        if ($barang->status !== 'tersedia') {
            return redirect()->route('barang.show', $barang->id)
                            ->with('error', 'Barang sudah tidak tersedia untuk diklaim.');
        }

        $request->validate([
            'bukti_kepemilikan' => 'required|string|min:10',
            'foto_bukti'        => 'nullable|image|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('bukti-klaim', 'public');
        }

        // Simpan ke tabel klaim_barang
        \App\Models\KlaimBarang::create([
            'barang_temuan_id'  => $barang->id,
            'user_id'           => auth()->id(),
            'bukti_kepemilikan' => $request->bukti_kepemilikan,
            'foto_bukti'        => $fotoPath,
            'status'            => 'menunggu',
        ]);

        $barang->update([
            'status'       => 'menunggu_verifikasi',
            'diklaim_oleh' => auth()->id(),
        ]);

        return redirect()->route('barang.show', $barang->id)
                        ->with('success', 'Klaim berhasil diajukan! Petugas keamanan akan memverifikasi bukti Anda.');
    }
}