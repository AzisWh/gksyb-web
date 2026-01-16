<div id="modalEdit" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">

    <div class="bg-white w-full max-w-2xl rounded-xl p-6">

        <h3 class="text-lg font-semibold mb-4">Edit Dokumen</h3>

        <form id="formEdit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" id="edit_id">
            <div class="space-y-4">

                <div>
                    <label class="text-sm">Judul</label>
                    <input name="judul_dokumen" id="edit_judul_dokumen"
                           class="w-full border p-2 rounded-lg">
                </div>

                <div>
                    <label class="text-sm">Kategori</label>
                    <select name="kategori_id" id="edit_kategori"
                            class="w-full border p-2 rounded-lg">
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm">Keterangan</label>
                    <textarea name="keterangan" id="edit_keterangan"
                              class="w-full border p-2 rounded-lg"></textarea>
                </div>

                {{-- PREVIEW FILE --}}
                <div>
                    <label class="text-sm">File Saat Ini</label>
                    <iframe id="preview_pdf"
                            class="w-full h-64 border rounded-lg"></iframe>
                </div>

                <div>
                    <label class="text-sm">Ganti File (PDF)</label>
                    <input type="file" name="file" accept="application/pdf"
                           class="w-full border p-2 rounded-lg">
                </div>

            </div>

            <div class="mt-6 flex justify-end gap-2">
                <button type="button" onclick="tutupModal()"
                        class="px-4 py-2 bg-gray-200 rounded-lg">
                    Batal
                </button>

                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
