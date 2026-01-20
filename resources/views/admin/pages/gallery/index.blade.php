@extends('layout.admin')

@section('title', 'Gallery Links')

@section('content')
<div class="fs-style-manrope">
    <div class="flex flex-col justify-start text-left py-4">
        <h1 class="text-lg font-semibold">Galeri dan Dokumentasi</h1>
        <p class="text-sm text-gray-600">
            Kelola link Google Drive untuk galeri foto dan video kegiatan paroki
        </p>
    </div>

    <div class="bg-white rounded-md border border-gray-300 py-6 px-16 flex flex-col gap-6">

        <div class="flex flex-col px-8 w-full rounded-md py-3 gap-1" style="background-color: #BEDBFF">
            <h3 class="font-semibold">Informasi Penting</h3>
            <span>• Galeri menggunakan Google Drive eksternal, tidak ada upload media di admin panel</span>
            <span>• Pastikan folder Google Drive diatur sebagai "Anyone with the link can view"</span>
            <span>• URL yang disimpan akan ditampilkan sebagai link di halaman publik website</span>
            <span>• Umat dapat mengakses galeri langsung melalui link Google Drive</span>
        </div>

        <div class="flex flex-col">
            <h3 class="font-semibold">Link Google Drive Saat Ini</h3>
            @if($data)
                <p class="text-sm text-green-600 mt-1">
                    Data sudah tersedia, kamu bisa mengedit link di bawah.
                </p>
            @else
                <p class="text-sm text-red-600 mt-1">
                    Belum ada data, silakan tambahkan link baru.
                </p>
            @endif
        </div>

        <form action="{{ route('admin.gallery.store') }}" method="POST" class="w-full flex flex-col gap-4">
            @csrf

            <div class="flex flex-row gap-2">
               <div class="flex flex-col w-full">
                    <label class="text-sm font-medium">URL Galeri Google Drive</label>
                    <input 
                        type="url"
                        name="url"
                        placeholder="https://drive.google.com/drive/folders/..."
                        value="{{ $data->url ?? '' }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                        required
                    >
               </div>

                <div class="flex justify-end mt-4">
                    <button 
                        type="submit"
                        class="p-2 rounded text-white 
                            {{ $data ? 'bg-secondary' : 'bg-secondary' }}"
                    >
                        {{ $data ? 'Update' : 'Tambah' }}
                    </button>
                </div>
            </div>

            <div class="border border-gray-200 rounded-md p-6 flex flex-col items-center gap-4">

                <div class="flex flex-col items-center gap-2 text-center">
                    <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                        </svg>
                    </div>
                    <h4 class="font-semibold">Galeri & Dokumentasi Paroki Bintaran</h4>
                    <p class="text-sm text-gray-500">
                        Lihat foto dan video kegiatan paroki di Google Drive
                    </p>
                </div>
                <button 
                    type="button"
                    onclick="openGallery()"
                    class="px-4 py-2 bg-secondary text-white rounded hover:opacity-90 flex items-center gap-2"
                >
                    Buka Galeri
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3h7m0 0v7m0-7L10 14" />
                    </svg>
                </button>
            </div>

        </form>

        <div class="flex flex-col px-8 w-full rounded-md py-3 gap-1" style="background-color: #FFF085">
            <h3 class="font-semibold">Cara Mengatur Google Drive</h3>
            <span>1. Buka Google Drive dan buat folder khusus untuk galeri paroki</span>
            <span>2. Upload foto dan video kegiatan ke folder tersebut</span>
            <span>3. Klik kanan pada folder → Pilih "Share" atau "Bagikan"</span>
            <span>4. Ubah setting menjadi "Anyone with the link can view"</span>
            <span>5. Copy link folder dan paste di form di atas"</span>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
function openGallery() {
    const url = @json($data->url ?? null);

    if (!url) {
        Swal.fire({
            icon: 'warning',
            title: 'Belum Ada Data',
            text: 'Link galeri belum tersedia. Silakan tambahkan terlebih dahulu.',
        });
        return;
    }

    window.open(url, '_blank');
}
</script>
@endsection
