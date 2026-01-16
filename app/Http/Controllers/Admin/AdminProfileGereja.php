<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilGerejaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AdminProfileGereja extends Controller
{
    public function index()
    {
        $profil = ProfilGerejaModel::first();
        return view('admin.pages.gereja.index', compact('profil'));
    }

    public function store(Request $request)
    {
        
        try {

            $request->validate([
            'deskripsi' => 'required',
            'gambar_baru.*' => 'image|mimes:jpg,jpeg,png|max:2048'
            ], [
                'gambar_baru.*.image' => 'File harus berupa gambar',
                'gambar_baru.*.mimes' => 'Format hanya jpg, jpeg, png',
                'gambar_baru.*.max'   => 'Ukuran gambar maksimal 2MB'
            ]);

            $galeri = [];
            if ($request->hasFile('gambar_baru')) {
                foreach ($request->file('gambar_baru') as $index => $img) {

                    $file = $img->store('profil-gereja', 'public');

                    $galeri[] = [
                        'file' => $file,
                        'caption' => $request->keterangan_baru[$index] ?? ''
                    ];
                }
            }

            ProfilGerejaModel::create([
                'nama' => $request->nama ?? null,
                'deskripsi' => $request->deskripsi,
                'sejarah' => $request->sejarah ?? null,
                'visi' => $request->visi ?? null,
                'misi' => $request->misi ?? [],
                'alamat' => $request->alamat ?? null,
                'telepon' => $request->telepon ?? null,
                'email' => $request->email ?? null,
                'maps' => $request->maps ?? null,
                'galeri' => $galeri
            ]);

            Alert::success('Berhasil', 'Profil gereja berhasil dibuat');
            return redirect()->route('admin.gereja.index');

        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
            'gambar_baru.*' => 'image|mimes:jpg,jpeg,png|max:2048'
            ], [
                'gambar_baru.*.image' => 'File harus berupa gambar',
                'gambar_baru.*.mimes' => 'Format hanya jpg, jpeg, png',
                'gambar_baru.*.max'   => 'Ukuran gambar maksimal 2MB'
            ]);

            $profil = ProfilGerejaModel::findOrFail($id);

            $galeri = $profil->galeri ?? [];

            if ($request->keterangan_lama) {
                foreach ($galeri as $i => $g) {
                    $galeri[$i]['caption'] = $request->keterangan_lama[$i] ?? $galeri[$i]['caption'];
                }
            }

            if ($request->hasFile('gambar_baru')) {
                foreach ($request->file('gambar_baru') as $index => $img) {

                    if (count($galeri) >= 5) break;

                    $file = $img->store('profil-gereja', 'public');

                    $galeri[] = [
                        'file' => $file,
                        'caption' => $request->keterangan_baru[$index] ?? ''
                    ];
                }
            }

            $data = [];

            if ($request->has('deskripsi')) $data['deskripsi'] = $request->deskripsi;
            if ($request->has('sejarah'))   $data['sejarah']   = $request->sejarah;
            if ($request->has('visi'))      $data['visi']      = $request->visi;
            if ($request->has('misi'))      $data['misi']      = $request->misi;
            if ($request->has('alamat'))    $data['alamat']    = $request->alamat;
            if ($request->has('telepon'))   $data['telepon']   = $request->telepon;
            if ($request->has('email'))     $data['email']     = $request->email;
            if ($request->has('maps'))      $data['maps']      = $request->maps;
            $data['galeri'] = $galeri;

            $profil->update($data);

            Alert::success('Berhasil', 'Profil berhasil diperbarui');
            return redirect()->route('admin.gereja.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        $profil = ProfilGerejaModel::findOrFail($id);

        if ($profil->gambar) {
            foreach ($profil->gambar as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $profil->delete();

        return redirect()->route('admin.gereja.index')
            ->with('success', 'Profil gereja berhasil dihapus');
    }
}
