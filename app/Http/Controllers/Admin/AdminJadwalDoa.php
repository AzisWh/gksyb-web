<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalDoa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJadwalDoa extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_jadwal' => 'required',
            'kategori_jadwal_id' => 'required',
            'hari' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
        ]);

        try {

            JadwalDoa::create([
                'nama_jadwal' => $request->nama_jadwal,
                'kategori_jadwal_id' => $request->kategori_jadwal_id,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->keterangan,
                'is_active' => $request->is_active ?? 1
            ]);

            Alert::success('Berhasil','Jadwal doa berhasil ditambahkan');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal','Error: '.$e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jadwal' => 'sometimes|required',
            'kategori_jadwal_id' => 'sometimes|required',
            'hari' => 'sometimes|required',
            'waktu' => 'sometimes|required',
            'lokasi' => 'sometimes|required',
            'is_active' => 'sometimes|boolean',
        ]);

        try {
            $data = JadwalDoa::findOrFail($id);

            $updateData = $request->only([
                'nama_jadwal',
                'kategori_jadwal_id', 
                'hari',
                'waktu',
                'lokasi',
                'keterangan',
            ]);

            if ($request->has('is_active')) {
                $updateData['is_active'] = $request->is_active;
            }

            $data->update($updateData);

            Alert::success('Berhasil','Jadwal diperbarui');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal',$e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {

            JadwalDoa::findOrFail($id)->delete();

            Alert::success('Berhasil','Jadwal dihapus');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal',$e->getMessage());
            return back();
        }
    }
}
