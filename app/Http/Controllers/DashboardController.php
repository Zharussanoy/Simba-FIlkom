<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;
use App\Models\LaporanHilang;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'security') {
            return redirect()->route('security.dashboard');
        }

        $laporanSaya    = LaporanHilang::with(['kategori', 'lokasi'])
                            ->where('user_id', $user->id)->latest()->get();
        $totalLaporan   = $laporanSaya->count();
        $totalDitemukan = $laporanSaya->where('status', 'ditemukan')->count();
        $totalMenunggu  = $laporanSaya->where('status', 'menunggu')->count();

        return view('pages.mahasiswa.dashboard', compact(
            'laporanSaya',
            'totalLaporan',
            'totalDitemukan',
            'totalMenunggu'
        ));
    }
}