<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EkaristiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminEkaristiController extends Controller
{
    public function index()
    {
        $ekaristi = EkaristiModel::all();
        return view('admin.pages.ekaristi.index', compact('ekaristi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perayaan' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:10240', 
        ]);

        try {
            $ekaristi = EkaristiModel::create([
                'nama_perayaan' => $request->nama_perayaan,
                'ket_perayaan' => $request->ket_perayaan,
                'tanggal' => $request->tipe_tanggal === 'tunggal' ? $request->tanggal : null,
                'tanggal_mulai' => $request->tipe_tanggal === 'rentang' ? $request->tanggal_mulai : null,
                'tanggal_akhir' => $request->tipe_tanggal === 'rentang' ? $request->tanggal_akhir : null,
                'is_publish' => $request->is_publish ?? 0,
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $namaFile = 'dokumen-ekaristi-' . $ekaristi->id . '.pdf';

                $file->storeAs('public/EkaristiFile', $namaFile);

                $ekaristi->update([
                    'file' => $namaFile
                ]);
            }

            Alert::success('Berhasil', 'Data ekaristi berhasil disimpan');
            return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perayaan' => 'sometimes|required|string',
            'ket_perayaan'  => 'sometimes|nullable|string',

            'tipe_tanggal' => 'required|in:tunggal,rentang',

            'tanggal'       => 'sometimes|required_if:tipe_tanggal,tunggal|date',
            'tanggal_mulai' => 'sometimes|required_if:tipe_tanggal,rentang|date',
            'tanggal_akhir' => 'sometimes|required_if:tipe_tanggal,rentang|date|after_or_equal:tanggal_mulai',

            'is_publish'    => 'sometimes|boolean',

            'file'          => 'sometimes|file|mimes:pdf|max:10240',
        ]);

        $data = EkaristiModel::findOrFail($id);

        try {
            $updateData = [];

            if ($request->has('nama_perayaan')) {
                $updateData['nama_perayaan'] = $request->nama_perayaan;
            }

            if ($request->has('ket_perayaan')) {
                $updateData['ket_perayaan'] = $request->ket_perayaan;
            }

           if ($request->tipe_tanggal === 'tunggal') {
                $updateData['tanggal'] = $request->tanggal;
                $updateData['tanggal_mulai'] = null;
                $updateData['tanggal_akhir'] = null;

            } else {

                $updateData['tanggal'] = null;
                $updateData['tanggal_mulai'] = $request->tanggal_mulai;
                $updateData['tanggal_akhir'] = $request->tanggal_akhir;

            }

            if ($request->has('is_publish')) {
                $updateData['is_publish'] = $request->is_publish ?? 0;
            }

            if (!empty($updateData)) {
                $data->update($updateData);
            }

            if ($request->hasFile('file')) {

                if (
                    $data->file &&
                    Storage::exists('public/EkaristiFile/' . $data->file)
                ) {
                    Storage::delete('public/EkaristiFile/' . $data->file);
                }

                $file = $request->file('file');
                $namaFile = 'dokumen-ekaristi-' . $data->id . '.pdf';

                $file->storeAs('public/EkaristiFile', $namaFile);

                $data->update([
                    'file' => $namaFile
                ]);
            }

            Alert::success('Berhasil', 'Data berhasil diperbarui');
            return back();

        } catch (\Exception $e) {

            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = EkaristiModel::findOrFail($id);

            if ($data->file && Storage::exists('public/EkaristiFile/' . $data->file)) {
                Storage::delete('public/EkaristiFile/' . $data->file);
            }

            $data->delete();

            Alert::success('Berhasil', 'Data berhasil dihapus');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return back();
        }
    }

    public function download($id)
    {
        $data = EkaristiModel::findOrFail($id);

        $path = storage_path('app/public/EkaristiFile/' . $data->file);
        $size = filesize($path);

        $nama = 'dokumen-ekaristi-' .
            str_replace(' ', '-', strtolower($data->nama_perayaan)) .
            ' (' . round($size / 1024 / 1024, 2) . ' MB).pdf';

        return response()->download($path, $nama);
    }

}
