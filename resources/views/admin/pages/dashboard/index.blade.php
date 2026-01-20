@extends('layout.admin')

@section('title', 'Dashboard Sekre')

@section('content')
@php
    $role = auth()->user()->role_type;
@endphp

<div class="fs-style-manrope">
    <div class="flex flex-col justify-start text-left py-4">
        <h1 class="text-lg">
            @if($role == 1)
                Halo Sekretariat 👋
            @elseif($role == 2)
                Halo Komsos 👋
            @else
                Halo User 👋
            @endif
        </h1>
        <p class="text-sm">Pusat kendali informasi, publikasi, dan komunikasi umat Paroki Bintaran.</p>
    </div>
</div>

<div class="fs-style-manrope space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <div class="bg-white border rounded-lg p-4 flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Total Tulisan Bintaran</p>
                <h2 class="text-2xl font-semibold">{{ $totalBintaran }}</h2>
                <p class="text-xs text-green-500 mt-1">+36% ~</p>
            </div>
            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-orange-100 text-orange-600">
                📝
            </div>
        </div>

        <div class="bg-white border rounded-lg p-4 flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Total Kegiatan Mendatang</p>
                <h2 class="text-2xl font-semibold">{{ $totalKegiatan }}</h2>
                <p class="text-xs text-green-500 mt-1">+36% ~</p>
            </div>
            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-cyan-100 text-cyan-600">
                📅
            </div>
        </div>

        <div class="bg-white border rounded-lg p-4 flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Total Pesan "Mari Terhubung"</p>
                <h2 class="text-2xl font-semibold">{{ $totalTerhubung }}</h2>
                <p class="text-xs text-green-500 mt-1">+36% ~</p>
            </div>
            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-pink-100 text-pink-600">
                💬
            </div>
        </div>

        <div class="bg-white border rounded-lg p-4 flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Total Pesan "Intensi / Ujud Doa"</p>
                <h2 class="text-2xl font-semibold">{{ $totalDoa }}</h2>
                <p class="text-xs text-green-500 mt-1">+36% ~</p>
            </div>
            <div class="w-12 h-12 flex items-center justify-center rounded-full bg-yellow-100 text-yellow-600">
                💛
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="bg-white border rounded-lg p-4">
            <h3 class="text-sm font-semibold mb-1">Agenda Kegiatan Terbaru</h3>
            <p class="text-xs text-gray-500 mb-4">
                Daftar kegiatan paroki yang akan datang dan sedang berlangsung
            </p>

            <div class="space-y-4">
                @forelse($agendaTerbaru as $item)
                    <div class="flex justify-between items-start border-b pb-3">
                        <div>
                            <p class="font-medium text-sm">{{ $item->nama_jadwal }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $item->kategoriJadwal->nama_kategori ?? '-' }}
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                {{ ($item->hari) }}
                                • {{ $item->waktu }}
                            </p>
                        </div>

                        <div class="flex items-center gap-2">
                            @if($item->is_active)
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                    Published
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                    Draft
                                </span>
                            @endif

                            <a href="javascript:void(0)"
                                onclick="bukaAgenda(this)"
                                data-nama="{{ e($item->nama_jadwal) }}"
                                data-kategori="{{ e($item->kategoriJadwal->nama_kategori ?? '-') }}"
                                data-tanggal="{{ e($item->hari) }}"
                                data-waktu="{{ e($item->waktu) }}"
                                data-lokasi="{{ e($item->lokasi) }}"
                                data-keterangan="{{ e($item->keterangan) }}"
                                data-status="{{ $item->is_active ? 'Published' : 'Draft' }}"
                                class="text-blue-600">
                                    👁
                                </a>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">Belum ada agenda kegiatan.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white border rounded-lg p-4">
            <h3 class="text-sm font-semibold mb-1">Tulisan Bintaran Terbaru</h3>
            <p class="text-xs text-gray-500 mb-4">
                Kelola dan pantau publikasi artikel terbaru dari Paroki Bintaran
            </p>

            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="py-2">Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bintaranTerbaru as $item)
                        <tr class="border-b">
                            <td class="py-2">
                                {{ \Illuminate\Support\Str::limit($item->judul_tulisan, 25) }}
                            </td>
                            <td class="text-gray-600">Komsos Bintaran</td>
                            <td class="text-gray-600">
                                {{ $item->created_at->format('M d, Y') }}
                            </td>
                            <td class="text-gray-600">
                                {{ $item->kategoriBintaran->nama_kategori ?? '-' }}
                            </td>
                            <td>
                                @if($item->is_published)
                                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                        Published
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="flex gap-2 py-2">
                                <a href="javascript:void(0)"
                                    onclick="bukaBintaran(this)"
                                    data-judul="{{ e($item->judul_tulisan) }}"
                                    data-kategori="{{ e($item->kategoriBintaran->nama_kategori ?? '-') }}"
                                    data-tanggal="{{ $item->created_at->format('d F Y') }}"
                                    data-status="{{ $item->is_published ? 'Published' : 'Draft' }}"
                                    data-ringkasan="{{ e($item->ringkasan) }}"
                                    class="text-blue-600">
                                        👁
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">
                                Belum ada tulisan bintaran.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@include('admin.pages.dashboard.components.dialog-agenda')
@include('admin.pages.dashboard.components.dialog-bintaran')
@endsection

@push('script')
<script>
    function bukaAgenda(el) {
        document.getElementById('modalAgenda').classList.remove('hidden');

        document.getElementById('agenda_nama').innerText = el.dataset.nama;
        document.getElementById('agenda_kategori').innerText = el.dataset.kategori;
        document.getElementById('agenda_tanggal').innerText = el.dataset.tanggal;
        document.getElementById('agenda_waktu').innerText = el.dataset.waktu;
        document.getElementById('agenda_lokasi').innerText = el.dataset.lokasi;
        document.getElementById('agenda_keterangan').innerText = el.dataset.keterangan;

        const status = el.dataset.status;
        const statusEl = document.getElementById('agenda_status');

        statusEl.innerText = status;
        statusEl.className = status === 'Published'
            ? 'px-2 py-1 text-xs rounded bg-green-100 text-green-700'
            : 'px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700';
    }

    function tutupAgenda() {
        document.getElementById('modalAgenda').classList.add('hidden');
    }


    function bukaBintaran(el) {
        document.getElementById('modalBintaran').classList.remove('hidden');

        document.getElementById('bintaran_judul').innerText = el.dataset.judul;
        document.getElementById('bintaran_kategori').innerText = el.dataset.kategori;
        document.getElementById('bintaran_tanggal').innerText = el.dataset.tanggal;
        document.getElementById('bintaran_ringkasan').innerText = el.dataset.ringkasan;

        const status = el.dataset.status;
        const statusEl = document.getElementById('bintaran_status');

        statusEl.innerText = status;
        statusEl.className = status === 'Published'
            ? 'px-2 py-1 text-xs rounded bg-green-100 text-green-700'
            : 'px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700';
    }

    function tutupBintaran() {
        document.getElementById('modalBintaran').classList.add('hidden');
    }
</script>
@endpush