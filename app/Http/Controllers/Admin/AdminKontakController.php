<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JamPelayananModel;
use App\Models\KontakModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKontakController extends Controller
{
    public function store(Request $request)
    {
        try{
            KontakModel::updateOrCreate(
                ['id' => $request->id],
                $request->only('alamat','telepon','whatsapp','email')
            );
        

            Alert::success('Berhasil', 'Data kontak berhasil disimpan.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data kontak.' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function storeJam(Request $request)
    {
        JamPelayananModel::create($request->all());
        Alert::success('Berhasil', 'Jam pelayanan berhasil ditambahkan.');
        return redirect()->back();
    }

    public function updateJam(Request $request, $id)
    {
        $jam = JamPelayananModel::findOrFail($id);

        $jam->update(array_filter($request->only([
            'hari_dari','hari_sampai','jam_mulai','jam_selesai'
        ])));

        Alert::success('Berhasil', 'Jam pelayanan diperbarui.');
        return back();
    }

    public function destroyJam($id)
    {
        JamPelayananModel::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Jam pelayanan berhasil dihapus.');
        return redirect()->back();
    }
}
