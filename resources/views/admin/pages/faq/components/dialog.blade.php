{{-- ========== MODAL EDIT FAQ ========== --}}
<div id="modalEdit" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">

<div class="bg-white rounded-lg w-full max-w-xl p-6">

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Edit FAQ</h3>

        <button onclick="tutupModal()">
            ✖
        </button>
    </div>

    <form id="formKategori" method="POST">
        @csrf
        @method('PATCH')

        <input type="hidden" id="edit_id" name="id">

        <div class="mb-3">
            <label class="text-sm">Pertanyaan</label>

            <input type="text"
                id="edit_pertanyaan"
                name="pertanyaan"
                class="w-full border rounded p-2 text-sm"
                required>
        </div>

        <div class="mb-3">
            <label class="text-sm">Jawaban</label>

            <textarea
                id="edit_jawaban"
                name="jawaban"
                class="w-full border rounded p-2 text-sm"
                rows="4"
                required></textarea>
        </div>

        <div class="mb-3">
            <label class="text-sm">Kategori</label>

            <select id="edit_kategori_faq_id"
                name="kategori_faq_id"
                class="w-full border rounded p-2 text-sm">

                <option value="">-- Pilih Kategori --</option>

                @foreach($kategori as $k)
                    <option value="{{ $k->id }}">
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label class="text-sm">Status</label>

            <select id="edit_is_active"
                name="is_active"
                class="w-full border rounded p-2 text-sm">

                <option value="1">Aktif</option>
                <option value="0">Non Aktif</option>

            </select>
        </div>

        <div class="flex justify-end gap-2 mt-4">

            <button type="button"
                onclick="tutupModal()"
                class="px-4 py-2 bg-gray-100 rounded text-sm">
                Batal
            </button>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded text-sm">
                Update
            </button>

        </div>

    </form>

</div>
</div>
