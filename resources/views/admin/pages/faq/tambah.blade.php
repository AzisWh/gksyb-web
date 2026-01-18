<div class="max-w-3xl flex align-center justify-center mx-auto p-4 ">

    <form id="formJadwal"
    action="{{ route('admin.faq.store') }}" method="POST" class="space-y-4">
    @csrf
    <input type="hidden" id="method" name="_method" value="POST">
    <input type="hidden" id="jadwal_id">

    <div>
        <label>Kategori</label>
        <select name="kategori_faq_id" id="kategori_faq_id"class="w-full p-2 border rounded">
            <option value="">-- pilih --</option>
            @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Pertanyaan</label>
        <input name="pertanyaan" id="pertanyaan" class="w-full p-2 border rounded">
    </div>

    <div>
        <label>Jawaban</label>
        <textarea name="jawaban" id="jawaban" class="w-full p-2 border rounded"></textarea>
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
        formJadwal.action = "{{ route('admin.faq.store') }}"
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

