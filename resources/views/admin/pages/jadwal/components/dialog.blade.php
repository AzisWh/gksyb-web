
<div id="modalEdit" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">

    <div class="bg-white w-full max-w-xl rounded-lg p-6">
    <h3 class="text-lg font-semibold mb-4">Edit Jadwal</h3>

        <form id="formEdit" method="POST">
        @csrf
        @method('PATCH')
        <div class="space-y-3">

            <input type="hidden" name="id" id="edit_id">
            <div>
                <label>Nama Jadwal</label>
                <input type="text" name="nama_jadwal" id="edit_nama" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Kategori</label>
                <select name="kategori_jadwal_id" id="edit_kategori" class="w-full border p-2 rounded">
                @foreach($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                @endforeach
                </select>
            </div>

            <div>
                <label>Hari</label>
                <input type="text" name="hari" id="edit_hari" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Waktu</label>
                <input type="time" name="waktu" id="edit_waktu" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Lokasi</label>
                <input type="text" name="lokasi" id="edit_lokasi" class="w-full border p-2 rounded">
            </div>

            <div>
                <label>Keterangan</label>
                <textarea name="keterangan" id="edit_keterangan" class="w-full border p-2 rounded"></textarea>
            </div>

            <div>
                <label>Status</label>
                <div>
                    <label class="flex items-center gap-2">
                        <input type="hidden" name="is_active" value="0">

                        <input type="checkbox"
                            name="is_active"
                            id="edit_is_active"
                            value="1"
                            class="w-5 h-5">

                        Aktif
                    </label>
                    </div>
            </div>

        </div>

        <div class="mt-4 flex justify-end gap-2">
            <button type="button" onclick="tutupModal()" class="px-4 py-2 bg-gray-200 rounded">
            Batal
            </button>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            Simpan
            </button>
        </div>

        </form>

    </div>
</div>



