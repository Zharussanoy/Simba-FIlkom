<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $aktivitas = collect();

        $laporanHilang = \App\Models\LaporanHilang::where('user_id', $user->id)
            ->latest()->take(5)->get();

        foreach ($laporanHilang as $l) {
            $aktivitas->push([
                'aksi'   => 'Melaporkan barang hilang',
                'nama'   => $l->judul,
                'waktu'  => \Carbon\Carbon::parse($l->created_at)->format('Y-m-d H:i'),
                'status' => match($l->status) {
                    'ditemukan' => 'Selesai',
                    'menunggu'  => 'Pending',
                    default     => ucfirst($l->status),
                },
            ]);
        }

        $klaim = \App\Models\BarangTemuan::where('diklaim_oleh', $user->id)
            ->latest()->take(5)->get();

        foreach ($klaim as $k) {
            $aktivitas->push([
                'aksi'   => 'Mengklaim barang',
                'nama'   => $k->nama_barang,
                'waktu'  => \Carbon\Carbon::parse($k->updated_at)->format('Y-m-d H:i'),
                'status' => match($k->status) {
                    'diklaim'             => 'Selesai',
                    'menunggu_verifikasi' => 'Pending',
                    default               => ucfirst($k->status),
                },
            ]);
        }

        $aktivitas = $aktivitas->sortByDesc('waktu')->take(5)->values();

        return view('profile.index', [
            'user'           => $user,
            'totalLaporan'   => \App\Models\LaporanHilang::where('user_id', $user->id)->count(),
            'totalDitemukan' => \App\Models\LaporanHilang::where('user_id', $user->id)->where('status', 'ditemukan')->count(),
            'totalPending'   => \App\Models\LaporanHilang::where('user_id', $user->id)->where('status', 'menunggu')->count(),
            'aktivitas'      => $aktivitas,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'nim'          => 'nullable|string|max:20',
            'nomor_kontak' => 'nullable|string|max:20',
            'fakultas'     => 'nullable|string|max:255',
            'prodi'        => 'nullable|string|max:255',
        ]);

        auth()->user()->update($request->only([
            'name', 'nim', 'nomor_kontak', 'fakultas', 'prodi'
        ]));

        return redirect()->route('profile.index')
                         ->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        auth()->logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}