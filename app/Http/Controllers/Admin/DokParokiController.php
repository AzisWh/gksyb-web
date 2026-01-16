<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokParokiModel;
use App\Models\KategoriDokParokiModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DokParokiController extends Controller
{
    public function index(Request $request)
    {
        $kategori = KategoriDokParokiModel::all();
        $query = DokParokiModel::with('kategori');

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }
        $dokumen = $query->latest()->get();
        return view('admin.pages.dokparoki.index', compact('kategori','dokumen'));
    }

    public function download($id)
    {
        $dok = DokParokiModel::with('kategori')->findOrFail($id);

        $pdf = Pdf::loadView('admin.pages.dokparoki.components.pdf', compact('dok'))
            ->setPaper('A4');

        return $pdf->download(
            'dokumen-paroki-' . str_replace(' ', '_', strtolower($dok->judul_dokumen)) . '.pdf'
        );
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_dokumen' => 'sometimes|string|max:255',
            'kategori_id' => 'sometimes|string|max:255',
            'keterangan' => 'nullable',
            'file' => 'nullable|mimes:pdf|max:10240'
        ]);

        try {
            $dok = DokParokiModel::findOrFail($id);

            if ($request->hasFile('file')) {
                $path = storage_path('app/public/DokParoki/' . $dok->file);
                if (file_exists($path)) {
                    unlink($path);
                }

                $namaFile = 'dokumen-paroki-' . $dok->id . '.pdf';
                $request->file('file')->storeAs('public/DokParoki', $namaFile);

                $dok->file = $namaFile;
            }

            $dok->update([
                'judul_dokumen' => $request->judul_dokumen,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan
            ]);

            Alert::success('Berhasil', 'Dokumen diperbarui');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $dok = DokParokiModel::findOrFail($id);

            @unlink(storage_path('app/public/DokParoki/' . $dok->file));

            $dok->delete();

            Alert::success('Berhasil', 'Dokumen dihapus');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_dokumen' => 'required|string|max:255',
            'kategori_id' => 'required',
            'keterangan' => 'nullable|string|max:500',
            'file' => 'required|mimes:pdf|max:10240'
        ]);

        try {
            $dok = DokParokiModel::create([
                'judul_dokumen' => $request->judul_dokumen,
                'kategori_id' => $request->kategori_id,
                'keterangan' => $request->keterangan,
                'file' => '-'
            ]);
            $file = $request->file('file');
            $namaFile = 'dokumen-paroki-' . $dok->id . '.pdf';
            $file->storeAs('public/DokParoki', $namaFile);
            $dok->update([
                'file' => $namaFile
            ]);

            Alert::success('Berhasil', 'Dokumen berhasil disimpan.');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
