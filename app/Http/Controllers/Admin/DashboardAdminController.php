<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoaModel;
use App\Models\JadwalDoa;
use App\Models\TerhubungModel;
use App\Models\TulisanBintaranModel;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalBintaran = TulisanBintaranModel::where('is_published', 1)->count();
        $totalKegiatan = JadwalDoa::where('is_active', 1)->count();
        $totalTerhubung = TerhubungModel::count();
        $totalDoa = DoaModel::count();

        $agendaTerbaru = JadwalDoa::with('kategoriJadwal')
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $bintaranTerbaru = TulisanBintaranModel::with('kategoriBintaran')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        return view('admin.pages.dashboard.index', compact(
            'totalBintaran',
            'totalKegiatan',
            'totalTerhubung',
            'totalDoa',
            'agendaTerbaru',
            'bintaranTerbaru'
        ));
    }
}
