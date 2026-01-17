<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SakramenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSakramenController extends Controller
{
    public function index()
    {
        $sakramen = SakramenModel::limit(7)->get();
        return view('admin.pages.sakramen.index', compact('sakramen'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul_sakramen' => 'required|string|max:255',
                'deskripsi_singkat' => 'required|string|max:255',
                'deskripsi_lengkap' => 'nullable|string',
                'icon_sakramen' => 'nullable|image|max:2048',
                'slides' => 'nullable|array|max:5',
                'slides.*.caption' => 'nullable|string|max:255',
                'slides.*.file' => 'nullable|image|max:2048'
            ]);

            $iconPath = null;
            if ($request->hasFile('icon_sakramen')) {
                $iconPath = $request->file('icon_sakramen')->store('IconSakramen', 'public');
            }

            $slideArray = [];
            if ($request->slides) {
                foreach ($request->slides as $slide) {
                    $filePath = $slide['file']->store('GambarSakramen', 'public');

                    $slideArray[] = [
                        'caption' => $slide['caption'],
                        'file' => $filePath
                    ];
                }
            }

            SakramenModel::create([
                'icon_sakramen' => $iconPath,
                'judul_sakramen' => $request->judul_sakramen,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi_lengkap' => $request->deskripsi_lengkap,
                'gambar_slide' => json_encode($slideArray)
            ]);

            Alert::success('Berhasil', 'Sakramen berhasil ditambahkan');
            return back();

        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $sakramen = SakramenModel::findOrFail($id);

            $request->validate([
                'judul_sakramen' => 'sometimes|string|max:255',
                'deskripsi_singkat' => 'sometimes|string|max:255',
                'deskripsi_lengkap' => 'nullable|string',
                'icon_sakramen' => 'nullable|image|max:2048',
                'slides' => 'nullable|array|max:5',
                'slides.*.caption' => 'nullable|string|max:255',
                'slides.*.file' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('icon_sakramen')) {

                if ($sakramen->icon_sakramen) {
                    Storage::disk('public')->delete($sakramen->icon_sakramen);
                }

                $iconPath = $request->file('icon_sakramen')->store('IconSakramen', 'public');
                $sakramen->icon_sakramen = $iconPath;
            }

            // $slides = $sakramen->gambar_slide ?? [];
            $slides = json_decode($sakramen->gambar_slide ?? '[]', true);
            if ($request->slides) {
                foreach ($request->slides as $slide) {
                    if (!isset($slide['file'])) continue;
                    $filePath = $slide['file']->store('GambarSakramen', 'public');

                    $slides[] = [
                        'caption' => $slide['caption'],
                        'file' => $filePath
                    ];
                }
            }

            $sakramen->update([
                'judul_sakramen' => $request->judul_sakramen,
                'deskripsi_singkat' => $request->deskripsi_singkat,
                'deskripsi_lengkap' => $request->deskripsi_lengkap,
                'gambar_slide' => json_encode($slides)
            ]);

            Alert::success('Berhasil', 'Data sakramen berhasil diperbarui');
            return back();

        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $sakramen = SakramenModel::findOrFail($id);

            if ($sakramen->icon_sakramen) {
                Storage::disk('public')->delete($sakramen->icon_sakramen);
            }

            if ($sakramen->gambar_slide) {
                foreach (json_decode($sakramen->gambar_slide, true) as $g) {
                    Storage::disk('public')->delete($g['file']);
                }
            }

            $sakramen->delete();

            Alert::success('Dihapus', 'Sakramen berhasil dihapus');
            return back();

        } catch (\Throwable $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
