<div class="space-y-4">
    @foreach($ekaristi as $d)
        <div class="border rounded-xl p-5 flex gap-4">

            <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-xl">
                📄
            </div>

            <div class="flex-1">
                <h3 class="font-semibold text-lg">
                    {{ $d->nama_perayaan }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $d->ket_perayaan }}
                </p>

                <div class="text-xs text-gray-400 mt-2 flex gap-3">
                    <span class="truncate max-w-[180px]" title="{{ $d->file }}">
                        {{ $d->file }}
                    </span>
                    <span>• {{ number_format(Storage::size('public/EkaristiFile/'.$d->file)/1024/1024,2) }} MB</span>
                    <span>• {{ $d->created_at->format('Y-m-d') }}</span>
                </div>

                <div class="mt-4 flex gap-2">

                    <a href="{{ route('admin.ekaristi.download', $d->id) }}"
                    target="_blank"
                    style="
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                            padding:8px 12px;
                            border-radius:8px;
                            background:#E8F1FF;
                            color:#1D4ED8;
                            font-weight:500;
                            text-decoration:none;
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
                            display:inline-flex;
                            align-items:center;
                            gap:6px;
                            padding:8px 12px;
                            border-radius:8px;
                            background:#EAFBF1;
                            color:#15803D;
                            font-weight:500;
                            border:none;
                            cursor:pointer;
                        ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="none" viewBox="0 0 24 24" stroke="#15803D" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487l3.651 3.651M7 17l4.586-1.293a2 2 0 00.878-.515l8.536-8.536a2 2 0 00-2.828-2.828L9.636 12.364a2 2 0 00-.515.878L7 17z"/>
                        </svg>
                        Edit
                    </button>

                    <form id="form-delete-{{ $d->id }}"
                        action="{{ route('admin.ekaristi.destroy', $d->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button"
                            onclick="hapus({{ $d->id }})"
                            style="
                                display:inline-flex;
                                align-items:center;
                                gap:6px;
                                padding:8px 12px;
                                border-radius:8px;
                                background:#FEECEC;
                                color:#DC2626;
                                font-weight:500;
                                border:none;
                                cursor:pointer;
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

@include('admin.pages.ekaristi.components.dialog')

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        window.toggleTanggal = function (type) {
            const tunggalWrap = document.getElementById('wrap_tanggal_tunggal');
            const rentangWrap = document.getElementById('wrap_tanggal_rentang');

            const tanggal = document.getElementById('edit_tanggal');
            const mulai = document.getElementById('edit_tanggal_mulai');
            const akhir = document.getElementById('edit_tanggal_akhir');

            // reset
            tunggalWrap.classList.add('hidden');
            rentangWrap.classList.add('hidden');

            tanggal.disabled = true;
            mulai.disabled = true;
            akhir.disabled = true;

            if (type === 'tunggal') {
                tunggalWrap.classList.remove('hidden');
                tanggal.disabled = false;
            }

            if (type === 'rentang') {
                rentangWrap.classList.remove('hidden');
                mulai.disabled = false;
                akhir.disabled = false;
            }
        };

        const radioTunggal = document.getElementById('edit_tipe_tunggal');
        const radioRentang = document.getElementById('edit_tipe_rentang');

        radioTunggal.addEventListener('change', () => toggleTanggal('tunggal'));
        radioRentang.addEventListener('change', () => toggleTanggal('rentang'));

        document.getElementById('formEdit')
            .addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Update data?',
                    icon: 'question',
                    showCancelButton: true
                }).then(result => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });

    });

    function bukaEdit(data) {
        document.getElementById('modalEdit').classList.remove('hidden');

        const form = document.getElementById('formEdit');
        form.action = `/admin-ekaristi/update/${data.id}`;

        document.getElementById('edit_id').value = data.id;
        document.getElementById('edit_nama_perayaan').value = data.nama_perayaan;
        document.getElementById('edit_ket_perayaan').value = data.ket_perayaan ?? '';

        if (data.is_publish == 1) {
            document.getElementById('edit_publish').checked = true;
        } else {
            document.getElementById('edit_draft').checked = true;
        }

        if (data.tanggal) {
            const r = document.getElementById('edit_tipe_tunggal');
            r.checked = true;
            r.dispatchEvent(new Event('change', { bubbles: true }));

            document.getElementById('edit_tanggal').value = data.tanggal;
        } else {
            const r = document.getElementById('edit_tipe_rentang');
            r.checked = true;
            r.dispatchEvent(new Event('change', { bubbles: true }));

            document.getElementById('edit_tanggal_mulai').value = data.tanggal_mulai;
            document.getElementById('edit_tanggal_akhir').value = data.tanggal_akhir;
        }

        document.getElementById('preview_pdf').src =
            `/storage/EkaristiFile/${data.file}`;
    }

    function tutupModal() {
        document.getElementById('modalEdit').classList.add('hidden');
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DC2626'
        }).then(r => {
            if (r.isConfirmed) {
                document.getElementById(`form-delete-${id}`).submit();
            }
        });
    }
</script>
@endpush


