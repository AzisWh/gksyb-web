<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriJadwal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKategoriJadwal extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'warna' => 'required|string|max:7',
        ]);

        try{
            KategoriJadwal::create([
                'nama_kategori' => $request->nama_kategori,
                'warna' => $request->warna,
            ]);

            Alert::success('Berhasil', 'Kategori jadwal berhasil disimpan.');
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan kategori jadwal.' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'warna' => 'required|string|max:7',
        ]);

        try{
            $kategori = KategoriJadwal::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'warna' => $request->warna,
            ]);

            Alert::success('Berhasil', 'Kategori jadwal berhasil diperbarui.');
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui kategori jadwal.' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try{
            $kategori = KategoriJadwal::findOrFail($id);
            $kategori->delete();

            Alert::success('Berhasil', 'Kategori jadwal berhasil dihapus.');
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus kategori jadwal.' . $e->getMessage());
            return back();
        }
    }
    
}
