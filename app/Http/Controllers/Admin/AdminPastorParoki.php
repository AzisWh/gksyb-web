<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PastorModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPastorParoki extends Controller
{
    public function index()
    {
        $data = PastorModel::all();
        return view('admin.pages.paroki.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pastor' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'status' => 'required|boolean',
            'foto_pastor' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try{
            if ($request->hasFile('foto_pastor')) {
                $file = $request->file('foto_pastor');
                $namaFile = 'foto-pastor-' . $request->nama_pastor . '.png';

                $file->storeAs('public/FotoPastor', $namaFile);
            }
            PastorModel::create([
                'nama_pastor' => $request->nama_pastor,
                'jabatan' => $request->jabatan,
                'status' => $request->status,
                'foto_pastor' => $namaFile,
            ]);
            Alert::success('Berhasil', 'Data pastor paroki berhasil disimpan.');
            return redirect()->route('admin.paroki.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->route('admin.paroki.index');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pastor' => 'sometimes|required|string|max:255',
            'jabatan' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|boolean',
            'foto_pastor' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try{
            $pastor = PastorModel::findOrFail($id);

            if ($request->hasFile('foto_pastor')) {
                $file = $request->file('foto_pastor');
                $namaFile = 'foto-pastor-' . $request->nama_pastor . '.png';

                $file->storeAs('public/FotoPastor', $namaFile);

                $pastor->foto_pastor = $namaFile;
            }

            $pastor->nama_pastor = $request->nama_pastor ?? $pastor->nama_pastor;
            $pastor->jabatan = $request->jabatan ?? $pastor->jabatan;
            $pastor->status = $request->status ?? $pastor->status;

            $pastor->save();

            Alert::success('Berhasil', 'Data pastor paroki berhasil diperbarui.');
            return redirect()->route('admin.paroki.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
            return redirect()->route('admin.paroki.index');
        }
    }

    public function destroy($id)
    {
        try{
            $pastor = PastorModel::findOrFail($id);
            $pastor->delete();

            Alert::success('Berhasil', 'Data pastor paroki berhasil dihapus.');
            return redirect()->route('admin.paroki.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
            return redirect()->route('admin.paroki.index');
        }
    }   
}
