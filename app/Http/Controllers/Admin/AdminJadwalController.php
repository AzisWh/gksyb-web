<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalDoa;
use App\Models\KategoriJadwal;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    public function index(Request $request)
    {
        $kategori = KategoriJadwal::all();
         $jadwal = JadwalDoa::with('kategoriJadwal')
        ->when($request->kategori, function($q) use ($request){
            $q->where('kategori_jadwal_id', $request->kategori);
        })
        ->when($request->status !== null, function($q) use ($request){
            $q->where('is_active', $request->status);
        })->get();
        return view('admin.pages.jadwal.index', compact('kategori', 'jadwal'));
    }
}
