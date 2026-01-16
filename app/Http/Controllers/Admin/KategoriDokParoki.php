<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriDokParokiModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriDokParoki extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        try{
            KategoriDokParokiModel::create([
                'nama_kategori' => $request->nama_kategori,
            ]);

            Alert::success('Berhasil', 'Kategori berhasil disimpan.');
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan kategori.' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        try{
            $kategori = KategoriDokParokiModel::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
            ]);

            Alert::success('Berhasil', 'Kategori  berhasil diperbarui.');
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui kategori .' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try{
            $kategori = KategoriDokParokiModel::findOrFail($id);
            $kategori->delete();

            Alert::success('Berhasil', 'Kategori  berhasil dihapus.');
            return back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus kategori .' . $e->getMessage());
            return back();
        }
    }
}
