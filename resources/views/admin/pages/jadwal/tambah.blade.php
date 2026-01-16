<div class="max-w-3xl">

    <form id="formJadwal"
    action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-4">
    @csrf
    <input type="hidden" id="method" name="_method" value="POST">
    <input type="hidden" id="jadwal_id">

    <div>
        <label>Nama Jadwal</label>
        <input name="nama_jadwal" id="nama_jadwal"class="w-full p-2 border rounded">
    </div>

    <div>
        <label>Kategori</label>
        <select name="kategori_jadwal_id" id="kategori_jadwal_id"class="w-full p-2 border rounded">
            <option value="">-- pilih --</option>
            @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Hari</label>
        <input name="hari" id="hari"class="w-full p-2 border rounded">
    </div>

    <div>
        <label>Waktu</label>
        <input type="time" name="waktu" id="waktu" class="w-full p-2 border rounded">
    </div>

    <div>
        <label>Lokasi</label>
        <input name="lokasi" id="lokasi" class="w-full p-2 border rounded">
    </div>

    <div>
        <label>Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="w-full p-2 border rounded"></textarea>
    </div>

    <div>
        <label>Status</label>
        <input type="text" name="" id="">
    </div>

    <div class="flex gap-2">
    <button class="px-4 py-2 text-white rounded bg-secondary">
    Simpan
    </button>

    <button type="button"
    onclick="resetForm()"
    class="px-4 py-2 text-white bg-gray-400 rounded">
    Reset
    </button>
    </div>

    </form>
</div>
