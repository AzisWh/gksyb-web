@extends('layout.admin')

@section('title', 'Halaman Terhubung')

@section('content')

<div class="fs-style-manrope">

    {{-- HEADER --}}
    <div class="flex flex-col justify-start text-left py-4">
        <h1 class="text-lg font-semibold">Pesan Mari Terhubung</h1>
        <p class="text-sm text-gray-500">
            Kelola pesan dan pertanyaan dari umat paroki
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">

        <div class="bg-white rounded-lg p-4 shadow"
            style="border:1.5px solid #E5E7EB;">
            <div class="text-xs text-gray-500">Total Pesan</div>
            <div class="text-xl font-semibold">{{ $total }}</div>
        </div>

        <div class="bg-blue-50 rounded-lg p-4 shadow"
            style="border:1.5px solid #BFDBFE;">
            <div class="text-xs text-blue-600">Pesan Baru</div>
            <div class="text-xl font-semibold text-blue-700">
                {{ $baru }}
            </div>
        </div>

        <div class="bg-green-50 rounded-lg p-4 shadow"
            style="border:1.5px solid #BBF7D0;">
            <div class="text-xs text-green-600">Pesan Dibaca</div>
            <div class="text-xl font-semibold text-green-700">
                {{ $dibaca }}
            </div>
        </div>

        <div class="bg-red-50 rounded-lg p-4 shadow"
            style="border:1.5px solid #FECACA;">
            <div class="text-xs text-red-600">
                Pesan Ditindaklanjuti
            </div>
            <div class="text-xl font-semibold text-red-700">
                {{ $tindak }}
            </div>
        </div>

    </div>
    <div class="bg-white p-4 rounded-lg shadow mb-4"
        style="border:1.5px solid #E5E7EB;">

    <form method="GET"
        class="grid grid-cols-1 md:grid-cols-3 gap-3 items-end">

        <div>
            <label class="text-xs text-gray-500">
                Cari Email / Isi Pesan
            </label>

            <input type="text"
                name="search"
                value="{{ request('search') }}"
                class="w-full border rounded p-2 text-sm"
                placeholder="Cari pesan...">
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

                <option value="diterima"
                    {{ request('status') == 'diterima' ? 'selected' : '' }}>
                    Diterima
                </option>

                <option value="gagal"
                    {{ request('status') == 'gagal' ? 'selected' : '' }}>
                    Ditindaklanjuti
                </option>

            </select>
        </div>

        <div class="flex gap-2">
            <button class="bg-secondary text-white px-4 py-2 rounded text-sm">
                Filter
            </button>

            @if(request('status') || request('search'))
            <a href="{{ route('admin.terhubung.index') }}"
            class="bg-gray-100 px-4 py-2 rounded text-sm">
                Reset
            </a>
            @endif
        </div>

    </form>
    </div>

    <div class="mt-4 flex flex-col gap-3">

        @forelse($data as $item)

            <div class="bg-white rounded-lg shadow border p-5 flex flex-col gap-3"
                 style="border:1.5px solid #E5E7EB;">

                <div class="flex flex-row justify-between items-start">

                    <div>
                        <div class="font-semibold text-base">
                            {{ $item->email }}
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ $item->nomor_telepon }}
                        </div>
                    </div>

                    <div class="flex flex-row gap-2 items-center">

                        <button href="#" onclick='openDetail(@json($item))'
                           class="text-blue-600 hover:text-blue-800"
                           title="Lihat Detail">
                           <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-blue-500"><path d="M1.5 12S5.5 5.5 12 5.5 22.5 12 22.5 12 18.5 18.5 12 18.5 1.5 12 1.5 12z" stroke="#3f83f8" stroke-width="1.5"/><circle cx="12" cy="12" r="3" stroke="#3f83f8" stroke-width="1.5"/></svg>

                        </button>

                        <button href="#" onclick='openEdit(@json($item))'
                           class="text-green-700 hover:text-green-900"
                           title="Edit">

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
                            Tanggal Kirim
                        </div>

                        <div class="font-medium text-sm">
                            {{ \Carbon\Carbon::parse($item->tanggal_kirim)->translatedFormat('d F Y H:i') }}
                        </div>
                    </div>

                    <div>
                        @if($item->status == 'baru')
                            <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                                Baru
                            </span>
                        @elseif($item->status == 'diterima')
                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                Dibaca
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">
                                Ditindaklanjuti
                            </span>
                        @endif
                    </div>

                </div>

                <div class="mt-2">
                    <div class="text-xs text-gray-400">
                        Isi Pesan
                    </div>

                    <div class="text-sm">
                        {{ $item->isi_pesan }}
                    </div>
                </div>

            </div>

        @empty
            <div class="bg-white rounded-lg shadow border p-5"
                 style="border:1.5px solid #E5E7EB;">
                <div class="flex justify-center items-center text-gray-500 text-sm">
                    Belum ada pesan dari umat.
                </div>
            </div>
        @endforelse

    </div>

</div>

@include('admin.pages.terhubung.components.dialog')

@endsection

@push('script')
    <script>

    function openDetail(d){

        document.getElementById('d_email').innerText = d.email;
        document.getElementById('d_telp').innerText = d.nomor_telepon;
        document.getElementById('d_status').innerText = d.status;
        document.getElementById('d_tgl').innerText = d.tanggal_kirim;
        document.getElementById('d_pesan').innerText = d.isi_pesan;

        document.getElementById('modalDetail').style.display='flex';
    }

    function hideDetail(){
     document.getElementById('modalDetail').style.display='none';
    }

    function openEdit(d){

        document.getElementById('e_status').value = d.status;

        document.getElementById('formStatus').action =
        "/admin-terhubung/update-status/" + d.id;

        document.getElementById('modalEdit').style.display='flex';
    }

    function hideEdit(){
        document.getElementById('modalEdit').style.display='none';
    }

    </script>
@endpush