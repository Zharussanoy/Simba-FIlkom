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

    public function klaim($id)
    {
        $barang = BarangTemuan::findOrFail($id);

        if ($barang->status !== 'tersedia') {
            return back()->with('error', 'Barang sudah tidak tersedia untuk diklaim.');
        }

        $barang->update([
            'status'      => 'diklaim',
            'diklaim_oleh' => auth()->id(),
        ]);

        return back()->with('success', 'Berhasil mengklaim barang!');
    }
}