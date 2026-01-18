<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdentitasModel;
use App\Models\KontakModel;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $identitas = IdentitasModel::first();
        $kontak = KontakModel::with('jamPelayanan')->first();
        return view('admin.pages.settings.index', compact('identitas', 'kontak'));
    }
}
