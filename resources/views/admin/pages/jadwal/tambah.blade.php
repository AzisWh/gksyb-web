<div class="max-w-3xl flex align-center justify-center mx-auto p-4 ">

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

    <div class="flex flex-col gap-4 md:flex-row gap-0 w-full">
        <div>
            <label>Hari</label>
            <input name="hari" id="hari"class="w-full p-2 border rounded placeholder-black" placeholder="senin - jumat" >
        </div>

        <div>
            <label>Waktu</label>
            <input type="time" name="waktu" id="waktu" class="w-full p-2 border rounded">
        </div>
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
        <label class="flex items-center gap-2">
            <input type="hidden" name="is_active" value="0">

            <input type="checkbox"
                name="is_active"
                id="is_active"
                value="1"
                class="w-5 h-5">

            Aktif
        </label>
    </div>

    <div class="flex gap-2">
        <button class="px-4 py-2 text-white rounded bg-secondary" >
        Simpan
        </button>

        <button type="button"
        onclick="resetForm()"
        class="px-4 py-2 text-[#3E0703] rounded" style="border: 1px solid #3E0703">
        Reset
        </button>
    </div>

    </form>
</div>

@push('script')
<script>

    function resetForm(){
        formJadwal.action = "{{ route('admin.jadwal.store') }}"
        method.value="POST"
        formJadwal.reset()
    }

    formJadwal.addEventListener('submit', e=>{
        e.preventDefault()

        Swal.fire({
            title:'Simpan data?',
            icon:'question',
            showCancelButton:true
        }).then(r=>{
            if(r.isConfirmed) formJadwal.submit()
        })

    })

</script>
@endpush

