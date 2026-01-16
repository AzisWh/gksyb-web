<div class="max-w-3xl mx-auto p-4">

    <form id="formEkaristi"
          action="{{ route('admin.ekaristi.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4 fs-style-manrope">
        @csrf

        <div>
            <label>Nama Perayaan *</label>
            <input name="nama_perayaan"
                   class="w-full p-2 border rounded"
                   placeholder="Contoh: Panduan Perayaan Paskah 2025">
        </div>

        <div>
            <label>Keterangan Perayaan</label>
            <textarea name="ket_perayaan"
                      class="w-full p-2 border rounded"
                      placeholder="Deskripsi singkat tentang perayaan"></textarea>
        </div>

        <div>
            <label class="block mb-2">Tanggal Perayaan *</label>

            <div class="flex gap-4 mb-2">
                <label class="flex items-center gap-2">
                    <input type="radio"
                           name="tipe_tanggal"
                           value="tunggal"
                           checked
                           onchange="toggleTanggal()">
                    Tanggal Tunggal
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                           name="tipe_tanggal"
                           value="rentang"
                           onchange="toggleTanggal()">
                    Rentang Tanggal
                </label>
            </div>

            <div id="tanggal-tunggal">
                <input type="date"
                       name="tanggal"
                       class="w-full p-2 border rounded">
            </div>

            <div id="tanggal-rentang" class="hidden flex gap-2">
                <input type="date"
                       name="tanggal_mulai"
                       class="w-full p-2 border rounded">

                <input type="date"
                       name="tanggal_akhir"
                       class="w-full p-2 border rounded">
            </div>
        </div>

        <div>
            <label>Upload Dokumen Panduan (PDF) *</label>

            <input type="file"
                   name="file"
                   accept="application/pdf"
                   onchange="previewPDF(this)"
                   class="w-full p-2 border rounded">

            <p class="text-sm text-gray-500 mt-1">PDF maksimal 10MB</p>

            <iframe id="pdfPreview"
                    class="w-full h-[400px] mt-3 border hidden"></iframe>
        </div>

        <div>
            <label>Status Publikasi</label>

            <div class="flex gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio"
                           name="is_publish"
                           value="0"
                           checked>
                    Simpan sebagai Draft
                </label>

                <label class="flex items-center gap-2">
                    <input type="radio"
                           name="is_publish"
                           value="1">
                    Publikasikan
                </label>
            </div>
        </div>

        <div class="flex gap-2">
            <button class="px-4 py-2 text-white rounded bg-secondary">
                Upload Panduan
            </button>

            <button type="button"
                    onclick="resetForm()"
                    class="px-4 py-2 rounded text-[#3E0703]"
                    style="border:1px solid #3E0703">
                Reset
            </button>
        </div>

    </form>
</div>

@push('script')
<script>
    const form = document.getElementById('formEkaristi')

    function toggleTanggal() {
        const tipe = document.querySelector('input[name="tipe_tanggal"]:checked').value
        document.getElementById('tanggal-tunggal').classList.toggle('hidden', tipe !== 'tunggal')
        document.getElementById('tanggal-rentang').classList.toggle('hidden', tipe !== 'rentang')
    }

    function previewPDF(input) {
        const file = input.files[0]

        if (!file) return

        if (file.size > 10 * 1024 * 1024) {
            Swal.fire('Error', 'Ukuran file maksimal 10MB', 'error')
            input.value = ''
            return
        }

        const url = URL.createObjectURL(file)
        const iframe = document.getElementById('pdfPreview')

        iframe.src = url
        iframe.classList.remove('hidden')
    }

    function resetForm() {
        form.reset()
        document.getElementById('pdfPreview').classList.add('hidden')
        toggleTanggal()
    }

    form.addEventListener('submit', e => {
        e.preventDefault()

        Swal.fire({
            title: 'Simpan data?',
            icon: 'question',
            showCancelButton: true
        }).then(r => {
            if (r.isConfirmed) form.submit()
        })
    })

    toggleTanggal()
</script>
@endpush

