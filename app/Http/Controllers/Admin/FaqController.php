<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqModel;
use App\Models\KategoriFaqModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    public function index()
    {
        $raw = FaqModel::with('kategoriFaq')->get();
        $data = $raw->groupBy(function ($item) {
            return $item->kategoriFaq->nama_kategori ?? 'Tanpa Kategori';
        });
        $kategori = KategoriFaqModel::all();
        return view('admin.pages.faq.index', compact('data', 'kategori'));
    }

    public function storeKategori(Request $request)
    {
        try{
            $request->validate([
                'nama_kategori' => 'required|string|max:255',
            ]);

            KategoriFaqModel::create([
                'nama_kategori' => $request->nama_kategori,
            ]);

            Alert::success('Berhasil', 'Kategori FAQ berhasil disimpan.');
            return redirect()->route('admin.faq.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan kategori: ' . $e->getMessage());
            return redirect()->route('admin.faq.index');
        }
    }

    public function updateKategori(Request $request, $id)
    {
        try{
            $request->validate([
                'nama_kategori' => 'required|string|max:255',
            ]);

            $kategori = KategoriFaqModel::findOrFail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
            ]);

            Alert::success('Berhasil', 'Kategori FAQ berhasil diperbarui.');
            return redirect()->route('admin.faq.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui kategori: ' . $e->getMessage());
            return redirect()->route('admin.faq.index');
        }
    }

    public function destroyKategori($id)
    {
        try{
            $kategori = KategoriFaqModel::findOrFail($id);
            $kategori->delete();

            Alert::success('Berhasil', 'Kategori FAQ berhasil dihapus.');
            return redirect()->route('admin.faq.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus kategori: ' . $e->getMessage());
            return redirect()->route('admin.faq.index');
        }
    }

    public function storeFaq(Request $request)
    {
        try{
            $request->validate([
                'kategori_faq_id' => 'required|exists:kategori_faq,id',
                'pertanyaan' => 'required|string',
                'jawaban' => 'required|string',
                'is_active' => 'required|boolean',
            ]);

            FaqModel::create([
                'kategori_faq_id' => $request->kategori_faq_id,
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'is_active' => $request->is_active,
            ]);

            Alert::success('Berhasil', 'FAQ berhasil disimpan.');
            return redirect()->route('admin.faq.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan FAQ: ' . $e->getMessage());
            return redirect()->route('admin.faq.index');
        }
    }

    public function updateFaq(Request $request, $id)
    {
        try{
            $request->validate([
                'kategori_faq_id' => 'nullable|exists:kategori_faq,id',
                'pertanyaan' => 'nullable|string',
                'jawaban' => 'nullable|string',
                'is_active' => 'nullable|boolean',
            ]);

            $faq = FaqModel::findOrFail($id);
            $faq->update([
                'kategori_faq_id' => $request->kategori_faq_id ?? $faq->kategori_faq_id,
                'pertanyaan'      => $request->pertanyaan ?? $faq->pertanyaan,
                'jawaban'         => $request->jawaban ?? $faq->jawaban,
                'is_active'       => $request->is_active ?? $faq->is_active,
            ]);

            Alert::success('Berhasil', 'FAQ berhasil diperbarui.');
            return redirect()->route('admin.faq.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui FAQ: ' . $e->getMessage());
            return redirect()->route('admin.faq.index');
        }
    }

    public function destroyFaq($id)
    {
        try{
            $faq = FaqModel::findOrFail($id);
            $faq->delete();

            Alert::success('Berhasil', 'FAQ berhasil dihapus.');
            return redirect()->route('admin.faq.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus FAQ: ' . $e->getMessage());
            return redirect()->route('admin.faq.index');
        }
    }
}
