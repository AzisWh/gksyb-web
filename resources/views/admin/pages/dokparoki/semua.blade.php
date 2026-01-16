<div class="space-y-6">

    {{-- FILTER --}}
    <form method="GET" class="flex gap-4">
        <select name="kategori" class="border rounded-lg px-3 py-2">
            <option value="">Semua Kategori</option>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}"
                    {{ request('kategori') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>

        <button class="px-4 py-2 bg-gray-100 rounded-lg">
            Filter
        </button>
    </form>

    <div class="space-y-4">
        @foreach($dokumen as $d)
        <div class="border rounded-xl p-5 flex gap-4">

            <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center">
                📄
            </div>

            <div class="flex-1">
                <h3 class="font-semibold text-lg">
                    {{ $d->judul_dokumen }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $d->keterangan }}
                </p>

                <div class="text-xs text-gray-400 mt-2 flex gap-3">
                    <span>{{ $d->kategori->nama_kategori ?? '-' }}</span>
                    <span>• {{ $d->file }}</span>
                </div>

               <div class="mt-4 flex gap-2">

                    <a href="{{ route('admin.dokparoki.download', $d->id) }}"
                    target="_blank"
                    style="
                            display: inline-flex;
                            align-items: center;
                            gap: 6px;
                            padding: 8px 12px;
                            border-radius: 8px;
                            background-color: #E8F1FF;
                            color: #1D4ED8;
                            font-weight: 500;
                            text-decoration: none;
                    ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="none" viewBox="0 0 24 24" stroke="#1D4ED8" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v12m0 0l4-4m-4 4l-4-4M4 17h16"/>
                        </svg>
                        Download
                    </a>

                    <button onclick='bukaEdit(@json($d))'
                        style="
                            display: inline-flex;
                            align-items: center;
                            gap: 6px;
                            padding: 8px 12px;
                            border-radius: 8px;
                            background-color: #EAFBF1;
                            color: #15803D;
                            font-weight: 500;
                            border: none;
                            cursor: pointer;
                        ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="none" viewBox="0 0 24 24" stroke="#15803D" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487l3.651 3.651M7 17l4.586-1.293a2 2 0 00.878-.515l8.536-8.536a2 2 0 00-2.828-2.828L9.636 12.364a2 2 0 00-.515.878L7 17z"/>
                        </svg>
                        Edit
                    </button>

                    <form id="form-delete-{{ $d->id }}"
                        action="{{ route('admin.dokparoki.destroy', $d->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                            onclick="hapus({{ $d->id }})"
                            style="
                                display: inline-flex;
                                align-items: center;
                                gap: 6px;
                                padding: 8px 12px;
                                border-radius: 8px;
                                background-color: #FEECEC;
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
                            Hapus
                        </button>
                    </form>

                </div>

            </div>

        </div>
        @endforeach
    </div>
</div>

@include('admin.pages.dokparoki.components.dialog')


@push('script')
<script>

function bukaEdit(data) {
    document.getElementById('modalEdit').classList.remove('hidden');

    document.getElementById('edit_id').value = data.id;
    document.getElementById('edit_judul_dokumen').value = data.judul_dokumen;
    document.getElementById('edit_kategori').value = data.kategori_id;
    document.getElementById('edit_keterangan').value = data.keterangan ?? '';
    document.getElementById('preview_pdf').src =
        `/storage/DokParoki/${data.file}`;

    document.getElementById('formEdit').action =
        `/admin-dokumen-paroki/update/${data.id}`;
}

function tutupModal() {
    document.getElementById('modalEdit').classList.add('hidden');
}

document.getElementById('formEdit').addEventListener('submit', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Update dokumen?',
        icon: 'question',
        showCancelButton: true
    }).then(result => {
        if (result.isConfirmed) {
            this.submit();
        }
    });
});

function hapus(id) {
    Swal.fire({
        title: 'Hapus dokumen?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33'
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById(`form-delete-${id}`).submit();
        }
    });
}

</script>
@endpush
