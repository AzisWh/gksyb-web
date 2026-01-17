@extends('layout.admin')

@section('title', 'Sakramen')

@section('content')
    <div class="flex flex-col justify-start text-left fs-style-manrope py-4 fs-style-manrope">
        <h1 class="text-lg">Sakramen Gereja Katolik</h1>
        <p class="text-sm">Kelola informasi 7 Sakramen Gereja Katolik yang ditampilkan di halaman publik</p>

        <div class="flex flex-row mt-5 p-3 rounded-lg" style="background-color: #EFF6FF; border: 2px solid #DBEAFE;">
            <div class="w-12 h-12 bg-[#5A0A0A] text-white rounded-full flex items-center justify-center font-bold text-lg" style="background-color: #DBEAFE; ">
                <span class="font-thin text-md" style="color: #155DFC;">7</span>
            </div>
            <div class="flex flex-col ml-2">
                <h3 class="text-md">Sakramen Gereja Katolik</h3>
                <p class="text-sm">Sistem menampung tepat 7 sakramen sesuai ajaran Gereja Katolik. Setiap sakramen dapat memiliki maksimal 5 gambar slide.</p>
            </div>
        </div>

        @if($sakramen->count() < 7)
            <div class="mt-4 flex items-center gap-3">
                <button onclick="openAddDialog()"
                    style="display:inline-flex;align-items:center;gap:6px;
                    padding:8px 12px;border-radius:8px;
                    color:#1D4ED8;font-weight:500;">
                    ✚ Tambah Sakramen
                </button>

                <p class="text-xs text-gray-500">
                    Maksimal 7 data sakramen
                </p>
            </div>
        @else
            <p class="mt-4 text-sm text-red-500">
                Jumlah sakramen sudah maksimal (7 data)
            </p>
        @endif
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @foreach ($sakramen as $s)
        <div class="bg-white rounded-lg border border-gray-100 shadow p-4 flex flex-col gap-2" style="border:1.5px solid #E5E7EB;">
            <div class="flex flex-row items-start gap-3">
                <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center overflow-hidden">
                    @if($s->icon_sakramen)
                        <img src="{{ asset('storage/' . $s->icon_sakramen) }}" alt="icon" class="w-10 h-10 object-contain">
                    @else
                        <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-gray-400"><rect x="3" y="3" width="18" height="18" rx="4" fill="#F3F4F6"/><path d="M8 13l2.5 3.5a1 1 0 001.6 0L16 13m-8-2a2 2 0 114 0 2 2 0 01-4 0z" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @endif
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-md">{{ $s->judul_sakramen }}</div>
                    <div class="text-sm text-gray-600">{{ $s->deskripsi_singkat }}</div>
                    <div class="flex flex-row items-center gap-2 mt-2 text-xs text-gray-500">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-gray-500"><path d="M4 7h2l2-3h4l2 3h2a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V9a2 2 0 012-2z" stroke="#707275" stroke-width="1.5"/><circle cx="12" cy="13" r="3" stroke="#707275" stroke-width="1.5"/></svg>
                        <span>{{ is_array(json_decode($s->gambar_slide, true)) ? count(json_decode($s->gambar_slide, true)) : 0 }}/5 gambar</span>
                        <span class="mx-1">&bull;</span>
                        <span>{{ $s->icon_sakramen ? 'Ada icon' : 'Belum ada icon' }}</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-row items-center gap-2 mt-2">
                    <button type="button" class="inline-flex items-center justify-center" onclick='openDetailDialog(@json($s->toArray()))'>
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-blue-500"><path d="M1.5 12S5.5 5.5 12 5.5 22.5 12 22.5 12 18.5 18.5 12 18.5 1.5 12 1.5 12z" stroke="#3f83f8" stroke-width="1.5"/><circle cx="12" cy="12" r="3" stroke="#3f83f8" stroke-width="1.5"/></svg>
                    </button>
                    <button class="flex-1 flex flex-row items-center justify-center gap-2 bg-[#5A0A0A] hover:bg-[#3a0606] text-white rounded-lg py-2 transition-colors duration-150" style="background-color: #5A0A0A;"
                        onclick='openEditDialog(@json($s->toArray()))'>
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-white"><path d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-1.414.586H7v-3a2 2 0 01.586-1.414z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span class="font-semibold">Edit</span>
                    </button>
            </div>
            
        </div>
        @endforeach
    </div>

    <!-- Modal Tambah Sakramen -->
    <div id="sakramenDialog" class="fixed inset-0 z-30 flex items-center justify-center backdrop-blur-sm " style="display:none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
            <button type="button" onclick="modalHide()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <h2 id="modalTitle" class="text-lg font-bold mb-4">Tambah Sakramen</h2>
            <form id="sakramenForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.sakramen.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Judul Sakramen</label>
                    <input id="judul_sakramen" type="text" name="judul_sakramen" class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Deskripsi Singkat</label>
                    <textarea id="deskripsi_singkat" name="deskripsi_singkat" class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" rows="2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Deskripsi Lengkap</label>
                    <textarea id="deskripsi_lengkap" name="deskripsi_lengkap" class="w-full border rounded px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Icon Sakramen</label>
                    <input type="file" name="icon_sakramen" class="w-full border rounded px-3 py-2 text-sm" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Slide Carousel (maks 5)</label>
                    <div id="slideContainer">
                        <div class="slide-item mt-2">
                            <input type="text" name="slides[0][caption]" class="form-control mb-1" placeholder="Caption (opsional)">
                            <input type="file" name="slides[0][file]" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <button type="button" onclick="addSlide()" class="mt-2 text-blue-600 hover:underline text-sm">+ Tambah Slide</button>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="modalHide()" class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded bg-secondary text-white font-semibold ">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Detail Sakramen -->
            <div id="detailDialog" class="fixed inset-0 z-40 flex items-center justify-center backdrop-blur-sm" style="display:none;">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                    <button type="button" onclick="detailHide()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                    <h2 class="text-lg font-bold mb-4">Detail Sakramen</h2>
                    <div id="detailContent"></div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="detailHide()" class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">Tutup</button>
                        <button type="button" id="btnDeleteSakramen" class="px-4 py-2 rounded bg-red-600 text-white font-semibold">Hapus</button>
                    </div>
                </div>
            </div>
