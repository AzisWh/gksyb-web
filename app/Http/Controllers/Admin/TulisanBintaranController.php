<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBintaranModel;
use App\Models\TulisanBintaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TulisanBintaranController extends Controller
{
    public function index()
    {
        $kategori = KategoriBintaranModel::all();
        $tulisan = TulisanBintaranModel::with('kategoriBintaran')->get();
        return view('admin.pages.bintaran.index', compact('kategori', 'tulisan'));
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        try{
            KategoriBintaranModel::create([
                'nama_kategori' => $request->nama_kategori,
                'slug' => $request->slug,
            ]);

            Alert::success('Berhasil', 'Kategori berhasil disimpan.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan kategori.');
            return redirect()->back();
        }
    }

    public function updateKategori(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'sometimes|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        try{
            $kategori = KategoriBintaranModel::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'slug' => $request->slug,
            ]);

            Alert::success('Berhasil', 'Kategori berhasil diperbarui.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui kategori.');
            return redirect()->back();
        }
    }

    public function deleteKategori($id)
    {
        try{
            $kategori = KategoriBintaranModel::findOrFail($id);
            $kategori->delete();

            Alert::success('Berhasil', 'Kategori berhasil dihapus.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus kategori.');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul_tulisan' => 'required|string|max:255',
                'kategori_bintaran_id' => 'required',
                'konten' => 'required|string|max:500',
                'image' => 'nullable|image|max:2048',
                'ringkasan' => 'required|string|max:255',
            ]);

            $tulisan = TulisanBintaranModel::create([
                'judul_tulisan' => $request->judul_tulisan,
                'kategori_bintaran_id' => $request->kategori_bintaran_id,
                'ringkasan' => $request->ringkasan,
                'konten' => $request->konten,
                'is_published' => $request->is_published ? 1 : 0
            ]);

            if ($request->hasFile('image')) {

                $ext = $request->file('image')->getClientOriginalExtension();

                $fileName = 'foto-bintaran-' . $tulisan->id . '.' . $ext;

                $path = $request->file('image')
                        ->storeAs('public/BintaranImage', $fileName);

                $tulisan->update([
                    'image' => $fileName
                ]);
            }

            Alert::success('Berhasil', 'Tulisan berhasil ditambahkan');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul_tulisan' => 'sometimes',
                'kategori_bintaran_id' => 'sometimes|exists:kategori_bintaran,id',
                'ringkasan' => 'sometimes|string|max:255',
                'konten' => 'sometimes|string|max:500',
            ]);

            $tulisan = TulisanBintaranModel::findOrFail($id);

            $tulisan->update([
                'judul_tulisan' => $request->judul_tulisan,
                'kategori_bintaran_id' => $request->kategori_bintaran_id,
                'ringkasan' => $request->ringkasan,
                'konten' => $request->konten,
                'is_published' => $request->is_published ? 1 : 0
            ]);

            if ($request->hasFile('image')) {

                if ($tulisan->image && 
                    Storage::exists('public/BintaranImage/' . $tulisan->image)) {

                    Storage::delete('public/BintaranImage/' . $tulisan->image);
                }

                $ext = $request->file('image')->getClientOriginalExtension();

                $fileName = 'foto-bintaran-' . $tulisan->id . '.' . $ext;

                $request->file('image')
                    ->storeAs('public/BintaranImage', $fileName);

                $tulisan->update([
                    'image' => $fileName
                ]);
            }

            Alert::success('Berhasil', 'Tulisan berhasil diupdate');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $tulisan = TulisanBintaranModel::findOrFail($id);

            if ($tulisan->image &&
                Storage::exists('public/BintaranImage/' . $tulisan->image)) {

                Storage::delete('public/BintaranImage/' . $tulisan->image);
            }

            $tulisan->delete();

            Alert::success('Berhasil', 'Tulisan berhasil dihapus');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }
}
