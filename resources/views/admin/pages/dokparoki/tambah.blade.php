<div class="max-w-2xl">

    <form
        action="{{ route('admin.dokparoki.store') }}"
        method="POST"
        enctype="multipart/form-data"
        id="formDokumen"
        class="space-y-4"
    >
    @csrf

    <div>
        <label class="block mb-1 text-sm font-medium">
            Judul Dokumen
        </label>
        <input
            type="text"
            name="judul_dokumen"
            class="w-full px-4 py-2 border rounded-lg"
            placeholder="Contoh: Surat Baptis 2024"
            required
        >
    </div>

    <div>
        <label class="block mb-1 text-sm font-medium">
            Kategori
        </label>

        <select
            name="kategori_id"
            class="w-full px-4 py-2 border rounded-lg"
            required
        >
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $k)
                <option value="{{ $k->id }}">
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block mb-1 text-sm font-medium">
            Keterangan
        </label>
        <textarea
            name="keterangan"
            class="w-full px-4 py-2 border rounded-lg"
            rows="4"
            placeholder="Tambahkan keterangan tambahan (opsional)"
            ></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">
            Upload PDF (Max 10MB)
        </label>

        <input
            type="file"
            name="file"
            id="file"
            accept="application/pdf"
            class="w-full px-4 py-2 border rounded-lg"
            required
        >

        <iframe
            id="pdfViewer"
            class="w-full h-[500px] border rounded mt-4"
        ></iframe>
    </div>

    <div class="flex gap-3 pt-2">

        <button
        type="submit"
            class="px-4 py-2 text-white rounded-lg bg-secondary hover:bg-secondary-hover"
        >
            Simpan Dokumen
        </button>

        <button
            type="button"
            id="btnReset"
            class="px-4 py-2 border rounded-lg"
        >
            Reset
        </button>

    </div>

    </form>
</div>

@push('script')
    <script>

    document.getElementById('file').addEventListener('change', function(e){
        const file = e.target.files[0]
        if(file){

            if(file.size > 10 * 1024 * 1024){
                // alert('Maksimal 10MB!')
                Swal.fire({
                    icon: 'error',
                    title: 'Ukuran file terlalu besar',
                    text: 'Maksimal ukuran file adalah 10MB.',
                })
                this.value = ''
                return
            }

            const url = URL.createObjectURL(file)
            document.getElementById('pdfViewer').src = url
        }else{
            console.log('tidak ada file')
        }
    })

    document.getElementById('btnReset').addEventListener('click', function(){
        document.getElementById('formDokumen').reset()
        document.getElementById('pdfViewer').src = ''
    })

    const formDokumen = document.getElementById('formDokumen')

        formDokumen.addEventListener('submit', function(e){
        e.preventDefault()

        Swal.fire({
            title: 'Simpan Dokumen?',
            text: 'Pastikan data sudah benar',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed){
                this.submit()
            }
        })
    })

    </script>
@endpush
