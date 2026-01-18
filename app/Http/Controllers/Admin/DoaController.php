<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoaModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DoaController extends Controller
{
    public function index(Request $request)
    {
        $query = DoaModel::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('isi_doa', 'like', '%' . $request->search . '%');
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $data = $query->orderBy('created_at', 'desc')->get();

        $total = DoaModel::count();
        $didoakan = DoaModel::where('status', 'didoakan')->count();
        $belum = DoaModel::where('status', 'belum')->count();

        return view('admin.pages.doa.index', compact(
            'data',
            'total',
            'didoakan',
            'belum'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        try {

            $request->validate([
                'status' => 'required|in:baru,didoakan,belum',
            ]);

            $doa = DoaModel::findOrFail($id);
            $doa->status = $request->status;
            $doa->save();

            Alert::success('Berhasil', 'Status doa berhasil diperbarui');

            return redirect()->route('admin.doa.index');

        } catch (\Exception $e) {

            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());

            return redirect()->route('admin.doa.index');
        }
    }
}
