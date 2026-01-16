<div class="space-y-4">

    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="text-sm font-medium">Kategori</label>
            <select name="kategori" class="w-full border p-2 rounded">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ request('kategori') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="text-sm font-medium">Status</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="">Semua Status</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>


        <div class="md:col-span-3 flex gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white rounded">
                Filter
            </button>

            <a href="{{ url()->current() }}" class="px-4 py-2 bg-gray-200 rounded">
                Reset
            </a>
        </div>

    </form>

    <div class="relative -mx-4 md:mx-0">
        <div class="overflow-x-auto md:overflow-visible">

            <table class="min-w-[640px] w-full text-sm rounded-lg">

                <thead class="text-gray-600 bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left">Nama Jadwal</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Hari</th>
                        <th class="px-4 py-3 text-left">Waktu</th>
                        <th class="px-4 py-3 text-left">Lokasi</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($jadwal as $j)

                    <tr class="border-b">

                        <td class="px-4 py-3">
                            {{ $j->nama_jadwal }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">

                                <div
                                    class="w-4 h-4 rounded"
                                    style="background: {{ $j->kategoriJadwal->warna }}"
                                ></div>

                                {{ $j->kategoriJadwal->nama_kategori }}
                            </div>
                        </td>

                        <td class="px-4 py-3">
                            {{ $j->hari }}
                        </td>

                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($j->waktu)->format('H:i') }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $j->lokasi }}
                        </td>

                        <td class="px-4 py-3">
                            @if($j->is_active)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                    Aktif
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 flex gap-2">

                            <button onclick='bukaEdit(@json($j))'
                                style="
                                    display: inline-flex;
                                    align-items: center;
                                    gap: 6px;
                                    padding: 8px 12px;
                                    border-radius: 8px;
                                    color: #1D4ED8;
                                    font-weight: 500;
                                    border: none;
                                    cursor: pointer;
                                ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="none" viewBox="0 0 24 24" stroke="#1D4ED8" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 3.487l3.651 3.651M7 17l4.586-1.293a2 2 0 00.878-.515l8.536-8.536a2 2 0 00-2.828-2.828L9.636 12.364a2 2 0 00-.515.878L7 17z"/>
                                </svg>
                            </button>

                            <form id="form-delete-{{ $j->id }}"
                                action="{{ route('admin.jadwal.destroy', $j->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="button"
                                    onclick="hapus({{ $j->id }})"
                                    style="
                                        display: inline-flex;
                                        align-items: center;
                                        gap: 6px;
                                        padding: 8px 12px;
                                        border-radius: 8px;
                                        color: #DC2626;
                                        font-weight: 500;
                                        border: none;
                                        cursor: pointer;
                                    ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                                    </svg>
                                </button>
                            </form>

                        </td>


                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6">
                            Data jadwal belum ada
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>
    </div>
</div>

@include('admin.pages.jadwal.components.dialog')


@push('script')

    <script>

    // BUKA MODAL EDIT
    function bukaEdit(data) {

    document.getElementById('modalEdit').classList.remove('hidden');

    document.getElementById('edit_id').value = data.id;
    document.getElementById('edit_nama').value = data.nama_jadwal;
    document.getElementById('edit_kategori').value = data.kategori_jadwal_id;
    document.getElementById('edit_hari').value = data.hari;
    document.getElementById('edit_waktu').value = data.waktu;
    document.getElementById('edit_lokasi').value = data.lokasi;
    document.getElementById('edit_keterangan').value = data.keterangan ?? '';
    document.getElementById('edit_is_active').checked = data.is_active ? true : false;

    document.getElementById('formEdit').action =
    `/admin-jadwal-doa/update/${data.id}`;
    }

    function tutupModal(){
    document.getElementById('modalEdit').classList.add('hidden');
    }

    document.getElementById('formEdit').addEventListener('submit', function(e){

    e.preventDefault();

    Swal.fire({
    title: 'Yakin update jadwal?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Ya, update'
    }).then((result) => {

    if(result.isConfirmed){
    this.submit();
    }

    });

    });

    function hapusJadwal(id){

        Swal.fire({
            title: 'Yakin hapus jadwal?',
            text: 'Data tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            confirmButtonColor: '#d33'
        }).then((result) => {
            if(result.isConfirmed){
            document.getElementById(`form-delete-${id}`).submit();
            }

        });

    }

    </script>

@endpush
