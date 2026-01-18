<div class="px-4 py-2 fs-style-manropte">
    <form action="{{ route('admin.kontak.store') }}" method="POST" class="space-y-8">
    @csrf
    <input type="hidden" name="id" value="{{ $kontak->id ?? '' }}">

    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">
            Alamat
        </label>
        <textarea
            name="alamat"
            rows="3"
            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
        >{{ $kontak->alamat ?? '' }}</textarea>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                Telepon
            </label>
            <input
                name="telepon"
                value="{{ $kontak->telepon ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">
                WhatsApp
            </label>
            <input
                name="whatsapp"
                value="{{ $kontak->whatsapp ?? '' }}"
                class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
            >
            <p class="mt-1 text-xs text-green-600 flex items-center gap-1">
                🟢 Kirim Pesan WhatsApp
            </p>
        </div>
    </div>

    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">
            Email
        </label>
        <input
            name="email"
            value="{{ $kontak->email ?? '' }}"
            class="w-full px-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#3E0703] focus:outline-none"
        >
    </div>

    <div class="flex items-center justify-between">
        <h3 class="text-sm font-semibold text-gray-800">
            Jam Pelayanan Sekretariat
        </h3>

        <button
            type="button"
            onclick="openModal()"
            class="inline-flex items-center gap-1 px-3 py-2 text-sm text-white rounded-lg bg-secondary "
        >
            + Tambah Jam Pelayanan
        </button>
    </div>

    <div class="space-y-3">
        @foreach($kontak->jamPelayanan ?? [] as $jam)
            <div class="flex items-center justify-between p-4 border rounded-lg bg-gray-50">
                <div>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $jam->hari_dari }} - {{ $jam->hari_sampai }}
                    </p>
                    <p class="text-sm text-gray-600">
                        {{ $jam->jam_mulai }} WIB - {{ $jam->jam_selesai }} WIB
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button type="button" class="text-gray-500 hover:text-gray-700" onclick='openEditJam(@json($jam))'>
                        ✏️
                    </button>

                    <button
                        type="button"
                        onclick="confirmDeleteJam('{{ route('admin.kontak.jam.destroy',$jam->id) }}')"
                        class="text-red-600 hover:text-red-800"
                    >
                        🗑️
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pt-4">
        <button
            type="submit"
            class="inline-flex items-center gap-2 px-6 py-2 text-sm font-medium text-white rounded-lg bg-secondary "
        >
            Simpan Perubahan
        </button>
    </div>
</form>
</div>

@include('admin.pages.settings.components.dialog-jam')


<script>
    function openModal() {
        document.getElementById('modalJam').classList.remove('hidden')
        document.getElementById('modalTitle').innerText = 'Tambah Jam Pelayanan'
        document.getElementById('jamForm').action = "{{ route('admin.kontak.jam.store') }}"
        document.getElementById('formMethod').value = 'POST'
        document.getElementById('jamForm').reset()
    }

    function openEditJam(jam) {
        openModal()
        document.getElementById('modalTitle').innerText = 'Edit Jam Pelayanan'
        document.getElementById('jamForm').action =
            `/admin/kontak/jam/${jam.id}`

        document.getElementById('jam_id').value = jam.id
        document.getElementById('formMethod').value = 'PUT'
        document.getElementById('hari_dari').value = jam.hari_dari
        document.getElementById('hari_sampai').value = jam.hari_sampai
        document.getElementById('jam_mulai').value = jam.jam_mulai
        document.getElementById('jam_selesai').value = jam.jam_selesai
    }

    function closeModal() {
        document.getElementById('modalJam').classList.add('hidden')
    }

    function confirmDeleteJam(url) {
        Swal.fire({
            title: 'Hapus Jam Pelayanan?',
            text: 'Data yang dihapus tidak bisa dikembalikan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3E0703',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form')
                form.method = 'POST'
                form.action = url

                form.innerHTML = `
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                `
                document.body.appendChild(form)
                form.submit()
            }
        })
    }

</script>
