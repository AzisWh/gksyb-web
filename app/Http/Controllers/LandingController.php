<?php

namespace App\Http\Controllers;

use App\Models\DoaModel;
use App\Models\DokParokiModel;
use App\Models\EkaristiModel;
use App\Models\FaqModel;
use App\Models\IdentitasModel;
use App\Models\JadwalDoa;
use App\Models\KategoriDokParokiModel;
use App\Models\KategoriFaqModel;
use App\Models\SakramenModel;
use App\Models\SosmedModel;
use App\Models\TerhubungModel;
use App\Models\TulisanBintaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class LandingController extends Controller
{
    public function index()
    {
        $data = IdentitasModel::first();
        $jadwal = JadwalDoa::with('kategoriJadwal')->get(); 
        $bintaran = TulisanBintaranModel::with('kategoriBintaran')->where('is_published', true)->latest()->take(3)->get();
        $sosmed = SosmedModel::find(3);
        return view('landing.index', compact('data', 'jadwal', 'bintaran', 'sosmed'));
    }

    public function panduanEkaristi()
    {
        $data = EkaristiModel::where('is_publish', 1)->get();
        return view('landing.detail.panduan-ekaristi', compact('data'));
    }

    public function downloadPanduanEkaristi($id)
    {
        $data = EkaristiModel::findOrFail($id);

        $path = storage_path('app/public/EkaristiFile/' . $data->file);
        $size = filesize($path);

        $nama = 'dokumen-ekaristi-' .
            str_replace(' ', '-', strtolower($data->nama_perayaan)) .
            ' (' . round($size / 1024 / 1024, 2) . ' MB).pdf';

        return response()->download($path, $nama);
    }

    public function dokumenGereja()
    {
       $data = DokParokiModel::with('kategori')
            ->whereNotNull('file')
            ->orderBy('kategori_id')
            ->orderBy('judul_dokumen')
            ->get();

        return view('landing.detail.dokumen-gereja', compact('data'));
    }

    public function sejarah()
    {
        return view('landing.sejarah');
    }

    public function gembala()
    {
        return view('landing.gembala');
    }

    public function doa()
    {
        return view('landing.doa');
    }

    public function sekraman()
    {
        $data = SakramenModel::limit(7)->get();
        return view('landing.sekraman', compact('data'));
    }

    public function detailSakramen($id)
    {
        $sakramen = SakramenModel::findOrFail($id);

        return view('landing.detail.sakramen', compact('sakramen'));
    }

    public function tulisan()
    {
        $agendas = [
            [
                'title' => 'Natalan dan Pesta Tahun Baru Bersama OMK Bintaran',
                'date'  => '1 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
            [
                'title' => 'Misa Syukur Awal Tahun',
                'date'  => '5 Jan 2023',
                'type'  => 'Agenda',
                'image' => 'assets/doabersama.jpg',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur. Mauris natoque ornare tellus volutpat egestas.'
            ],
        ];

        return view('landing.tulisan', compact('agendas'));
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function storeContact(Request $request)
    {
        try {
            $request->validate([
                'nama_lengkap'       => 'required|string|max:255',
                'email'      => 'required|email',
                'nomor_telepon'      => 'required|string|max:20',
                'asal_paroki'     => 'nullable|string|max:255',
                'asal_lingkungan' => 'nullable|string|max:255',
                'isi_pesan'    => 'required|string|max:1000',
            ]);

            $contact = TerhubungModel::create([
                'user_id'          => 3,
                'nama_lengkap'     => $request->nama_lengkap,
                'email'            => $request->email,
                'nomor_telepon'    => $request->nomor_telepon,
                'asal_paroki'      => $request->asal_paroki,
                'asal_lingkungan'  => $request->asal_lingkungan,
                'isi_pesan'        => $request->isi_pesan,
                'tanggal_kirim'    => now(),
                'status'           => 'baru',
            ]);

            Mail::send('emails.notification', [
                'title' => 'Pesan Baru dari Paroki Bintaran',
                'messageContent' =>
                    "Nama: {$contact->nama_lengkap}\n" .
                    "Email: {$contact->email}\n" .
                    "Telepon: {$contact->nomor_telepon}\n" .
                    "Paroki: {$contact->asal_paroki}\n" .
                    "Lingkungan: {$contact->asal_lingkungan}\n\n" .
                    "Pesan:\n{$contact->isi_pesan}"
            ], function ($mail) use ($contact) {
                $mail->to('parokistyusupbintaran@gmail.com')
                    ->replyTo($contact->email, $contact->nama_lengkap)
                    ->subject('Pesan Baru dari Paroki Bintaran');
            });

            Alert::success('Berhasil', 'Pesan Anda berhasil dikirim');
            return back();

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: '.$e->getMessage());
            return back()->withInput();
        }
    }

    public function ssd()
    {
        $kategori = KategoriFaqModel::all();

        $faq = FaqModel::with('kategoriFaq')
                ->where('is_active', 1)
                ->get()
                ->groupBy(function ($item) {
                    return strtolower($item->kategoriFaq->nama_kategori);
                });
        return view('landing.ssd', compact('kategori', 'faq'));
    }

    public function donasi()
    {
        return view('landing.donasi');
    }

    public function ujud()
    {
        return view('landing.ujud');
    }

    public function storeUjud(Request $request)
    {
        try {

            $request->validate([
                'nama'            => 'required|string|max:100',
                'nomor_telepon'   => 'required|string|max:20',
                'asal_paroki'     => 'required|string|max:100',
                'asal_lingkungan' => 'required|string|max:100',
                'jenis_permohonan'=> 'required|string|max:100',
                'isi_doa'         => 'required|string',
            ]);

            DoaModel::create([
                'nama'            => $request->nama,
                'nomor_telepon'   => $request->nomor_telepon,
                'asal_paroki'     => $request->asal_paroki,
                'asal_lingkungan' => $request->asal_lingkungan,
                'jenis_permohonan'=> $request->jenis_permohonan,
                'isi_doa'         => $request->isi_doa,
                'tanggal_doa' => now(),
                'status'      => 'baru',
            ]);

            Alert::success('Berhasil', 'Permohonan doa berhasil dikirim, terimakasih');
            return back();

        } catch (\Exception $e) {

            Alert::error('Gagal', $e->getMessage());
            return back()->withInput();

        }
    }
}
