<?php

namespace App\Http\Controllers;

use App\Models\BarangTemuan;

class BarangTemuanController extends Controller
{
    public function index()
    {
        $barangs = BarangTemuan::latest()->get();

        return view('pages.mahasiswa.barang-index', compact('barangs'));
    }
}