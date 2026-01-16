<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalDoa;
use App\Models\KategoriJadwal;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    public function index()
    {
        $kategori = KategoriJadwal::all();
        $jadwal = JadwalDoa::with('kategori')->get();
        return view('admin.pages.jadwal.index', compact('kategori', 'jadwal'));
    }
}
