<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        $data = GalleryModel::first();
        return view('admin.pages.gallery.index', compact('data'));
    }

    public function store(Request $request)
    {
        try{
            $data = $request->only([
                'url',
            ]);

            $gallery = GalleryModel::first();

            if ($gallery) {
                $gallery->update($data);
            } else {
                GalleryModel::create($data);
            }
        

            Alert::success('Berhasil', 'Data berhasil disimpan.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data.' . $e->getMessage());
            return redirect()->back();
        }
    }
}
