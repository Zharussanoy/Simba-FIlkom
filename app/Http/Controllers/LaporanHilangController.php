<?php

namespace App\Http\Controllers;

use App\Models\LaporanHilang;
use App\Models\KategoriBarang;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LaporanHilangController extends Controller
{
    public function create()
    {
        return view('laporan.create', [
            'kategoris' => KategoriBarang::all(),
            'lokasis'   => Lokasi::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor'    => 'required|string|max:255',
            'nim'             => 'required|string|max:20',
            'nomor_kontak'    => 'required|string|max:20',
            'judul'           => 'required|string|max:255',
            'kategori_id'     => 'required|exists:kategori_barang,id',
            'lokasi_id'       => 'required|exists:lokasi,id',
            'tanggal_hilang'  => 'required|date|before_or_equal:today',
            'waktu_perkiraan' => 'required',
            'deskripsi'       => 'nullable|string',
            'foto'            => 'required|image|max:5120',
        ]);

        $foto = $request->file('foto')->store('laporan', 'public');

        LaporanHilang::create([
            'user_id'        => auth()->id(),
            'judul'          => $request->judul,
            'deskripsi'      => $request->deskripsi,
            'kategori_id'    => $request->kategori_id,
            'lokasi_id'      => $request->lokasi_id,
            'tanggal_hilang' => $request->tanggal_hilang,
            'foto'           => $foto,
            'status'         => 'menunggu',
        ]);

        return redirect()->route('dashboard')
                         ->with('success', 'Laporan berhasil dikirim! Kami akan segera memprosesnya.');
    }

    public function show($id)
    {
        $laporan = LaporanHilang::with(['kategori', 'lokasi'])->findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }
}