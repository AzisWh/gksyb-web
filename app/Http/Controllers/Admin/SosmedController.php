<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoModel;
use App\Models\SosmedModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SosmedController extends Controller
{
    public function store(Request $request)
    {
        try{
            $data = $request->only([
                'url_fb',
                'url_ig',
                'url_yt',
                'url_x',
                'url_gmaps',
            ]);

            $sosmed = SosmedModel::first();

            if ($sosmed) {
                $sosmed->update($data);
            } else {
                SosmedModel::create($data);
            }
        

            Alert::success('Berhasil', 'Data sosmed berhasil disimpan.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data sosmed.' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function storeSeo(Request $request)
    {
        try {

            $data = $request->only([
                'meta_desc',
                'meta_keyword',
                'google_id',
                'maintenance_mode',
            ]);

            $data['maintenance_mode'] = $request->has('maintenance_mode') ? 1 : 0;

            $seo = SeoModel::first();

            if ($seo) {
                $seo->update($data);
            } else {
                SeoModel::create($data);
            }

            Alert::success('Berhasil', 'Pengaturan SEO berhasil disimpan.');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data SEO.' . $e->getMessage());
            return redirect()->back();
        }
    }
}
