<div class="p-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari judul / ringkasan..."
            class="border p-2.5 rounded-lg text-sm focus:ring-2 focus:ring-[#5A0A0A] outline-none"
        />

        <select
            name="status"
            class="border p-2.5 rounded-lg text-sm"
        >
            <option value="">Semua Status</option>
            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                Published
            </option>
            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                Draft
            </option>
        </select>

        <select
            name="kategori"
            class="border p-2.5 rounded-lg text-sm"
        >
            <option value="">Semua Kategori</option>
            @foreach ($kategori as $k)
                <option
                    value="{{ $k->id }}"
                    {{ request('kategori') == $k->id ? 'selected' : '' }}
                >
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>

        <button
            type="submit"
            class="bg-[#5A0A0A] hover:bg-[#7A1A1A] transition text-white rounded-lg text-sm py-2.5"
        >
            Filter
        </button>
    </form>

    <div class="grid grid-cols-1 gap-5">
        @foreach ($tulisan as $s)
            <div class="border rounded-xl p-5 flex flex-col gap-3 bg-white shadow-sm">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">

                    <div class="flex flex-wrap items-center gap-3">
                        <h3 class="font-semibold text-lg">
                            {{ $s->judul_tulisan }}
                        </h3>

                        <span class="px-3 py-1 text-xs font-medium rounded-full
                            {{ $s->is_published
                                ? 'bg-green-100 text-green-700'
                                : 'bg-gray-100 text-gray-600' }}">
                            {{ $s->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2">

                        <button
                            type="button"
                            onclick='openDetailDialog(@json($s->toArray()))'
                            class="p-2 hover:bg-blue-50 rounded-lg transition"
                        >
                            <svg
                                width="22"
                                height="22"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="text-blue-500"
                            >
                                <path
                                    d="M1.5 12S5.5 5.5 12 5.5
                                    22.5 12 22.5 12
                                    18.5 18.5 12 18.5
                                    1.5 12 1.5 12z"
                                    stroke-width="1.5"
                                />
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"
                                    stroke-width="1.5"
                                />
                            </svg>
                        </button>

                        <button
                            type="button"
                            onclick='openEditDialog(@json($s->toArray()))'
                            class="flex items-center gap-2 px-3 py-2 text-sm
                            text-white rounded-lg transition"
                            style="background-color: #15803D"
                        >
                            ✏ Edit
                        </button>

                        <form id="form-delete-{{ $s->id }}"
                            action="{{ route('admin.bintaran.destroy', $s->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button"
                                onclick="hapus({{ $s->id }})"
                                style="
                                    display: inline-flex;
                                    align-items: center;
                                    gap: 6px;
                                    padding: 8px 12px;
                                    border-radius: 8px;
                                    background-color: #FEECEC;
                                    color: #DC2626;
                                    font-weight: 500;
                                    border: none;
                                    cursor: pointer;
                                ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="none" viewBox="0 0 24 24" stroke="#DC2626" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-7 0V5a1 1 0 011-1h4a1 1 0 011 1v2"/>
                                </svg>
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>

                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ Str::limit($s->ringkasan, 120) }}
                </p>

            </div>
        @endforeach
    </div>
</div>


@include('admin.pages.bintaran.components.dialog')

@push('script')
    <script>
        function openDetailDialog(data) {
            document.getElementById('d_judul').innerText = data.judul_tulisan
            document.getElementById('d_kategori').innerText = data.kategori_bintaran?.nama_kategori ?? 'Tidak ada kategori'
            document.getElementById('d_status').innerText = data.is_published ? 'Published' : 'Draft'
            document.getElementById('d_konten').innerHTML = data.konten
            const img = document.getElementById('d_image')

            if (data.image) {
                img.src = `/storage/BintaranImage/${data.image}`
            } else {
                img.src = '/assets/no-image.png'
            }
            
            document.getElementById('detailDialog').classList.remove('hidden')
        }

        function closeDetail() {
            document.getElementById('detailDialog').classList.add('hidden')
        }

        function openEditDialog(data) {
            const form = document.getElementById('formEdit')

            form.action = `/admin-tulisan-bintaran/update/${data.id}`

            document.getElementById('e_judul').value = data.judul_tulisan
            document.getElementById('e_ringkasan').value = data.ringkasan
            document.getElementById('e_konten').value = data.konten
            document.getElementById('e_status').value = data.is_published ? 1 : 0
            document.getElementById('e_kategori').value = data.kategori_bintaran_id ?? ''
            document.getElementById('e_image').value = ''

            const imgPreview = document.getElementById('e_image_preview')

            if (data.image) {
                imgPreview.src = `/storage/BintaranImage/${data.image}`
            } else {
                imgPreview.src = '/assets/no-image.png'
            }

            document.getElementById('editDialog').classList.remove('hidden')
        }

        function previewEditImage(event) {
            const img = document.getElementById('e_image_preview')
            img.src = URL.createObjectURL(event.target.files[0])
        }

        function closeEdit() {
            document.getElementById('editDialog').classList.add('hidden')
        }

        function hapus(id) {
            Swal.fire({
                title: 'Hapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33'
            }).then(result => {
                if (result.isConfirmed) {
                    document.getElementById(`form-delete-${id}`).submit();
                }
            });
        }
    </script>
@endpush
