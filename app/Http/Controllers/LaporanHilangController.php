<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanHilang;

class LaporanHilangController extends Controller
{
    public function create()
    {
        return view('pages.mahasiswa.laporan-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        LaporanHilang::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard');
    }
}