@endsection

@push('script')
<script>
let slideCount = 1;

function openDetailDialog(data) {
    let slides = [];

    try {
        slides = typeof data.gambar_slide === 'string'
            ? JSON.parse(data.gambar_slide)
            : data.gambar_slide ?? [];
    } catch {
        slides = [];
    }

    let html = `
        <div class="mb-3">
            <b>${data.judul_sakramen}</b>
            <p class="text-sm text-gray-600">${data.deskripsi_singkat}</p>
        </div>

        <div class="mb-2">
            <b>Deskripsi Lengkap</b><br>
            ${data.deskripsi_lengkap ?? '-'}
        </div>

        <div class="mt-3">
            <b>Slide</b><br>
    `;

    if (slides.length) {
        slides.forEach(s => {
            html += `
                <div class="flex gap-2 mt-2">
                    <img src="/storage/${s.file}"
                        class="w-16 h-16 object-cover rounded">
                    <span class="text-xs">${s.caption ?? ''}</span>
                </div>
            `;
        });
    } else {
        html += `<span class="text-xs text-gray-400">Belum ada slide</span>`;
    }

    html += `</div>`;

    document.getElementById('detailContent').innerHTML = html;
    document.getElementById('btnDeleteSakramen').onclick =
        () => hapusSakramen(data.id);

    document.getElementById('detailDialog').style.display = 'flex';
}

function detailHide() {
    document.getElementById('detailDialog').style.display = 'none';
}

function hapusSakramen(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: 'Data sakramen akan dihapus permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form hapus
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin-sakramen/delete/${id}`;
            form.innerHTML = `@csrf`;
            let method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE';
            form.appendChild(method);
            document.body.appendChild(form);
            form.submit();
        }
    });
}


function resetForm() {
    slideCount = 1;
    document.getElementById('sakramenForm').reset();
    document.getElementById('slideContainer').innerHTML = `
        <div class="slide-item mt-2">
            <input type="text" name="slides[0][caption]"
                class="form-control mb-1" placeholder="Caption (opsional)">
            <input type="file" name="slides[0][file]"
                class="form-control" accept="image/*">
        </div>
    `;
}

function addSlide() {
    if (slideCount >= 5) {
        alert('Maksimal 5 slide');
        return;
    }

    document.getElementById('slideContainer')
        .insertAdjacentHTML('beforeend', `
            <div class="slide-item mt-2">
                <input type="text"
                    name="slides[${slideCount}][caption]"
                    class="form-control mb-1"
                    placeholder="Caption (opsional)">
                <input type="file"
                    name="slides[${slideCount}][file]"
                    class="form-control"
                    accept="image/*">
            </div>
        `);

    slideCount++;
}


function openAddDialog() {
    resetForm();
    document.getElementById('modalTitle').innerText = 'Tambah Sakramen';
    document.getElementById('sakramenForm').action = "{{ route('admin.sakramen.store') }}";
    modalShow();
}


function openEditDialog(data) {
    resetForm();

    document.getElementById('modalTitle').innerText = 'Edit Sakramen';
    document.getElementById('judul_sakramen').value = data.judul_sakramen;
    document.getElementById('deskripsi_singkat').value = data.deskripsi_singkat;
    document.getElementById('deskripsi_lengkap').value =
        data.deskripsi_lengkap ?? '';

    document.getElementById('sakramenForm').action =
        `/admin-sakramen/update/${data.id}`;

    // tampilkan slide lama (readonly)
    let slides = [];
    try {
        slides = typeof data.gambar_slide === 'string'
            ? JSON.parse(data.gambar_slide)
            : data.gambar_slide ?? [];
    } catch {}

    let container = document.getElementById('slideContainer');
    container.innerHTML = '';

    slides.forEach((s, i) => {
        container.innerHTML += `
            <div class="slide-item mt-2 border rounded p-2">
                <img src="/storage/${s.file}" class="w-24 h-24 object-cover rounded mb-1">
                <input type="text" name="slides[${i}][caption]"
                    value="${s.caption ?? ''}"
                    class="form-control mb-1">
                <input type="file" name="slides[${i}][file]" class="form-control">
            </div>
        `;
    });

    slideCount = slides.length;

    modalShow();
}
function modalShow() {
    document.getElementById('sakramenDialog').style.display = 'flex';
}
function modalHide() {
    document.getElementById('sakramenDialog').style.display = 'none';
}
</script>
@endpush
