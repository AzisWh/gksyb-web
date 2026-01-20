<div id="detailDialog" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-[600px]">
        <h3 class="font-bold text-lg mb-3">Detail Tulisan</h3>

        <div class="grid grid-cols-1 gap-2">
            <div>
                <label class="text-sm font-semibold">Image</label>

                <div class="mt-2">
                    <img id="d_image"
                        src=""
                        class="w-full h-40 object-cover rounded border"
                        onerror="this.src='/assets/no-image.png'">
                </div>
            </div>

            <div>
                <label class="text-sm font-semibold">Judul</label>
                <p id="d_judul" class="font-semibold"></p>
            </div>

            <div>
                <label class="text-sm font-semibold">Kategori</label>
                <p id="d_kategori" class="text-sm"></p>
            </div>

            <div>
                <label class="text-sm font-semibold">Status</label>
                <p id="d_status" class="text-sm"></p>
            </div>

            <div>
                <label class="text-sm font-semibold">Konten</label>
                <div id="d_konten" class="mt-1 text-sm"></div>
            </div>
        </div>

        <button type="button" onclick="closeDetail()" class="mt-4 bg-gray-200 px-3 py-2 rounded">
            Tutup
        </button>
    </div>
</div>


<div id="editDialog" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-[700px]">
        <h3 class="font-bold mb-3">Edit Tulisan</h3>

        <form method="POST" id="formEdit" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 gap-2">
                <div>
                    <label class="text-sm font-semibold">Judul</label>
                    <input id="e_judul" name="judul_tulisan" class="border w-full p-2 rounded" />
                </div>

                <div>
                    <label class="text-sm font-semibold">Image</label>

                    <input type="file" id="e_image" name="image"
                        class="border w-full p-2 rounded"
                        onchange="previewEditImage(event)" />

                    <div class="mt-2">
                        <img id="e_image_preview"
                            src=""
                            class="w-full h-40 object-cover rounded border"
                            onerror="this.src='/assets/no-image.png'">
                    </div>
                </div>


                <div>
                    <label class="text-sm font-semibold">Kategori</label>
                    <select id="e_kategori" name="kategori_bintaran_id" class="border w-full p-2 rounded">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm font-semibold">Ringkasan</label>
                    <textarea id="e_ringkasan" name="ringkasan" class="border w-full p-2 rounded"></textarea>
                </div>

                <div>
                    <label class="text-sm font-semibold">Konten</label>
                    <textarea id="e_konten" name="konten" class="border w-full p-2 rounded"></textarea>
                </div>

                <div>
                    <label class="text-sm font-semibold">Status</label>
                    <select id="e_status" name="is_published" class="border p-2 w-full rounded">
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="mt-3 bg-secondary text-white px-3 py-2 rounded">
                Simpan
            </button>
        </form>

        <button type="button" onclick="closeEdit()" class="mt-2 text-sm text-gray-600">
            Batal
        </button>
    </div>
</div>
