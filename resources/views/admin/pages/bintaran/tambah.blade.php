

<div class="p-6">

    <div class="bg-white p-4 rounded shadow mb-6">
        <form action="{{ route('admin.bintaran.store') }}" method="POST">
            @csrf

            <label for="judul_tulisan">Judul Tulisan</label>
            <input
                type="text"
                name="judul_tulisan"
                placeholder="Judul"
                class="border p-2 w-full mb-2"
            />

            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="border p-2 w-full mb-2">

            <label for="kategori_bintaran_id">Kategori</label>
            <select
                name="kategori_bintaran_id"
                class="border p-2 w-full mb-2"
            >
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <label for="ringkasan">Ringkasan</label>
            <textarea
                name="ringkasan"
                placeholder="Ringkasan"
                class="border p-2 w-full mb-2"
            ></textarea>

            <label for="konten">Konten</label>
            <textarea
                name="konten"
                placeholder="Konten"
                class="border p-2 w-full mb-2"
            ></textarea>


            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_published" value="1">
                Status Pubikasi
            </label>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 mt-2 rounded"
            >
                Simpan
            </button>
        </form>
    </div>

</div>
