<div id="modalEdit"
     class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">

    <div class="bg-white w-full max-w-2xl rounded-xl p-6">

        <h3 class="text-lg font-semibold mb-4">
            Edit Panduan Ekaristi
        </h3>

        <form id="formEdit"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" id="edit_id">

            <div class="space-y-4">

                <div>
                    <label class="text-sm font-medium">
                        Nama Perayaan
                    </label>
                    <input
                        type="text"
                        name="nama_perayaan"
                        id="edit_nama_perayaan"
                        class="w-full border p-2 rounded-lg">
                </div>

                <div>
                    <label class="text-sm font-medium">
                        Keterangan
                    </label>
                    <textarea
                        name="ket_perayaan"
                        id="edit_ket_perayaan"
                        class="w-full border p-2 rounded-lg"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium">
                        Tipe Tanggal
                    </label>

                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input type="radio"
                                   name="tipe_tanggal"
                                   value="tunggal"
                                   id="edit_tipe_tunggal">
                            Tanggal Tunggal
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="radio"
                                   name="tipe_tanggal"
                                   value="rentang"
                                   id="edit_tipe_rentang">
                            Rentang Tanggal
                        </label>
                    </div>
                </div>

                <div id="wrap_tanggal_tunggal" class="hidden">
                    <label class="text-sm font-medium">
                        Tanggal
                    </label>
                    <input
                        type="date"
                        name="tanggal"
                        id="edit_tanggal"
                        class="w-full border p-2 rounded-lg">
                </div>

                <div id="wrap_tanggal_rentang"
                     class="hidden grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium">
                            Tanggal Mulai
                        </label>
                        <input
                            type="date"
                            name="tanggal_mulai"
                            id="edit_tanggal_mulai"
                            class="w-full border p-2 rounded-lg">
                    </div>

                    <div>
                        <label class="text-sm font-medium">
                            Tanggal Akhir
                        </label>
                        <input
                            type="date"
                            name="tanggal_akhir"
                            id="edit_tanggal_akhir"
                            class="w-full border p-2 rounded-lg">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium">
                        Status Publikasi
                    </label>

                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input type="radio"
                                   name="is_publish"
                                   value="0"
                                   id="edit_draft">
                            Draft
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="radio"
                                   name="is_publish"
                                   value="1"
                                   id="edit_publish">
                            Publish
                        </label>
                    </div>
                </div>

                <div>
                    <label class="text-sm font-medium">
                        File Saat Ini
                    </label>

                    <iframe
                        id="preview_pdf"
                        class="w-full h-64 border rounded-lg"></iframe>
                </div>

                <div>
                    <label class="text-sm font-medium">
                        Ganti File (PDF, max 10MB)
                    </label>
                    <input
                        type="file"
                        name="file"
                        accept="application/pdf"
                        class="w-full border p-2 rounded-lg">
                </div>

            </div>

            <div class="mt-6 flex justify-end gap-2">
                <button
                    type="button"
                    onclick="tutupModal()"
                    class="px-4 py-2 bg-gray-200 rounded-lg">
                    Batal
                </button>

                <button
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
