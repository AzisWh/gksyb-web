<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QrCodeModel;
use App\Models\TransferBankModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class AdminDonasiController extends Controller
{
    public function index()
    {
        $transfer = TransferBankModel::all();
        $qrcode = QrCodeModel::all();
        return view('admin.pages.donasi.index', compact('transfer', 'qrcode'));
    }

    public function StoreTransfer(Request $request)
    {
        try{
            $request->validate([
                'nama_bank' => 'required|string|max:255',
                'nomor_rekening' => 'required|string|max:255',
                'atas_nama' => 'required|string|max:255',
                'kode_bank' => 'nullable|string|max:10',
            ]);

            TransferBankModel::create([
                'nama_bank' => $request->nama_bank,
                'nomor_rekening' => $request->nomor_rekening,
                'atas_nama' => $request->atas_nama,
                'kode_bank' => $request->kode_bank,
            ]);
            Alert::success('Berhasil', 'Data transfer bank berhasil disimpan.');
            return redirect()->route('admin.donasi.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->route('admin.donasi.index');
        }
    }

    public function EditTransfer(Request $request, $id)
    {
        try{
            $request->validate([
                'nama_bank' => 'sometimes|string|max:255',
                'nomor_rekening' => 'sometimes|string|max:255',
                'atas_nama' => 'sometimes|string|max:255',
                'kode_bank' => 'nullable|string|max:10',
            ]);

            $transfer = TransferBankModel::findOrFail($id);
            $transfer->update([
                'nama_bank' => $request->nama_bank,
                'nomor_rekening' => $request->nomor_rekening,
                'atas_nama' => $request->atas_nama,
                'kode_bank' => $request->kode_bank,
            ]);
            Alert::success('Berhasil', 'Data transfer bank berhasil diupdate.');
            return redirect()->route('admin.donasi.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
            return redirect()->route('admin.donasi.index');
        }
    }

    public function DestroyTransfer($id)
    {
        try{
            $transfer = TransferBankModel::findOrFail($id);
            $transfer->delete();
            Alert::success('Berhasil', 'Data transfer bank berhasil dihapus.');
            return redirect()->route('admin.donasi.index');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
            return redirect()->route('admin.donasi.index');
        }
    }

    public function StoreQrCode(Request $request)
    {
        try {

            $request->validate([
                'nama_metode' => 'required|string|max:255',
                'qr_img'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi'   => 'nullable|string',
            ]);

            $image = $request->file('qr_img');
            $extension = $image->getClientOriginalExtension();

            $imageName = 'qr-' . time() . '.' . $extension;

            $path = public_path('QrCodesImg');

            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $image->move($path, $imageName);

            QrCodeModel::create([
                'nama_metode' => $request->nama_metode,
                'qr_img'      => 'QrCodesImg/' . $imageName,
                'deskripsi'   => $request->deskripsi,
            ]);

            Alert::success('Berhasil', 'Data QR Code berhasil disimpan.');
            return redirect()->route('admin.donasi.index');

        } catch (\Exception $e) {

            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->route('admin.donasi.index');
        }
    }

    public function UpdateQrCode(Request $request, $id)
    {
        try {

            $qr = QrCodeModel::findOrFail($id);

            $request->validate([
                'nama_metode' => 'required|string|max:255',
                'qr_img'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'deskripsi'   => 'nullable|string',
            ]);

            $data = [
                'nama_metode' => $request->nama_metode,
                'deskripsi'   => $request->deskripsi,
            ];

            if ($request->hasFile('qr_img')) {

                if ($qr->qr_img && File::exists(public_path($qr->qr_img))) {
                    File::delete(public_path($qr->qr_img));
                }

                $image     = $request->file('qr_img');
                $extension = $image->getClientOriginalExtension();

                $imageName = 'qr-code-' . $qr->id . '.' . $extension;

                $path = public_path('QrCodesImg');

                if (!File::exists($path)) {
                    File::makeDirectory($path, 0777, true);
                }

                $image->move($path, $imageName);

                $data['qr_img'] = 'QrCodesImg/' . $imageName;
            }

            $qr->update($data);

            Alert::success('Berhasil', 'Data QR Code berhasil diperbarui.');
            return redirect()->route('admin.donasi.index');

        } catch (\Exception $e) {

            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->route('admin.donasi.index');
        }
    }

    public function DestroyQrCode($id)
    {
        try {

            $qr = QrCodeModel::findOrFail($id);

            if ($qr->qr_img && File::exists(public_path($qr->qr_img))) {
                File::delete(public_path($qr->qr_img));
            }

            $qr->delete();

            Alert::success('Berhasil', 'Data QR Code berhasil dihapus.');
            return redirect()->route('admin.donasi.index');

        } catch (\Exception $e) {

            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->route('admin.donasi.index');
        }
    }
}
