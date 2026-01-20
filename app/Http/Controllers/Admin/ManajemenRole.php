<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenRole extends Controller
{
    public function index()
    {
        $komsos = User::where('role_type', 2)->get();
        $sekre = User::where('role_type', 1)->get();
        return view('admin.pages.role.index', compact('komsos', 'sekre'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->only(['name', 'email', 'role_type']);

            $data['password'] = Hash::make($request->password);

            User::create($data);

            Alert::success('Berhasil', 'User berhasil ditambahkan.');
            return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal menambah user: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $data = $request->only(['name', 'email', 'role_type']);

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            Alert::success('Berhasil', 'User berhasil diperbarui.');
            return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal update user: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            Alert::success('Berhasil', 'User berhasil dihapus.');
            return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Gagal hapus user: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
