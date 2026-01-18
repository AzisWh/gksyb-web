<div class="flex flex-col gap-6 px-3 fs-style-manrope">

    @forelse ($data as $namaKategori => $faqs)

        <h2 class="text-lg font-semibold text-[#3E0703]">
            {{ $namaKategori }}
        </h2>

        @foreach ($faqs as $item)
            <div class="border border-gray-300 rounded-lg overflow-hidden">

                <button
                    type="button"
                    onclick="toggleFaq({{ $item->id }})"
                    class="w-full flex justify-between items-center px-4 py-4 text-left font-medium hover:bg-gray-50">

                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-[#3E0703] text-white text-sm font-bold">
                            ?
                        </span>
                        <span>{{ $item->pertanyaan }}</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-700">
                            Aktif
                        </span>

                        <svg id="icon-{{ $item->id }}"
                            class="w-4 h-4 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>

                <div id="content-{{ $item->id }}"
                    class="hidden px-4 pb-4 text-sm text-gray-600 leading-relaxed">

                    {{ $item->jawaban }}

                    <div class="flex gap-2 mt-4">
                        <button
                            type="button"
                            class="px-3 py-1 text-sm text-blue-600 bg-blue-100 rounded hover:bg-blue-200"
                            data-id="{{ $item->id }}"
                            data-pertanyaan="{{ e($item->pertanyaan) }}"
                            data-jawaban="{{ e($item->jawaban) }}"
                            data-kategori="{{ $item->kategori_faq_id }}"
                            data-status="{{ $item->is_active ? 1 : 0 }}"
                            onclick="bukaEdit(this)">
                            ✏ Edit
                        </button>

                        <form id="form-delete-{{ $item->id }}"
                            action="{{ route('admin.faq.destroy', $item->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="button"
                                onclick="hapusFaq({{ $item->id }})"
                                class="px-3 py-1 text-sm text-red-600 bg-red-100 rounded hover:bg-red-200">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach

    @empty
        <p class="text-gray-500">Belum ada data FAQ</p>
    @endforelse

</div>

@include('admin.pages.faq.components.dialog', [
    'kategori' => $kategori,
])

@push('script')

<script>

function bukaEdit(el) {

    document.getElementById('modalEdit').classList.remove('hidden');

    document.getElementById('edit_id').value = el.dataset.id;
    document.getElementById('edit_pertanyaan').value = el.dataset.pertanyaan;
    document.getElementById('edit_jawaban').value = el.dataset.jawaban;
    document.getElementById('edit_kategori_faq_id').value = el.dataset.kategori;
    document.getElementById('edit_is_active').value = el.dataset.status;

    document.getElementById('formEdit').action =
        `/admin-faq/faq/update/${el.dataset.id}`;
}

function tutupModal(){
    document.getElementById('modalEdit').classList.add('hidden');
}

document.getElementById('formEdit').addEventListener('submit', function(e){

    e.preventDefault();

    Swal.fire({
        title: 'Yakin update FAQ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, update'
    }).then((result) => {

        if(result.isConfirmed){
            this.submit();
        }

    });

});

function hapusFaq(id){

    Swal.fire({
        title: 'Yakin hapus FAQ?',
        text: 'Data tidak bisa dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        confirmButtonColor: '#d33'
    }).then((result) => {

        if(result.isConfirmed){
            document.getElementById(`form-delete-${id}`).submit();
        }

    });

}

</script>

@endpush
