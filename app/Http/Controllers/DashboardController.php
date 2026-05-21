<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;
use App\Models\LaporanHilang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = BarangTemuan::count();
        $totalLaporan = LaporanHilang::count();

        $barangsTerbaru = BarangTemuan::latest()->take(5)->get();
        $laporanTerbaru = LaporanHilang::latest()->take(5)->get();

        return view('pages.mahasiswa.dashboard', compact(
            'totalBarang',
            'totalLaporan',
            'barangsTerbaru',
            'laporanTerbaru'
        ));
    }
}