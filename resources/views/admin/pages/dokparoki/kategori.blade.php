<div class="space-y-6">

    <div class="max-w-xl">
        <form
            class="space-y-4"
            id="formKategori"
            method="POST"
            action="{{ route('admin.kategoridokparoki.store') }}"
        >
            @csrf

            <input type="hidden" name="id" id="kategori_id">
            <input type="hidden" name="_method" id="method" value="POST">

            <div class="flex items-end gap-3">
                
                <div class="flex-1">
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        Nama Kategori
                    </label>
                    <input
                        type="text"
                        name="nama_kategori"
                        id="nama_kategori"
                        class="w-full px-4 py-2 border rounded-lg"
                        placeholder="Nama Kategori"
                        required
                    >
                </div>
                <button
                    type="submit"
                    id="btnSubmit"
                    class="flex items-center justify-center w-10 h-10 text-white transition rounded-lg bg-secondary"
                >
                    +
                </button>
            </div>

            
        </form>
    </div>

    <div class="space-y-2">

        @foreach($kategori as $item)
        <div class="flex items-center justify-between p-3 bg-white border rounded-lg">

            <div class="flex items-center gap-3">
                <span class="font-medium">
                    {{ $item->nama_kategori }}
                </span>
            </div>

            <div class="flex gap-3">

                <button
                    type="button"
                    onclick="editKategori('{{ $item->id }}','{{ $item->nama_kategori }}')"
                    class="text-blue-600 hover:text-blue-800"
                >
                    ✏
                </button>

                <form
                    id="delete-{{ $item->id }}"
                    action="{{ route('admin.kategoridokparoki.destroy', $item->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="button"
                        onclick="hapusKategori('{{ $item->id }}')"
                        class="text-red-600 hover:text-red-800"
                    >
                        🗑
                    </button>
                </form>

            </div>
        </div>
        @endforeach

    </div>
</div>


@push('script')
<script>

    function editKategori(id, nama, warna) {
        document.getElementById('kategori_id').value = id
        document.getElementById('nama_kategori').value = nama

        document.getElementById('method').value = "PATCH"

        document.getElementById('formKategori').action =
            `/admin-kategori-dokumen-paroki/update/${id}`

        document.getElementById('btnSubmit').innerHTML = "✓"
    }


    document.getElementById('formKategori').addEventListener('submit', function(e) {
        e.preventDefault()

        const mode = document.getElementById('method').value === "POST"
            ? "menambah"
            : "mengubah"

        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: `Yakin ingin ${mode} kategori ini?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit()
            }
        })
    })


    function hapusKategori(id) {
        Swal.fire({
            title: 'Yakin menghapus?',
            text: "Data kategori akan hilang permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-${id}`).submit()
            }
        })
    }

</script>
@endpush
