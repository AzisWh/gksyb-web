<div id="addImageModal"
    class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden  flex items-center justify-center z-50">

    <div class="bg-white w-[90%] max-w-md p-6 rounded-xl shadow-lg fs-style-manrope">

        <h2 class="text-lg font-semibold mb-4 text-[#3A0D0D]">Tambah Gambar Baru</h2>

        <div class="mb-4">
            <label class="text-sm font-medium">Keterangan / Caption</label>
            <input type="text" id="modalCaption"
                class="mt-1 w-full border rounded p-2"
                placeholder="Masukkan caption...">
        </div>

        <div class="mb-4">
            <label class="text-sm font-medium">Pilih Gambar</label>
            <input type="file" id="modalImage"
                class="mt-1 w-full border rounded p-2">
        </div>

        <div class="flex justify-end gap-3 mt-4">
            <button onclick="closeAddModal()"
                class="px-4 py-2 bg-gray-200 rounded">
                Batal
            </button>

            <button onclick="addImageToEdit()"
                class="px-4 py-2 bg-secondary rounded text-white">
                Tambah
            </button>
        </div>

    </div>
</div>