@extends('layout.admin')

@section('title', 'Halaman Doa')

@section('content')

<div class="fs-style-manrope">

    {{-- HEADER --}}
    <div class="flex flex-col justify-start text-left py-4">
        <h1 class="text-lg font-semibold">Data Intensi Doa</h1>
        <p class="text-sm text-gray-500">
            Kelola daftar intensi doa dari umat
        </p>
    </div>

    {{-- INFO BOX --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">

        <div class="bg-white rounded-lg p-4 shadow"
            style="border:1.5px solid #E5E7EB;">
            <div class="text-xs text-gray-500">Total Intensi</div>
            <div class="text-xl font-semibold">{{ $total }}</div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 shadow"
            style="border:1.5px solid #BBF7D0;">
            <div class="text-xs text-green-600">Sudah Didoakan</div>
            <div class="text-xl font-semibold text-green-700">
                {{ $didoakan }}
            </div>
        </div>

        <div class="bg-yellow-50 rounded-lg p-4 shadow"
            style="border:1.5px solid #FEF08A;">
            <div class="text-xs text-yellow-600">Belum Didoakan</div>
            <div class="text-xl font-semibold text-yellow-700">
                {{ $belum }}
            </div>
        </div>

    </div>

    {{-- FILTER --}}
    <div class="bg-white p-4 rounded-lg shadow mb-4"
        style="border:1.5px solid #E5E7EB;">

        <form method="GET"
            class="grid grid-cols-1 md:grid-cols-3 gap-3 items-end">

            <div>
                <label class="text-xs text-gray-500">
                    Cari Nama / Isi Doa
                </label>

                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="w-full border rounded p-2 text-sm"
                    placeholder="Cari doa...">
            </div>

            <div>
                <label class="text-xs text-gray-500">
                    Filter Status
                </label>

                <select name="status"
                        class="w-full border rounded p-2 text-sm">

                    <option value="">Semua</option>

                    <option value="baru"
                        {{ request('status') == 'baru' ? 'selected' : '' }}>
                        Baru
                    </option>

                    <option value="didoakan"
                        {{ request('status') == 'didoakan' ? 'selected' : '' }}>
                        Sudah Didoakan
                    </option>

                    <option value="belum"
                        {{ request('status') == 'belum' ? 'selected' : '' }}>
                        Belum Didoakan
                    </option>

                </select>
            </div>

            <div class="flex gap-2">
                <button class="bg-secondary text-white px-4 py-2 rounded text-sm">
                    Filter
                </button>

                @if(request('status') || request('search'))
                <a href="{{ route('admin.doa.index') }}"
                class="bg-gray-100 px-4 py-2 rounded text-sm">
                    Reset
                </a>
                @endif
            </div>

        </form>
    </div>

    {{-- LIST DATA --}}
    <div class="mt-4 flex flex-col gap-3">

        @forelse($data as $item)

            <div class="bg-white rounded-lg shadow border p-5 flex flex-col gap-3"
                 style="border:1.5px solid #E5E7EB;">

                <div class="flex flex-row justify-between items-start">

                    <div>
                        <div class="font-semibold text-base">
                            {{ $item->nama ?? 'Tanpa Nama' }}
                        </div>

                        <div class="text-xs text-gray-500">
                            Tanggal Doa: 
                            {{ \Carbon\Carbon::parse($item->tanggal_doa)->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <div class="flex flex-row gap-2 items-center">

                        <button onclick='openDetail(@json($item))'
                           class="text-blue-600 hover:text-blue-800"
                           title="Lihat Detail">

                           <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M1.5 12S5.5 5.5 12 5.5 22.5 12 22.5 12 18.5 18.5 12 18.5 1.5 12 1.5 12z"
                                      stroke="#3f83f8" stroke-width="1.5"/>
                                <circle cx="12" cy="12" r="3"
                                        stroke="#3f83f8" stroke-width="1.5"/>
                           </svg>

                        </button>

                        <button onclick='openEdit(@json($item))'
                           class="text-green-700 hover:text-green-900"
                           title="Edit Status">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="16" height="16"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="#15803D"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M16.862 3.487l3.651 3.651M7 17l4.586-1.293a2 2 0 00.878-.515l8.536-8.536a2 2 0 00-2.828-2.828L9.636 12.364a2 2 0 00-.515.878L7 17z"/>
                            </svg>

                        </button>

                    </div>
                </div>

                <hr>

                <div class="flex flex-row justify-between items-center">

                    <div>
                        <div class="text-xs text-gray-400">
                            Dibuat Pada
                        </div>

                        <div class="font-medium text-sm">
                            {{ $item->created_at->translatedFormat('d F Y H:i') }}
                        </div>
                    </div>

                    <div>
                        @if($item->status == 'baru')
                            <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                                Baru
                            </span>

                        @elseif($item->status == 'didoakan')
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                Sudah Didoakan
                            </span>

                        @else
                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                Belum Didoakan
                            </span>
                        @endif
                    </div>

                </div>

                <div class="mt-2">
                    <div class="text-xs text-gray-400">
                        Isi Doa
                    </div>

                    <div class="text-sm">
                        {{ $item->isi_doa }}
                    </div>
                </div>

            </div>

        @empty

            <div class="bg-white rounded-lg shadow border p-5"
                 style="border:1.5px solid #E5E7EB;">

                <div class="flex justify-center items-center text-gray-500 text-sm">
                    Belum ada data doa.
                </div>

            </div>

        @endforelse

    </div>

</div>

@include('admin.pages.doa.components.dialog')
@endsection

@push('script')
    <script>

function openDetail(item) {

    document.getElementById('detailNama').innerText =
        item.nama ? item.nama : 'Tanpa Nama';

    document.getElementById('detailTanggal').innerText =
        item.tanggal_doa;

    let statusText = '';

    if (item.status === 'baru') statusText = 'Baru';
    if (item.status === 'didoakan') statusText = 'Sudah Didoakan';
    if (item.status === 'belum') statusText = 'Belum Didoakan';

    document.getElementById('detailStatus').innerText = statusText;

    document.getElementById('detailIsi').innerText =
        item.isi_doa;

    document.getElementById('modalDetail').classList.remove('hidden');
}

function closeDetail() {
    document.getElementById('modalDetail').classList.add('hidden');
}

// ================= EDIT =================

function openEdit(item) {

    document.getElementById('editNama').value =
        item.nama ? item.nama : 'Tanpa Nama';

    document.getElementById('editStatus').value =
        item.status;

    const form = document.getElementById('formEdit');

    form.action =
        "{{ url('admin-doa/update-status') }}/" + item.id;

    document.getElementById('modalEdit').classList.remove('hidden');
}

function closeEdit() {
    document.getElementById('modalEdit').classList.add('hidden');
}

</script>

@endpush

