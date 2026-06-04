<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;
use App\Models\LaporanHilang;
use App\Models\KategoriBarang;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index(Request $request)
{
    $tab = $request->get('tab', 'laporan');

    $laporans = LaporanHilang::with(['user', 'kategori', 'lokasi'])->latest()->get();

    $laporanJson = $laporans->map(function($l) {
        return [
            'id'             => $l->id,
            'judul'          => $l->judul,
            'kategori'       => $l->kategori->nama ?? '-',
            'deskripsi'      => $l->deskripsi ?? '-',
            'status'         => $l->status,
            'pelapor'        => $l->user->name ?? '-',
            'nim'            => $l->user->nim ?? '-',
            'kontak'         => $l->user->nomor_kontak ?? '-',
            'lokasi'         => $l->lokasi->nama ?? '-',
            'tanggal_hilang' => $l->tanggal_hilang,
            'created_at'     => $l->created_at->format('Y-m-d H:i'),
            'foto'           => $l->foto ? \Storage::url($l->foto) : null,
        ];
    });

    return view('security.dashboard', [
        'tab'          => $tab,
        'totalLaporan' => LaporanHilang::where('status', 'menunggu')->count(),
        'totalKlaim'   => BarangTemuan::where('status', 'menunggu_verifikasi')->count(),
        'totalBarang'  => BarangTemuan::where('status', 'tersedia')->count(),
        'totalKembali' => BarangTemuan::where('status', 'diklaim')
                              ->whereMonth('updated_at', now()->month)->count(),
        'laporans'     => $laporans,
        'laporanJson'  => $laporanJson,
        'barangs'      => BarangTemuan::with(['kategori', 'lokasi', 'user'])->latest()->get(),
        'klaimPending' => BarangTemuan::with(['kategori', 'lokasi', 'pemilikKlaim'])
                              ->where('status', 'menunggu_verifikasi')->latest()->get(),
        'kategoris'    => KategoriBarang::all(),
        'lokasis'      => Lokasi::all(),
    ]);
}

    public function storeBarang(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'kategori_id' => 'required|exists:kategori_barang,id',
            'lokasi_id'   => 'required|exists:lokasi,id',
            'foto'        => 'nullable|image|max:5120',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('barang', 'public');
        }

        BarangTemuan::create([
            'user_id'     => auth()->id(),
            'nama_barang' => $request->nama_barang,
            'deskripsi'   => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'lokasi_id'   => $request->lokasi_id,
            'foto'        => $foto,
            'status'      => 'tersedia',
        ]);

        return redirect()->route('security.dashboard', ['tab' => 'barang'])
                         ->with('success', 'Barang temuan berhasil ditambahkan!');
    }

    public function setujuiKlaim(Request $request, $id)
    {
        $request->validate([
            'petugas_penyerah' => 'required|string|max:255',
            'foto_penyerahan'  => 'nullable|image|max:5120',
        ]);

        $barang = BarangTemuan::findOrFail($id);

        $foto = null;
        if ($request->hasFile('foto_penyerahan')) {
            $foto = $request->file('foto_penyerahan')->store('penyerahan', 'public');
        }

        $barang->update([
            'status'             => 'diklaim',
            'petugas_penyerah'   => $request->petugas_penyerah,
            'foto_penyerahan'    => $foto,
            'tanggal_diserahkan' => now(),
        ]);

        return redirect()->route('security.dashboard', ['tab' => 'verifikasi'])
                        ->with('success', 'Klaim berhasil disetujui dan barang telah diserahkan!');
    }

    public function tolakKlaim($id)
    {
        $barang = BarangTemuan::findOrFail($id);
        $barang->update([
            'status'       => 'tersedia',
            'diklaim_oleh' => null,
        ]);

        return redirect()->route('security.dashboard', ['tab' => 'verifikasi'])
                         ->with('error', 'Klaim ditolak, barang kembali tersedia.');
    }
}