<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;
use App\Models\LaporanHilang;
use App\Models\KategoriBarang;
use App\Models\KlaimBarang; 
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

        $barangs = BarangTemuan::with(['kategori', 'lokasi', 'user', 'pemilikKlaim'])->latest()->get();

        $barangData = $barangs->map(function($b) {
            return [
                'id'                => $b->id,
                'nama'              => $b->nama_barang,
                'kategori'          => $b->kategori->nama ?? '-',
                'deskripsi'         => $b->deskripsi ?? '-',
                'status'            => $b->status,
                'lokasi'            => $b->lokasi->nama ?? '-',
                'created_at'        => \Carbon\Carbon::parse($b->created_at)->format('Y-m-d H:i'),
                'foto'              => $b->foto ? \Storage::url($b->foto) : null,
                'penemu'            => $b->user->name ?? 'Petugas Keamanan',
                'diklaim_oleh'      => $b->pemilikKlaim->name ?? null,
                'kontak'            => $b->pemilikKlaim->nomor_kontak ?? null,
                'petugas_penyerah'  => $b->petugas_penyerah ?? null,
                'foto_penyerahan'   => $b->foto_penyerahan ? \Storage::url($b->foto_penyerahan) : null,
                'tanggal_diserahkan'=> $b->tanggal_diserahkan
                                        ? \Carbon\Carbon::parse($b->tanggal_diserahkan)->format('Y-m-d H:i')
                                        : null,
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
            'barangs'      => $barangs,
            'barangData'   => $barangData,
            'klaimPending' => KlaimBarang::with(['barang.kategori', 'barang.lokasi', 'user'])
                      ->where('status', 'menunggu')->latest()->get(),
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

        // Update status di tabel klaim_barang juga
        KlaimBarang::where('barang_temuan_id', $barang->id)
            ->where('status', 'menunggu')
            ->update(['status' => 'disetujui']);

        return redirect()->route('security.dashboard', ['tab' => 'verifikasi'])
                        ->with('success', 'Klaim berhasil disetujui dan barang telah diserahkan!');
    }

    public function tolakKlaim($id)
    {
        $barang = BarangTemuan::findOrFail($id);

        // Update status di tabel klaim_barang juga
        KlaimBarang::where('barang_temuan_id', $barang->id)
            ->where('status', 'menunggu')
            ->update(['status' => 'ditolak']);

        $barang->update([
            'status'       => 'tersedia',
            'diklaim_oleh' => null,
        ]);

        return redirect()->route('security.dashboard', ['tab' => 'verifikasi'])
                        ->with('error', 'Klaim ditolak, barang kembali tersedia.');
    }
}